
@extends('themes.tht.layouts.main')
@section('seo_support')
    <title>{{get_site_setting('products-filter-title') }}</title>
    <meta name="description" content="{{get_site_setting('products-filter-description') }}">
    <meta name="keywords" content="{{get_site_setting('products-filter-keywords') }}">
    <meta property="og:title" content="{{get_site_setting('products-filter-title') }}">
    <meta property="og:description" content="{{get_site_setting('products-filter-description') }}">
    @if($product_type[0] == null || $product_type[0]['images'] == null || $product_type[0]['images']->first()['image'] == null)
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @else
        <meta property="og:image" content="{{route('posts.detail',$product_type[0]['images']->first()['image'])}}">
    @endif
    <meta property="og:url" content="{{route('type',$list_type->slug)}}">


    <meta name="twitter:title" content="{{get_site_setting('products-filter-title') }}">
    <meta name="twitter:description" content="{{get_site_setting('products-filter-description') }}">
    <meta name="twitter:card" content="summary_large_image">
    @if($product_type[0] == null || $product_type[0]['images'] == null || $product_type[0]['images']->first()['image'] == null)
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @else
        <meta name="twitter:image" content="{{route('posts.detail',$product_type[0]['images']->first()['image'])}}">
    @endif
@endsection
@section('after_css')
<link href="{{asset_theme ('css/product/list.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section class="inner-intro bg-img19 overlay-dark light-color parallax parallax-background2">
    <div class="container">
        <div class="row title">
            <h2 class="h2">Sản phẩm</h2>
            <div class="page-breadcrumb">
                <a href="{{route('home')}}">Trang chủ</a>/ Sản phẩm
            </div>
        </div>
    </div>
</section>
    <div class="clearfix"></div>
    <div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:0px; top:100px;">
        <a href="https://www.facebook.com/" class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_pinterest"></a>
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    </div>
    <section  class="container product pd-top">
            <div class="row sli">
                    <div class="col-sm-3 slid col-md-3" >
                        <h3 id="cate3">Danh mục</h3>
                    </div>
                    <div class="col-sm-9 bread">
                            <nav aria-label="breadcrumb" style="font-size: 16px;">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">{{$cate_with_type->name}}</li>
                                        <li class="breadcrumb-item " >{{$list_type->name}}</li>
                                    </ol>
                            </nav>
                    </div>
                </div>
            <div class="row">
                <div class="col-sm-3 col-md-3 mb-30">
                    <div class="accordion">

                        @foreach ($cate as $item)
                            <div class="accordion-section">
                                <h5 href="#{{$item->id}}" class="accordion-title">{{ $item->name}}</h5>
                                <div class="accordion-content">
                                @foreach ($item->producttypes as $type)
                                    <p id="{{$item->id}}"><a href="/the-loai-san-pham/{{$type->slug}}">{{$type->name}}</a></p>
                                @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div  class="col-sm-9 col-md-9">
                        <div class="row container-grid">

                            {{-- @if(isset($product_type)) --}}
                            @if ($count == 0)
                            <div class="col-md-11 nf-item spacing-grid">
                                    <div class="blog-post">
                                        <div class="post-media">
                                            <blockquote>{!!strip_tags(\App\Helpers\Base::getSetting('product-type'))!!}</blockquote>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @foreach ($product_type as $item)
                                    <div class="nf-item col-md-4 col-xs-12 mb-30">
                                        <div class="item-box">
                                            <!-- Shop item images -->
                                            <div class="shop-item">
                                                <div class="item-img prod">
                                                        <a href="/san-pham/{{$item->slug}}">
                                                            @if(empty($item['images']->first()['image']))
                                                            <img src="{{asset_theme ('img/noproduct.png')}}" alt="">
                                                            @else
                                                                <img src="{{$item['images']->first()['image'] ??''}}"  onerror="this.src='{{App\Helpers\Theme::assetsPath('img/noproduct.png')}}'" alt="" />
                                                           @endif
                                                        </a>
                                                </div>
                                            </div>
                                            <div class="shop-item-info pr-text">
                                            <a href="/san-pham/{{$item->slug}}"> <h5 class="shop-item-name">{{ $item->name}}</h5> </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                {{-- @else
                            @endif --}}
                        </div>
                        <div  class="pagination-nav mt-60 mt-xs-30">
                                <div>{{ $product_type->links() }}</div>
                        </div>
                </div>
            </div>

</section>
@include('themes.tht.sections.partner')
   <!-- Tab Section Section -->

    <!-- End Tab Section Section -->
@endsection
@section('after_js')
{{--<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>--}}

    <script>
            $(function () {
                setNavigation();
            });

            function setNavigation() {
                var path = window.location.pathname;
                path = path.replace(/\/$/, "");
                path = decodeURIComponent(path);

                $(".accordion .accordion-section .accordion-content p a").each(function () {
                    var href = $(this).attr('href');
                    if (path.substring(0, href.length) === href) {
                        $(this).closest('a').addClass('active');
                    }
                });
            }
            $(document).ready(function() {
            $('.accordion-content p a.active').closest('div.accordion-section').find('h5.accordion-title').addClass('active');
            });
</script>
@endsection
