@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{$post->title}}</title>
    @if($post->meta_description != null)
    <meta name="description" content="{{$post->meta_description}}">
    @endif
    @if($post->excerpt != null)
    <meta name="description" content="{{$post->excerpt}}">
    @endif
    <meta name="description" content="{{Str::words($post->body,25,'...')}}">
    <meta name="keywords" content="{{$post->meta_keywords}}">
    <meta property="og:title" content="{{$post->title}}">
    @if($post->meta_description != null)
        <meta property="og:description" content="{{$post->meta_description}}">
    @endif
    @if($post->image != null)
        <meta property="og:image" content="{{route('posts.detailEn',$post->image)}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('posts.detailEn',$post->slug)}}">
    <meta name="twitter:title" content="{{$post->title}}">
    @if($post->meta_description != null)
        <meta name="twitter:description" content="{{$post->meta_description}}">
        @endif
    @if($post->image != null)
        <meta name="twitter:image" content="{{route('posts.detailEn',$post->image)}}   ">
    @else
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('after_css')
    <link rel="stylesheet" href="{{asset_theme ('css/post/detail.css')}}"/>
    {{-- <link rel="stylesheet" href="{{asset_theme ('css/detailpost.css')}}" type="text/css"/> --}}
    <meta name="csrf_token" content="{{csrf_token()}}">@endsection
@section('content')
<section class="inner-intro bg-img24 overlay-dark light-color parallax parallax-background2">
        <div class="container">
            <div class="row title">
            <h2 class="h2">{{$post->title}}</h2>
                <div class="page-breadcrumb">
                <a href="{{route('homeEn')}}">{{__('Home')}}</a>/ {{$post->title}}
                </div>
            </div>
        </div>
    </section>
    <div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:0px; top:100px;">
        <a href="https://www.facebook.com/" class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_pinterest"></a>
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    </div>
    <section class="ptb ptb-sm-80">
            <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                    <div class="text-justify">{!! $post->body !!}</div>
                                {{-- </article> --}}
                            </div>
                </div>
            </div>
    </section>

    @include('themes.tht.en.sections.partner')
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
@endsection
