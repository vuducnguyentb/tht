<?php

namespace App\Http\Controllers;
use App\Traits\ApiMotbit;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use ApiMotbit;
    protected $model = 'Tag';
    public function getList($id){
        $model  =$this->getModel("Tag");
        $getID  = $model->find($id);
        if(empty($getID)){
            return redirect()->route('post');
        }
        $name   =$getID->name;   
        
        // get ID taggbles
        $taggable = $this->getModel("Taggable")->where('tag_id',$getID->id)->get();       
        $tag_post  =$this->getModel("Post")->whereIn('id',$taggable->pluck('taggable_id')->toArray())->paginate(12);  

        $count  =  $tag_post->total();
        // gte list tag
        $list   = $model->all();
       
        return view('themes.tht.posts.tag',compact('tag_post','list','name','count'));

     
       
    }
}
