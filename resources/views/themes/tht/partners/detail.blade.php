@extends('themes.tht.layouts.main')
@section('seo_support')
    <title>{{$partner->name}}</title>
    @if($partner->meta_description != null)
    <meta name="description" content="{{$partner->meta_description}}">
    @endif
    <meta name="description" content="{{Str::words($partner->body,25,'...')}}">
    @if($partner->meta_keywords != null)
        <meta name="keywords" content="{{$partner->meta_keywords}}">
    @endif
    <meta property="og:title" content="{{$partner->name}}">
    @if($partner->meta_description != null)
        <meta property="og:description" content="{{$partner->meta_description}}">
    @endif
    @if($partner->image != null)
        <meta property="og:image" content="{{route('posts.detail',$partner->image)}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('partners.detail',$partner->slug)}}">
    <meta name="twitter:title" content="{{$partner->name}}">
    @if($partner->meta_description != null)
        <meta name="twitter:description" content="{{$partner->meta_description}}">
    @endif
    @if($partner->image != null)
        <meta name="twitter:image" content="{{route('posts.detail',$partner->image)}}">
    @else
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('after_css')
    <link rel="stylesheet" href="{{asset_theme ('css/partner/detail.css') }}">
@endsection
@section('content')
    <section class="inner-intro overlay-dark bg-img1 light-color">
        <div class="container">
            <div class="row title">
                <h2 class="h2">{{$partner->name}}-Đối tác</h2>
                <div class="page-breadcrumb">
                    <a href="{{route('home')}}">Trang chủ</a>/<span>{{$partner->name}}</span>
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
    <section class="partner ptb">
        <div class="container">
            {!!strip_tags($partner->body,'<p><a><h2><h3><br><img><ul><i><div><li><table><quote><em><strong><iframe>')!!}
        </div>
    </section>
    @include('themes.tht.sections.partner')
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
@endsection
