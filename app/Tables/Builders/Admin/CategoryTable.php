<?php
namespace App\Tables\Builders\Admin;

use App\Models\Category;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;

class CategoryTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/categories.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("CategoryTable Query");
        }
        return Category::select(\DB::raw('
            `id` as `dtRowId`,
            `name`,
            `slug`,
            `created_at`
        '))->where('locale','=','vi');
    }
}
