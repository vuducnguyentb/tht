<?php
namespace App\Tables\Builders\Admin;

use App\Models\ProductType;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ProductTypeTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/producttypes.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("ProductTypeTable Query");
        }
        return ProductType::join('product_categories','product_types.product_category_id','=','product_categories.id')
            ->select(
                'product_types.id as dtRowId',
                'product_types.name',
                'product_categories.name as danhmuc',
                'product_types.slug',
                'product_types.created_at'
            )->where('product_types.locale','=','vi');
    }
}