<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Traits\ApiMotbit;
use App\Models\Partner;

class SearchEnController extends Controller
{
    use ApiMotbit;
    function search(Request $request){
        $model = $this->getModel("Post")->where('locale','=','en');
        $key=$request->get('s');
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('created_at')->get();
        $post = $model->where('title','like','%'.$key.'%')->orWhere('excerpt','like','%'.$key.'%')->post()->active()->paginate(12);

        $count = $post->total();
        return  view('themes.tht.en.posts.search',
            compact('key', 'post', 'count','partners'));
    }



    function searchProduct(Request $request){
        $model = $this->getModel("Product")->where('locale','=','en');
        $key=$request->get('s');
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('created_at')->get();
        $product = $model->where('name','like','%'.$key.'%')->orWhere('excerpt','like','%'.$key.'%')->paginate(12);
        $count = $product->total();
        return  view('themes.tht.en.products.search',
            compact('key', 'product', 'count','partners'));
    }

    function searchProject(Request $request){
        $model = $this->getModel("Project")->where('locale','=','en');
        $key=$request->search;
        $project = $model->where('title','like','%'.$key.'%')->active()->paginate(12);

        $count = $project->total();
        $model_cate     =   $this -> getModel("ProjectCategory")->where('locale','=','en');
        $cate=$model_cate->orderBy('created_at')->get();
        return view('themes.tht.en.project.search',
            compact('key', 'project', 'count','cate'));
    }

}
