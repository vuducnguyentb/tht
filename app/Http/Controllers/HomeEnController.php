<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use App\Traits\{InitModel, View};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
class HomeEnController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    use InitModel, View;

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
     public function index()
     {
         if(env('APP_DEBUG', false) == true) {
             Log::info('HomeEnController->index');
         }
         App::setLocale('en');
         $slides = $this->getModel('Slide')->orderBy('created_at')->locale('en')->take(10)->get();

         $posts = $this->getModel('Post')->where('type','=','post')->where('locale','=','en')->orderBy('created_at','DESC')->active()->locale('en')->take(3)->get();
         $product =$this->getModel('Product')->where('locale','=','en')->orderBy('created_at','DESC')->locale('en')->take(8)->get();
         $services= $this->getModel('Service')->where('locale','=','en')->orderBy('created_at')->take(3)->get();
         $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('order')->get();
         $cate = $this->getModel('Product')->where('locale','=','en')->get();
         $product_categories= $this->getModel('ProductCategory')->where('locale','=','en')->orderBy('order')->get();
         $service_categories= $this->getModel('ServiceCategory')->where('locale','=','en')->get();
         $product_types= $this->getModel('ProductType')->where('locale','=','en')->get();

         return $this->loadView('en.home.index',
             compact(
                 'slides',
                 'product',
                 'cate',
                 'posts',
                 'services',
                 'partners',
                 'product_categories',
                 'product_types',
                 'service_categories'
             ));
         /*
         return $this->loadView('home.en.index',
             compact(
                 'slides',
                 'product',
                 'cate',
                 'benefit',
                 'compare',
                 'posts',
                 'testimonials',
                 'services',
                 'partners',
                 'product_categories',
                 'product_types',
                 'service_categories'
             ));
         */
     }
}
