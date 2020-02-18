<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash;
use App\Traits\ApiMotbit;
use Illuminate\Support\Facades\Log;
class ProductCategoryController extends Controller
{
    use ApiMotbit;
    protected $model = 'ProductCategory';

    public function processInputs($request) {
        if(env('APP_DEBUG', false) == true) {
            Log::info('ProductCategoryController->processInputs');
        }
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,id|max:255',
        ]);
        $rs = [
            'name' => $request->input('name', ''),
            'slug' => $request->input('slug', ''),
            'order' => $request->input('order', ''),
            'locale' => $request->input('locale', 'vi'),
            // 'meta_description' => $request->input('meta_description', ''),
            // 'meta_keywords' => $request->input('meta_keywords', ''),
        ];
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
    public function resultOne($request, $data) {
        return $data;
    }
}
