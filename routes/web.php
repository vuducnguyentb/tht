<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Helpers\Theme;
use Illuminate\Support\Facades\App;
$myRoutes = [
    'users' => 'User',
    'posts' => 'Post',
    'categories' => 'Category',
    'projectcategories' => 'ProjectCategory',
    'pages' => 'Page',
    'projects' => 'Project',
    'settings' => 'Setting',
    'list_slides' => 'ListSlide',
    'services' => 'Service',
    'testimonials' => 'Testimonial',
    'subscribers'=>'Subscriber',
    'customercontacts'=>'CustomerContact',
    'tags' => 'Tag',
    'comments' => 'Comment',
    'products' => 'Product',
    'productcategories' => 'ProductCategory',
    'orderdetails' => 'OrderDetail',
    'orders' => 'Order',
    'producttypes' => 'ProductType',
    'catalogs' => 'Catalog',
    'partners'=>'Partner',
    'uploads' => 'FileUpload',
    'menu' => 'Menu',
    'servicecategories' => 'ServiceCategory',

];
$segmentRoutes = [
    "users" => 'user',
    'posts' => 'post',
    'categories' => 'category',
    'projectcategories' => 'projectcategorie',
    'pages' => 'page',
    'projects' => 'project',
    'settings' => 'setting',
    'list_slides' => 'list_slide',
    'services' => 'service',
    'testimonials' => 'testimonial',
    'subscribers' => 'subscriber',
    'customercontacts' => 'customercontact',
    'tags' => 'tag',
    'comments' => 'comment',
    'products' => 'product',
    'productcategories' => 'productcategorie',
    'orderdetails' => 'orderdetail',
    'orders' => 'order',
    'producttypes' => 'producttype',
    'catalogs' => 'catalog',
    'partners' => 'partner',
    'uploads' => 'upload',
    'menu' => 'menu',
    'servicecategories' => 'servicecategory'
];
Route::domain('en.tht-vietnam.com')->group(function () use ($segmentRoutes, $myRoutes) {
    /**
     * handler router for admin data table
     */
    Route::namespace('Admin\En')->group(function() use ($myRoutes, $segmentRoutes) {
        foreach ($myRoutes as $key => $value) {
            Route::prefix($key)->as($key.'.')->middleware('auth')->group(function () use ($key, $value, $segmentRoutes) {
                // post.initTable
                Route::get('initTable', $value.'TableController@init')->name('initTable');
                // post.tableData
                Route::get('tableData', $value.'TableController@data')->name('tableData');
                // post.create
                Route::get('create', $value.'TableController@create')->name('create');
                // post.destroy
                Route::delete('{'.$segmentRoutes[$key].'}', $value.'TableController@destroy')->name('destroy');
                // post.edit
                Route::get('edit/{'.$segmentRoutes[$key].'}', $value.'TableController@edit')->name('edit');
                Route::get('read/{'.$segmentRoutes[$key].'}', $value.'TableController@read')->name('read');
            });
        }
    });

    // Auth::routes();
    Route::prefix('ajax')->group(function () use ($myRoutes) {
        Route::get('/categories', 'CategoryController@listEn');
        Route::get('/productcategories', 'ProductCategoryController@listEn');
        Route::get('/producttypes', 'ProductTypeController@listEn');
        Route::get('/projectcategories', 'ProjectCategoryController@listEn');
        Route::get('/servicecategories', 'ServiceCategoryController@listEn');

        /*
        Route::post('/login', 'Auth\LoginController@login')->name('ajax.login');
        Route::post('/logout', 'Auth\LoginController@logout')->name('ajax.logout');
        Route::get('/users/checklogin', 'UserController@checkLogin')->name('ajax.login.check');
        Route::get('/statisticals', 'StatisticalController@report')->name('ajax.report');

        foreach ($myRoutes as $key => $value) {
            Route::post('/' . $key, $value . 'Controller@store')->name('ajax.' . $key . '.create')->middleware('auth');
            Route::get('/' . $key, $value . 'Controller@list')->name('ajax.' . $key . '.list')->middleware('auth');
            Route::get('/' . $key . '/paginate', $value . 'Controller@get')->name('ajax.' . $key . '.paginate')->middleware('auth');
            Route::get('/' . $key . '/{' . strtolower($value) . '}', $value . 'Controller@show')->name('ajax.' . $key . '.get')->middleware('auth');
            Route::patch('/' . $key . '/{' . strtolower($value) . '}', $value . 'Controller@update')->name('ajax.' . $key . '.update')->middleware('auth');
            Route::delete('/' . $key . '/{' . strtolower($value) . '}', $value . 'Controller@destroy')->name('ajax.' . $key . '.delete')->middleware('auth');

        }
        */
    });

    Route::get('/admin/{any?}', function () {
        return view('admin.index');
    })->where('any', '.*');
    Route::get('/admin/login', function () {
        return view('admin.index');
    })->name('login');

    //Trang chủ
    Route::get('/', 'HomeEnController@index')->name('homeEn');

    //Liên hệ và đăng ký
    Route::get('/contact', 'CustomerContactEnController@contact')->name('contactEn');
    Route::post('/contact', 'CustomerContactEnController@postContact')->name('addcontactEn');
    Route::post('/subscribe-new', 'SubscriberEnController@postSubscriber')->name('addSubEn');

    //Đối tác
    Route::get('/partners','PartnerEnController@getListPartner')->name('partnersEn');
    Route::get('/partner/{slug}', ['uses' => 'PartnerEnController@detail', 'as' => 'partners.detailEn']);

    //Sản phẩm
    Route::get('/search-product', ['uses' => 'SearchEnController@searchProduct', 'as' => 'products.searchEn']);
    Route::get('/type-product/{type}',['uses' => 'ProductEnController@getListType', 'as' => 'typeEn']);
    Route::get('/products','ProductEnController@getProduct')->name('productsEn');
    Route::get('/product/{product}', ['uses' => 'ProductEnController@detail', 'as' => 'products.detailEn']);
    Route::get('/brand-product/{cate}',['uses' => 'ProductEnController@getListCate', 'as' => 'cate.productEn']);

    //Giải pháp
    Route::get('/solutions','ServiceEnController@getService')->name('servicesEn');
    Route::get('/solution/{slug}','ServiceEnController@detailService')->name('detail_servicesEn');
    Route::get('/category-solution/{slug}','ServiceEnController@listCate')->name('category-serviceEn');

    //Dự án
    Route::get('/projects','ProjectEnController@getProject')->name('projectEn');
    Route::get('/project/{slug}','ProjectEnController@detailProject')->name('detail_projectEn');
    Route::get('/category-project/{slug}', ['uses' => 'ProjectEnController@listCate', 'as' => 'project.cateEn']);

    //Tài liệu
    Route::get('/catalogs','CatalogEnController@getListCatalog')->name('catalogsEn');
    Route::get('/catalog/{slug}', ['uses' => 'CatalogEnController@detail', 'as' => 'catalogs.detailEn']);
    Route::get('/search-catalog','CatalogEnController@searchCatalog')->name('catalogs.searchEn');

    //TIn tức

    Route::get('/category-post/{slug}','PostEnController@listCate');
    Route::get('/search-post', ['uses' => 'SearchEnController@search', 'as' => 'searchpost']);
    Route::get('/posts','PostEnController@getListPost')->name('postEn');
    Route::get('/{post}', ['uses' => 'PostEnController@detail', 'as' => 'posts.detailEn']);


});

