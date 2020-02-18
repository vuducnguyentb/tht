<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\ProductCategoryTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Models\ProductCategory;
use App\Http\Requests\Admin\ValidatePostRequest;

class ProductCategoryTableController extends Controller
{
    use Datatable;
    protected $tableClass = ProductCategoryTable::class;

    public function destroy(ProductCategory $productcategorie)
    {
        $productcategorie->delete();
        return [
            'message' => __('The ProductCategory was successfully deleted'),
            'redirect' => 'admin.productcategories',
        ];
    }

    // public function create(PostForm $form)
    // {
    //     return ['form' => $form->create()];
    // }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' ProductCategoryTableController-> store');
        }
        $productcategorie = ProductCategory::create($request->all());

        return [
            'message' => __('The productcategorie was successfully created'),
            'redirect' => 'admin.productcategorie.edit',
            'param' => ['productcategorie' => $productcategorie->id],
        ];
    }
    public function show(ProductCategory $productcategorie) {
        return ['productcategorie', $productcategorie];
    }

    // public function edit(ProductCategory $productcategorie, PostForm $form) {
    //     return ['form' => $form->edit($productcategorie)];
    // }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}