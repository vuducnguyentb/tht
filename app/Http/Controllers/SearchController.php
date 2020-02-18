<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiMotbit;
use App\Models\Partner;
class SearchController extends Controller
{
  use ApiMotbit;
    function search(Request $request){
      $model = $this->getModel("Post")->where('locale','=','vi');
        $key=$request->get('s');
        $partners= $this->getModel('Partner')->where('locale','=','vi')->orderBy('created_at')->get();
        $post = $model->where('title','like','%'.$key.'%')->orWhere('excerpt','like','%'.$key.'%')->post()->active()->paginate(12);

        $count = $post->total();
        return  view('themes.tht.posts.search',
        compact('key', 'post', 'count','partners'));
      }



      function searchProduct(Request $request){
        $model = $this->getModel("Product")->where('locale','=','vi');
          $key=$request->get('s');
          $partners= $this->getModel('Partner')->where('locale','=','vi')->orderBy('created_at')->get();
          $product = $model->where('name','like','%'.$key.'%')->orWhere('excerpt','like','%'.$key.'%')->paginate(12);
          $count = $product->total();
          return  view('themes.tht.products.search',
          compact('key', 'product', 'count','partners'));
        }

        function searchProject(Request $request){
          $model = $this->getModel("Project")->where('locale','=','vi');
            $key=$request->search;
            $project = $model->where('title','like','%'.$key.'%')->active()->paginate(12);

            $count = $project->total();
            $model_cate     =   $this -> getModel("ProjectCategory")->where('locale','=','vi');
        $cate=$model_cate->orderBy('created_at')->get();
            return view('themes.tht.project.search',
            compact('key', 'project', 'count','cate'));
          }

}
