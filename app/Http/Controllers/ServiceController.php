<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;
use App\Models\{Service, Partner};
use Carbon\Carbon;

class ServiceController extends Controller
{
    use ApiMotbit;
    protected $model = 'Service';
    public function processInputs($request)
    {
        $rs = [
            'title' => $request->input('title', ''),
            'slug' => $request->input('slug', ''),
            'body' => $request->input('body', ''),
            'link' => $request->input('link', ''),
            'image' => $request->input('image', ''),
            'order' => $request->input('order', 0),
            'meta_description' => $request->input('meta_description', ''),
            'meta_keywords' => $request->input('meta_keywords', ''),
            'status' => $request->input('status', 0),
            'service_category_id' => $request->input('servicecategories', ''),
            'locale' => $request->input('locale', 'vi'),
        ];
        return $rs;
    }
    public function processAfterSave($request, $data)
    {
        $categories = $request->input('servicecategories', []);
        if (is_array($categories)) {
            $data->servicecategories()->sync($categories);
        }
    }
    public function resultOne($request, $data)
    {
        $data->load(['servicecategories', 'author']);
        return $data;
    }
    public function resultCollection($request, $data)
    {
        $data->load(['servicecategories', 'author']);
        return $data;
    }
    public function getService(){
        $model = $this->getModel("Service")->where('locale','=','vi');
        $services=$model->active()->orderBy('created_at', 'DESC')->paginate(6);
        $partners= $this->getModel('Partner')->where('locale','=','vi')->active()->orderBy('order')->get();

            return view('themes.tht.services.list',compact('services','partners'));

    }
    public function detailService($slug){
        Carbon::setLocale('vi'); // set langguge Vietnam
        Carbon::now('Asia/Ho_Chi_Minh'); //set time VN
        $model = $this->getModel()->where('locale','=','vi');
        $service=$model->where('slug',$slug)->first();
        if(empty($service)){
            return view('themes.tht.errors.404');
        }
        $partners= $this->getModel('Partner')->where('locale','=','vi')->active()->orderBy('order')->get();
            return view('themes.tht.services.detail',compact('service','partners'));
    }
    public function listCate($slug){
        // set Model
        $model = $this->getModel("Service")->where('locale','=','vi');
        $cate_service =$this -> getModel("ServiceCategory")->where('locale','=','vi')->orderBy('created_at')->get();
        $slug=$cate_service->where('slug',$slug)->first();
        $id_cate=$slug->id;
        $partners= $this->getModel('Partner')->where('locale','=','vi')->orderBy('order')->get();
        $services=$model->where('service_category_id',$id_cate)->orderBy('created_at', 'DESC')->paginate(6);
        // $services_lst=$model->orderBy('created_at', 'DESC')->paginate(6);
        $count=$services->total();
//        dd($services[0]->first()['image']);
            return  view('themes.tht.services.category',compact('services','slug','partners','count'));
    }
}
