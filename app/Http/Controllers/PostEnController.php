<?php

namespace App\Http\Controllers;

use App\Helpers\Theme;
use App\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Post;
use App\Models\{PostCategory, Partner};
use Illuminate\Http\Request;
use Auth, Hash;
use Carbon\Carbon;
use App\Traits\ApiMotbit;
use App\Models\PostTranslation;
use App\Models\PostCategoryTranslation;
use App\Models\CategoryTranslation;

class PostEnController extends Controller
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
            'status' => $request->input('status', ''),
            'locale' => $request->input('locale', ''),
        ];
        $id = $request->input('id', '');
        if (empty($id)) {
            $user_id = auth()->user()->id;
            $rs['author_id'] = $user_id;
        }
        return $rs;
    }

    public function processAfterSave($request, $data)
    {
        $categories = $request->input('categories', []);
        if (is_array($categories)) {
            $data->categories()->sync($categories);
        }
    }

    public function resultOne($request, $data)
    {
        $data->load(['categories', 'author']);
        return $data;
    }

    public function resultCollection($request, $data)
    {
        $data->load(['categories', 'author']);
        return $data;
    }

    public function additionQuery($model)
    {
        $model = $model->where('type', 'post');
        return $model;
    }

    public function detail(Request $request, $slug)
    {
        Carbon::setLocale('en'); // set langguge Vietnam
        Carbon::now('Asia/Ho_Chi_Minh'); //set time VN
        $model = $this->getModel()->where('locale','=','en');
        $post = $model->where('slug','=',$slug)->where('status','=',1)
            ->first();
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('order')->get();
        if(empty($post)){
            return view('themes.tht.en.errors.404');
        }
        if ($post && $post->type == 'post') {
            $post->load(['categories', 'author', 'tags']);
            $categories = $this->getModel('Category')->where('locale','=','en')->orderBy('created_at')->take(5)->get();
            $postsNew = $model->orderBy('created_at', 'DESC')->where('id', '!=',
                $post->id)->active()->post()->limit(5)->get();

            if (empty($post)) {
                abort(404);
            }
            $categoryIds = $post->categories()->pluck('id')->all();
            $relatedPosts = $this->getModel('Post')->where('locale','=','en')->active()->post()
                ->whereHas('categories', function ($query) use ($categoryIds) {
                    $query->whereIn('id', $categoryIds);
                })->limit(6)->get();
            $count = $relatedPosts->count();
            $count_tag = $post->tags->count();
            $comment = $this->getModel('Comment')->where([
                ['post_id', '=', $post->id],
                ['status', '=', 1]
            ])
                ->orderBy('created_at', 'desc')->get();
            return view('themes.tht.en.posts.detail',
                compact('post', 'postsNew', 'relatedPosts', 'categories', 'count', 'count_tag', 'comment','partners'));
            /*
            if($locale != 'en'){
                return view('themes.tht.posts.detail',
                    compact('post', 'postsNew', 'relatedPosts', 'categories', 'count', 'count_tag', 'comment','partners'));
            }
            else{
                return view('themes.tht.posts.en.detail',
                    compact('locale','post', 'postsNew', 'relatedPosts', 'categories', 'count', 'count_tag', 'comment','partners'));
            }
            */
        } elseif ($post && $post->type == 'page') {
            $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('order')->get();
            return view('themes.tht.en.pages.detail', compact('post','partners'));
        }
    }


    public function getListPost()
    {
        Carbon::setLocale('en'); // set langguge Vietnam
        Carbon::now('Asia/Ho_Chi_Minh'); //set time VN
        //get list blog
        $list = $this->getModel('Post')->where('locale','=','en')->orderBy('created_at', 'DESC')->post()->active()->paginate(12);
        //check null exception
        $cate = $this->getModel('Category')->where('locale','=','en')->orderBy('created_at', 'DESC')->get();
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('order')->get();
        $count = $list->total();
//        if ($count == 0) {
//            return redirect('/');
//        }
        return view('themes.tht.en.posts.list', ['list' => $list, 'partners' => $partners ,'cate'=>$cate])->with('notifi');
    }

    public function listCate($slug)
    {
        // set Model
        $model_cate = $this->getModel("Category")->where('locale','=','en');
        $model_post = $this->getModel("Post")->where('locale','=','en');
        $model_post_cate = $this->getModel("PostCategory");
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('order')->get();
        // find ID of category
        $cate_id = $model_cate->where('slug', $slug)->first();

        if (empty($cate_id)) {
            return redirect()->route('post');
        }
        // get list Category
        $list = $model_cate->get();
        // get name category
        $cate_name = $cate_id->name;
        $cate_slug = $cate_id->slug;
        // Set category_id of table post_categories with ID of category
        $cate = $model_post_cate->where('category_id', $cate_id->id)->get();
        $catelist = $this->getModel('Category')->where('locale','=','en')->orderBy('created_at', 'DESC')->get();

        // Set ID post with ID of post_id of tabel post_catagories
        $id_post = $model_post->whereIn('id', $cate->pluck('post_id')->toArray())->post()->active()->paginate(12);
        // dd($id_post);
        $count = $id_post->total();
//        if($count == 0)
//        {
//            return redirect()->action('PostController@getListPost');
//        }
//        dd($id_post[0]);
        return view('themes.tht.en.posts.category', compact( 'id_post', 'cate_name', 'list', 'count', 'partners', 'cate', 'cate_id', 'catelist', 'cate_slug', 'cate_name'));
    }


}
