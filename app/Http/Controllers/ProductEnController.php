<?php

namespace App\Http\Controllers;

use App\Helpers\Theme;
use Illuminate\Http\Request;
use App\Traits\ApiMotbit;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Models\ProductImage;
use App\Models\{Product,Partner};
use Cart;
use Auth, Hash;

class ProductEnController extends Controller
{
    use ApiMotbit;
    protected $model = 'Product';

    public function processInputs($request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:posts,id|max:255',
        ]);
        $rs = [
            'sku' => $request->input('sku', ''),
            'name' => $request->input('name', ''),
            'description' => $request->input('description', ''),
            'body' => $request->input('body', ''),
            'slug' => $request->input('slug', ''),
            'excerpt' => $request->input('excerpt', ''),
            'meta_description' => $request->input('meta_description', ''),
            'meta_keywords' => $request->input('meta_keywords', ''),
            'product_type_id' => $request->input('producttypes', ''),
            'product_cate_id' => $request->input('productcategories', ''),
            'status' => $request->input('status', ''),
            'price' => $request->input('price',''),
            'locale' => $request->input('locale','')
        ];
        $id = $request->input('id', '');
        if (empty($id)) {
            $user_id = auth()->user()->id;
//            $rs['catalog_id'] = $user_id;
        }
        return $rs;
    }
    public function processAfterSave($request, $data)
    {
        $types = $request->input('producttypes', []);
        if (is_array($types)) {
            $data->producttypes()->sync($types);
        }
        $categories = $request->input('productcategories', []);
        if (is_array($categories)) {
            $data->productcategories()->sync($categories);
        }
        $images = $request->input('images', []);
        $filterImages = array_filter($images, function($el) { return !empty($el['image']);});
        if(count($filterImages)) {
            $processImages = array_map(function($el) use ($data) {
                if (empty($el['product_id'])) {
                    $el['product_id'] = $data->id;
                }
                return $el;
            }, $filterImages);
            $this->proccesRelationWithRequest(
                $data->images(),
                $processImages
            );
        }
        $catalogs = $request->input('catalogs', []);
        $filterCatalogs = array_filter($catalogs, function($el) { return !empty($el['catalog']);});
        if(count($filterCatalogs)) {
            $processCatalogs = array_map(function($el) use ($data) {
                if (empty($el['product_id'])) {
                    $el['product_id'] = $data->id;
                }
                return $el;
            }, $filterCatalogs);
            $this->proccesRelationWithRequest(
                $data->catalogs(),
                $processCatalogs
            );
        }

    }
    public function resultOne($request, $data)
    {
        $data->load(['producttypes', 'images', 'catalogs','productcategories']);
        return $data;
    }
    public function resultCollection($request, $data)
    {
        $data->load(['producttypes', 'images', 'catalogs','productcategories']);
        return $data;
    }
    public function getProduct(){
        // set Model
        $model= $this->getModel('Product')->where('locale','=','en');
        $model_type = $this->getModel('ProductType')->where('locale','=','en');
        $model_cate = $this->getModel('ProductCategory')->where('locale','=','en');
        $list = $model->active()->orderBy('updated_at','DESC')->paginate(12);
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('order')->active()->get();
//        if(count($list)==0)
//        {
//            return redirect()->route('home');
//        }
        $cate=$model_cate->orderBy('order')->get();
        return  view('themes.tht.en.products.list',compact('list','cate','partners'));


    }

    public function detail($slug){
        $model= $this->getModel('Product')->where('locale','=','en');
        $model_type = $this->getModel('ProductType')->where('locale','=','en');
        $model_cate = $this->getModel('ProductCategory')->where('locale','=','en');

        $list = $model->active()->orderBy('created_at','DESC')->paginate(15);
        $cate=$model_cate->orderBy('order')->get();

        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('order')->active()->get();

        $product=$this->getModel("Product")->where('locale','=','en')->where('slug',$slug)->first();
        if(empty($product)){
            return view('themes.tht.en.errors.404');
        }
        $product_news=$model->orderBy('created_at')->where('id','!=',$product->id)->active()->take(4)->get();
        $type=$product->producttypes;
        if(empty($type)){
            return redirect()->back();
        };
        $cate_with_type =$type->productcategories;
        if(empty($cate_with_type)){
            return redirect()->back();
        }
        $product_other = $model->where([
            ['product_type_id','=',$type->id],
            ['id','!=',$product->id]
        ])->orderBy('created_at', 'desc')->take(10)->get();
        $productImages=$this->getModel("ProductImage")::where('product_id',$product->id)->get();
        $productImageFist=$this->getModel("ProductImage")::where('product_id',$product->id)->first();
        $catalogs=$product->catalogs;
        $typename=$type->name;
        return  view('themes.tht.en.products.detail',compact('product','catalogs','cate_with_type','type','cate','productImages','product_other','product_news','partners','typename','productImageFist'));
    }
    function getListType($slug){
        $model= $this->getModel('Product')->where('locale','=','en');
        $list = $model->active()->orderBy('created_at','DESC')->paginate(12);
        $model_type = $this->getModel('ProductType')->where('locale','=','en');
        $model_cate = $this->getModel('ProductCategory')->where('locale','=','en');
        $list_type= $model_type->where('slug',$slug)->first();
        if(empty($list_type)){
            return redirect()->route('home');
        }
        $cate_with_type=$list_type->productcategories;
        if(empty($cate_with_type)){
            return redirect()->route('home');
        }
        $cate=$model_cate->orderBy('order')->get();
        $product_type =$model->where('product_type_id',$list_type->id)->paginate(12);
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('order')->active()->get();
        $count=$product_type->total();
        // if($count == 0)
        // {
        //     return redirect()->action('ProductController@getProduct');
        // }
//        dd($product_type[0]['image']);
        return  view('themes.tht.en.products.filter',compact('list_type','count','product_type','cate','product_type','cate_with_type','partners'));

    }
    public function getListCate($slug){
        // danh sach sp
        $model= $this->getModel('Product')->where('locale','=','en');
        $list = $model->active()->orderBy('created_at','DESC')->paginate(12);
        // danh sach the loai
        $model_type = $this->getModel('ProductType')->where('locale','=','en');
        // danh sach thuong hieu
        $model_cate = $this->getModel('ProductCategory')->where('locale','=','en');
        $cate=$model_cate->orderBy('order')->get();
        //thuong hieu theo slug
        $slug_cate= $model_cate->where('slug',$slug)->get();
        $id_cate=$slug_cate[0]->id;
        // danh sach the loai theo thuong hieu
        $list_type=$model_type->where('product_category_id',$id_cate)->get();
        // danh sach sp theo thuong hieu
        $product_cate =$model->where('product_cate_id',$id_cate)->paginate(12);

        $count=count($list_type);

//       $product_type =$model->where('product_type_id',$list_type->id)->paginate(12);

//       dd($list_type);
        //băt sk neu co va k có type
        $partners= $this->getModel('Partner')->where('locale','=','vi')->orderBy('order')->active()->get();
        return  view('themes.tht.en.products.cate',compact('product_cate','count','list_type','cate','id_cate','partners','slug_cate'));

    }
}
