@extends('themes.tht.layouts.main')
@section('seo_support')
    <title>{{$service->title}}</title>
    @if($service->meta_description != null)
        <meta name="description" content="{{$service->meta_description}}">
    @endif
    <meta name="description" content="{{Str::words($service->body,25,'...')}}">
    <meta name="keywords" content="{{$service->meta_keywords}}">
    <meta property="og:title" content="{{$service->title}}">
    @if($service->meta_description != null)
        <meta property="og:description" content="{{$service->meta_description}}">
    @endif
    @if($service->image != null)
        <meta property="og:image" content="{{route('posts.detail',$service->image)}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('detail_services', ['slug' => $service->slug])}}">
    <meta name="twitter:title" content="{{$service->title}}">
    @if($service->meta_description != null)
        <meta name="twitter:description" content="{{$service->meta_description}}">
    @endif
    @if($service->image != null)
        <meta name="twitter:image" content="{{route('posts.detail',$service->image)}}">
    @else
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('after_css')
<link rel="stylesheet" href="{{asset_theme ('css/services.css')}}" />
@endsection
@section('content')
<section class="inner-intro bg-img18 overlay-dark light-color parallax parallax-background2">
    <div class="container">
        <div class="row title">
            <h2 class="h2">Giải pháp</h2>
            <div class="page-breadcrumb">
                <a href="{{route('home')}}">Trang chủ</a>/<span>{{$service->title}}</span>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!-- End Intro Section -->
<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:0px; top:100px;">
    <a href="https://www.facebook.com/" class="a2a_button_facebook"></a>
    <a class="a2a_button_twitter"></a>
    <a class="a2a_button_pinterest"></a>
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
</div>
<!-- Blog Post Section -->
<section class="ptb ptb-sm-80">
    <div class="container">
        <div class="row">
            <!-- Post Bar -->
            <div class="col-md-12 blog-post-hr">
                <div class="blog-post mb-30">
                    <div class="post-meta"><span> <a>THT - Việt Nam</a>,</span> <span>{{ \Carbon\Carbon::parse($service->created_at)->format('d/m/Y')}} </span></div>
                    <div class="post-header">
                    <h2>{{$service->title}}</h2>
                    </div>
                    <hr />
                    <div class="post-media">
                    <img alt="" src="{{$service->image}}"  onerror="this.src='{{asset_theme ('img/noservice.png')}}'">
                    </div>

                    <div class="post-entry">
                        <p>{!!strip_tags(($service->body),'<section><h2><h3><div><p><a><br><img><ul><li><table><quote><em><strong>')!!}</p>
                    </div>
                </div>
                <hr />

                <div class="clearfix"></div>
            </div>
            <!-- End Post Bar -->
        </div>
    </div>
</section>
@include('themes.tht.sections.partner')
<!-- End Blog Post Section -->
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
@endsection
