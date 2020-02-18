<?php
namespace App\Tables\Builders\Admin;

use App\Models\Project;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ProjectEnTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/projects.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("ProjectTable Query");
        }
        return Project::join('project_categories','projects.project_category_id','=','project_categories.id')
            ->select(
                'projects.id as dtRowId',
                'projects.title',
                'project_categories.name as category',
                'projects.status',
                'projects.created_at'
            )->where('projects.locale','=','en');
    }
}