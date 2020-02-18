<?php

namespace App\Http\Controllers;

use app\Models\{Product, Partner};
use Illuminate\Http\Request;
use Auth, Hash;
use App\Traits\ApiMotbit;
use Cart;

class PageController extends Controller
{
    use ApiMotbit;
    protected $model = 'Post';

    public function processInputs($request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,id|max:255',
        ]);
        $rs = [
            'title' => $request->input('title', ''),
            'body' => $request->input('body', ''),
            'slug' => $request->input('slug', ''),
            'excerpt' => $request->input('excerpt', ''),
            'image' => $request->input('image', ''),
            'meta_description' => $request->input('meta_description', ''),
            'meta_keywords' => $request->input('meta_keywords', ''),
            'status' => $request->input('status', 0),
            'locale' => $request->input('locale', 'vi'),
            'type' => 'page'
        ];
        $id = $request->input('id', '');
        if (empty($id)) {
            $user_id = auth()->user()->id;
            $rs['author_id'] = $user_id;
        }
        return $rs;
    }

    public function resultOne($request, $data)
    {
        $data->load(['author']);
        return $data;
    }

    public function resultCollection($request, $data)
    {
        $data->load(['author']);
        return $data;
    }

    public function additionQuery($model)
    {
        $model = $model->where(['type' => 'page']);
        return $model;
    }

    public function detail(Request $request, $slug)
    {
        $model = $this->getModel();
        $partners= $this->getModel('Partner')->orderBy('order')->get();
        $page = $model::with(['author'])
            ->where(['slug' => $slug, 'status' => 1])
            ->first();
        if (empty($page)) {
            return view('themes.tht.errors.404');
        }
        return $this->loadView('pages.view', compact('page','partners'));
    }

    


}
