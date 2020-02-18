<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\ProductTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Http\Requests\Admin\ValidatePostRequest;

class ProductTableController extends Controller
{
    use Datatable;
    protected $tableClass = ProductTable::class;

    public function destroy(Product $product)
    {
        $product->delete();
        return [
            'message' => __('The Product was successfully deleted'),
            'redirect' => 'admin.products',
        ];
    }

    // public function create(PostForm $form)
    // {
    //     return ['form' => $form->create()];
    // }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' ProductTableController-> store');
        }
        $product = Product::create($request->all());

        return [
            'message' => __('The product was successfully created'),
            'redirect' => 'admin.product.edit',
            'param' => ['product' => $product->id],
        ];
    }
    public function show(Product $product) {
        return ['product', $product];
    }

    // public function edit(Service $service, PostForm $form) {
    //     return ['form' => $form->edit($service)];
    // }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}