<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\ProductTypeTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Models\ProductType;
use App\Http\Requests\Admin\ValidatePostRequest;

class ProductTypeTableController extends Controller
{
    use Datatable;
    protected $tableClass = ProductTypeTable::class;

    public function destroy(ProductType $producttype)
    {
        $producttype->delete();
        return [
            'message' => __('The ProductType was successfully deleted'),
            'redirect' => 'admin.producttypes',
        ];
    }

    // public function create(PostForm $form)
    // {
    //     return ['form' => $form->create()];
    // }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' ProductTypeTableController-> store');
        }
        $producttype = ProductType::create($request->all());

        return [
            'message' => __('The producttype was successfully created'),
            'redirect' => 'admin.producttype.edit',
            'param' => ['producttype' => $producttype->id],
        ];
    }
    public function show(ProductType $producttype) {
        return ['producttype', $producttype];
    }

}