<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash;
use App\Traits\ApiMotbit;

class ServiceCategoryController extends Controller
{
    use ApiMotbit;
    protected $model = 'ServiceCategory';

    public function processInputs($request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,id|max:255',
        ]);
        $rs = [
            'name' => $request->input('name', ''),
            'slug' => $request->input('slug', ''),
            'locale' => $request->input('locale', 'vi'),
            // 'meta_description' => $request->input('meta_description', ''),
            // 'meta_keywords' => $request->input('meta_keywords', ''),
        ];
        return $rs;
    }

    public function resultOne($request, $data) {
        return $data;
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
}
