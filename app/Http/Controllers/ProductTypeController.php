<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductType;
use Cart;
use Auth, Hash;
class ProductTypeController extends Controller
{
    use ApiMotbit;
    protected $model = 'ProductType';
    public function processInputs($request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:posts,id|max:255',
        ]);
        $rs = [
            'name' => $request->input('name', ''),
            'slug' => $request->input('slug', ''),
            'product_category_id' => $request->input('productcategories',''),
            'locale' => $request->input('locale', ''),
        ];
        $id = $request->input('id', '');
        if (empty($id)) {
            $user_id = auth()->user()->id;
//            $rs['catalog_id'] = $user_id;
        }
        return $rs;
    }
    public function list(Request $request) {
        $model = $this->getModel();
        $model = $this->additionQuery($model);
        $data = $model->where('locale','=','vi')->orderBy('created_at', 'DESC')->get();
        return $this->resultCollection($request, $data);
    }
    public function listEn(Request $request) {
        $model = $this->getModel();
        $model = $this->additionQuery($model);
        $data = $model->where('locale','=','en')->orderBy('created_at', 'DESC')->get();
        return $this->resultCollection($request, $data);
    }
    public function processAfterSave($request, $data)
    {
        $categories = $request->input('productcategories', []);
        if (is_array($categories)) {
            $data->productcategories()->sync($categories);
        }
    }
    public function resultOne($request, $data)
    {
        $data->load('productcategories');
        return $data;
    }
    public function resultCollection($request, $data)
    {
        $data->load('productcategories');
        return $data;
    }
}
