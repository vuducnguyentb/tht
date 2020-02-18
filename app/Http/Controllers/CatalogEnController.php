<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash;
use Carbon\Carbon;
use App\Traits\ApiMotbit;
use App\Models\Partner;

class CatalogEnController extends Controller
{
    use ApiMotbit;
    protected $model = 'Catalog';
    public function processInputs($request)
    {
        $rs = [
            'name' => $request->input('name', ''),
            'slug' => $request->input('slug', ''),
            'body' => $request->input('body', ''),
            'image' => $request->input('image', ''),
            'link' => $request->input('link', ''),
            'order' => $request->input('order', 0),
            'status' => $request->input('status', ''),
            'locale' => $request->input('locale', 'en')
        ];
        return $rs;
    }
    public function getCatalog(){
        $model = $this->getModel();
        $catalogs=$model->where('locale','=','en')->get();
        return view('themes.tht.catalogs',compact('catalogs'));
    }
    public function getListCatalog()
    {
        Carbon::setLocale('en'); // set langguge Vietnam
        Carbon::now('Asia/Ho_Chi_Minh'); //set time VN
        //get list catalog
        $list = $this->getModel('Catalog')->where('locale','=','en')->orderBy('created_at', 'DESC')->active()->paginate(9);
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('created_at')->get();
        //check null exception
        $count = $list->total();
//        if ($count == 0) {
//            return redirect('/');
//
//        }
        return view('themes.tht.en.catalogs.list', ['list' => $list, 'partners' => $partners]);
    }
    public  function detail($slug){
        $model= $this->getModel('Catalog')->where('locale','=','en');
        $list = $model->where('status',1)->orderBy('created_at','DESC')->take(3)->get();
        $catalog=$this->getModel("Catalog")->where('locale','=','en')->where('slug',$slug)->first();
        if(empty($catalog)){
            return view('themes.tht.en.errors.404');
        }
        $catalog_news=$model->orderBy('created_at')->where('id','!=',$catalog->id)->take(4)->get();
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('created_at')->get();
        $catalog_other = $model->where([
            ['id','!=',$catalog->id]
        ])->where('locale','=','en')->orderBy('created_at', 'desc')->take(10)->get();
        return  view('themes.tht.en.catalogs.detail',compact('catalog','catalog_news','list','catalog_other','partners'));

    }
    public function searchCatalog(Request $request){
        $model = $this->getModel("Catalog")->where('locale','=','en');
        $keyword=$request->get('keyword');
        $catalogs=$model->where('name','like','%'.$keyword.'%')->active()->paginate(12);
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('created_at')->get();
        $count = $catalogs->total();
        return  view('themes.tht.en.catalogs.search',
            compact('keyword', 'catalogs', 'count', 'partners'));


    }
}
