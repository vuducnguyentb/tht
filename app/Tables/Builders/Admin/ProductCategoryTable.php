<?php
namespace App\Tables\Builders\Admin;

use App\Models\ProductCategory;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ProductCategoryTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/productcategories.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("ProductCategoryTable->query");
        }
        return ProductCategory::select(\DB::raw('
            id as dtRowId,
            `name`,
            `slug`,
            `order`,
            `created_at`
        '))->where('locale','=','vi');
    }
}