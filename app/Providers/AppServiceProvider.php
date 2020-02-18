<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductCategory;
use App\Models\{ProjectCategory, Project, ServiceCategory};
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('themes.tht.sections.header',function($view){
            $cate_post = Category::all()->where('locale','=','vi');
            $cate=ProductCategory::orderBy('order')->where('locale','=','vi')->get();
            $cate_project = ProjectCategory::all()->where('locale','=','vi');
            $cate_service = ServiceCategory::all()->where('locale','=','vi');
            $view->with([
                'cate_post'=>$cate_post,
                'cate'=>$cate,
                'cate_project'=>$cate_project,
                'cate_service'=>$cate_service
            ]);
        });
        view()->composer('themes.tht.en.sections.header',function($view){
            $cate_post = Category::all()->where('locale','=','en');
            $cate=ProductCategory::orderBy('order')->where('locale','=','en')->get();
            $cate_project = ProjectCategory::all()->where('locale','=','en');
            $cate_service = ServiceCategory::all()->where('locale','=','en');
            $view->with([
                'cate_post'=>$cate_post,
                'cate'=>$cate,
                'cate_project'=>$cate_project,
                'cate_service'=>$cate_service
            ]);
        });
        view()->composer('themes.tht.home.index',function($view){
            $cate_post = Category::all()->where('locale','=','vi');
            $cate=ProductCategory::orderBy('created_at')->where('locale','=','vi')->get();
            $cate_project = ProjectCategory::all()->where('locale','=','vi');
            $view->with([
                'cate_post'=>$cate_post,
                'cate'=>$cate,
                'cate_project'=>$cate_project,
            ]);
        });
        view()->composer('themes.tht.en.home.index',function($view){
            $cate_post = Category::all()->where('locale','=','en');
            $cate=ProductCategory::orderBy('created_at')->get()->where('locale','=','en');
            $cate_project = ProjectCategory::all()->where('locale','=','en');
            $view->with([
                'cate_post'=>$cate_post,
                'cate'=>$cate,
                'cate_project'=>$cate_project,
            ]);
        });
        //##### for english template ######
        view()->composer('themes.tht.en.sections.header',function($view){
            $cate_post = Category::all()->where('locale','=','en');
            $cate=ProductCategory::orderBy('order')->where('locale','=','en')->get();
            $cate_project = ProjectCategory::all()->where('locale','=','en');
            $cate_service = ServiceCategory::all()->where('locale','=','en');
            $view->with([
                'cate_post'=>$cate_post,
                'cate'=>$cate,
                'cate_project'=>$cate_project,
                'cate_service'=>$cate_service
            ]);
        });
        view()->composer('themes.tht.en.home.index',function($view){
            $cate_post = Category::all()->where('locale','=','en');
            $cate=ProductCategory::orderBy('created_at')->where('locale','=','en')->get();
            $cate_project = ProjectCategory::all()->where('locale','=','en');
            $view->with([
                'cate_post'=>$cate_post,
                'cate'=>$cate,
                'cate_project'=>$cate_project,
            ]);
        });
        //###### end for english template ######
    }
}
