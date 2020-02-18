<?php
namespace App\Tables\Builders\Admin;

use App\Models\ServiceCategory;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;

class ServiceCategoryEnTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/servicecategories.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("ServiceCategoryTable->query");
        }
        return ServiceCategory::select(\DB::raw('
            id as dtRowId,
            name,
            slug,
            created_at
        '))->where('locale','=','en');

    }
}