/**
 * handler router for admin data table
 */
Route::namespace('Admin')->group(function() use ($myRoutes, $segmentRoutes) {
    foreach ($myRoutes as $key => $value) {
        Route::prefix($key)->as($key.'.')->middleware('auth')->group(function () use ($key, $value, $segmentRoutes) {
            // post.initTable
            Route::get('initTable', $value.'TableController@init')->name('initTable');
            // post.tableData
            Route::get('tableData', $value.'TableController@data')->name('tableData');
            // post.create
            Route::get('create', $value.'TableController@create')->name('create');
            // post.destroy
            Route::delete('{'.$segmentRoutes[$key].'}', $value.'TableController@destroy')->name('destroy');
            // post.edit
            Route::get('edit/{'.$segmentRoutes[$key].'}', $value.'TableController@edit')->name('edit');
            Route::get('read/{'.$segmentRoutes[$key].'}', $value.'TableController@read')->name('read');
        });
    }
});
Route::post('/upload/store', 'UploadController@store');

//Tai backend checkout demo2
Route::post('save-order',[
    'as'=>'save.order',
    'uses'=>'CartController@saveOrder'
]);
Route::get('dat-hang',[
    'as'=>'dathang',
    'uses'=>'CheckoutController@postCheckout'
]);
route::post('dat-hang',[
    'as'=>'dathang',
    'uses'=>'CheckoutController@postCheckout'
]);
route::post('xac-nhan',[
    'as'=>'confirm',
    'uses'=>'CheckoutController@postConfirm'
]);
// end tai checkout

// tai cart
Route::post('addcart', ['uses' => 'CartController@getAddCart', 'as' => 'add.cart']);
Route::post('updatecart', ['uses' => 'CartController@updateCart', 'as' => 'update.cart']);
Route::post('deletecart', ['uses' => 'CartController@deletecart', 'as' => 'delete.cart']);
Route::post('destroycart', ['uses' => 'CartController@destroyCart', 'as' => 'destroy.cart']);
Route::get('mua-hang', function () {
    return view('themes.kovi.checkouts.detail');
})->name('checkout');
// end cart

// tai route product
Route::get('/search', ['uses' => 'SearchController@searchProduct', 'as' => 'products.search']);
Route::get('/the-loai-san-pham/{type}',['uses' => 'ProductController@getListType', 'as' => 'type']);

