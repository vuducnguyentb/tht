<?php
namespace App\Tables\Builders\Admin;

use App\Models\ProjectCategory;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ProjectCategoryEnTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/projectcategories.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("ProjectCategoryTable Query");
        }
        return ProjectCategory::select(\DB::raw('
            id as dtRowId,
            name,
            slug,
            created_at
    '))->where('locale','=','en');
    }
}