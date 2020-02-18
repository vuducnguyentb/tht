<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use App\Traits\{InitModel, View};
use Illuminate\Http\Request;

class HomeController extends Controller
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
         $slides = $this->getModel('Slide')->where('locale','=','vi')->orderBy('created_at')->take(10)->get();
         $posts = $this->getModel('Post')->where('locale','=','vi')->where('type','=','post')->orderBy('created_at','DESC')->active()->take(3)->get();
         $product =$this->getModel('Product')->where('locale','=','vi')->orderBy('created_at','DESC')->take(8)->get();
         $services= $this->getModel('Service')->where('locale','=','vi')->orderBy('created_at')->take(3)->get();
         $partners= $this->getModel('Partner')->where('locale','=','vi')->orderBy('order')->get();
         $cate = $this->getModel('Product')->where('locale','=','vi')->get();
         $product_categories= $this->getModel('ProductCategory')->where('locale','=','vi')->orderBy('order')->get();
         $service_categories= $this->getModel('ServiceCategory')->where('locale','=','vi')->get();
         $product_types= $this->getModel('ProductType')->where('locale','=','vi')->get();
         return $this->loadView('home.index',
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
     }





}