Route::get('/san-pham','ProductController@getProduct')->name('products');
//Route::get('/the-loai-san-pham/{type}','ProductController@getListType')->name('type');
Route::get('/san-pham/{product}', ['uses' => 'ProductController@detail', 'as' => 'products.detail']);
Route::get('/thuong-hieu-san-pham/{cate}',['uses' => 'ProductController@getListCate', 'as' => 'cate.product']);
// end product

// tai blog
Route::get('/tim-kiem2', ['uses' => 'SearchController@search', 'as' => 'search']);
Route::get('/bai-viet','PostController@getListPost')->name('post');
Route::get('/getcomment', 'PostController@getComment');
Route::post('/writecomment', 'PostController@makeComment');
Route::get('/chuyen-muc/{slug}','PostController@listCate');
Route::get('/tu-khoa/{id}','TagController@getList')->name('tu-khoa');

// end blog

//nguyen partner
Route::get('/doi-tac','PartnerController@getListPartner')->name('partners');
Route::get('/doi-tac/{slug}', ['uses' => 'PartnerController@detail', 'as' => 'partners.detail']);
// end partner

//nguyen catalog
Route::get('/tai-lieu','CatalogController@getListCatalog')->name('catalogs');
Route::get('/tai-lieu/{slug}', ['uses' => 'CatalogController@detail', 'as' => 'catalogs.detail']);
Route::get('/tim-kiem-tai-lieu','CatalogController@searchCatalog')->name('catalogs.search');
//Route::get('/tai-lieu/{slug}', ['uses' => 'PartnerController@detail', 'as' => 'partners.detail']);
// end partner

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function() {
    return redirect()->route('login');
});


Route::get('/lien-he', 'CustomerContactController@contact')->name('contact');

Route::post('/lien-he', 'CustomerContactController@postContact')->name('addcontact');
Route::post('/subscribe', 'SubscriberController@postSubscriber')->name('addSub');
Route::post('/postemail','ComposerServiceProvider@ajaxPost')->name('emailajax');
Route::post('/comment','PostController@comment')->name('comment');

Route::get('/contact', function () {
    return  App\Helpers\Theme::view('contact');
});


/** Nguyen route */
Route::get('/giai-phap','ServiceController@getService')->name('services');
Route::get('/giai-phap/{slug}','ServiceController@detailService')->name('detail_services');
Route::get('/danh-muc-giai-phap/{slug}','ServiceController@listCate')->name('category-service');
/** End Nguyen route */


Route::get('/du-an','ProjectController@getProject')->name('project');
Route::get('/du-an/{slug}','ProjectController@detailProject')->name('detail_project');
Route::get('/danh-muc-du-an/{slug}', ['uses' => 'ProjectController@listCate', 'as' => 'project.cate']);

//Route::get('/danh-muc-du-an/{slug}','ProjectController@listCate');

Route::get('/tim-kiem', ['uses' => 'SearchController@searchProject', 'as' => 'project.search']);

/** End Anh route */
Route::post('/postcontact','ListCustomerContactController@ajaxPost')->name('contactajax');
// Route::get('/test','ListCustomerContactController@viewForm')->name('contactajax');

Route::get('/p/{page}', ['uses' => 'PageController@detail', 'as' => 'pages.detail']);

Route::get('/admin/test', function () {
    return view('admin.main');
});

Route::get('/admin/{any?}', function () {
    return view('admin.index');
})->where('any', '.*');
Route::get('/admin/login', function () {
    return view('admin.index');
})->name('login');

// Auth::routes();
Route::prefix('ajax')->group(function () use ($myRoutes) {
    Route::post('/login', 'Auth\LoginController@login')->name('ajax.login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('ajax.logout');
    Route::get('/users/checklogin', 'UserController@checkLogin')->name('ajax.login.check');
    Route::get('/statisticals', 'StatisticalController@report')->name('ajax.report');

    foreach ($myRoutes as $key => $value) {
        Route::post('/' . $key, $value . 'Controller@store')->name('ajax.' . $key . '.create')->middleware('auth');
        Route::get('/' . $key, $value . 'Controller@list')->name('ajax.' . $key . '.list')->middleware('auth');
        Route::get('/' . $key . '/paginate', $value . 'Controller@get')->name('ajax.' . $key . '.paginate')->middleware('auth');
        Route::get('/' . $key . '/{' . strtolower($value) . '}', $value . 'Controller@show')->name('ajax.' . $key . '.get')->middleware('auth');
        Route::patch('/' . $key . '/{' . strtolower($value) . '}', $value . 'Controller@update')->name('ajax.' . $key . '.update')->middleware('auth');
        Route::delete('/' . $key . '/{' . strtolower($value) . '}', $value . 'Controller@destroy')->name('ajax.' . $key . '.delete')->middleware('auth');

    }
    Route::get('/language/{language}', 'LangController@setLanguage');
});

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/{post}', ['uses' => 'PostController@detail', 'as' => 'posts.detail']);

