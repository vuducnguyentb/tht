@extends('themes.tht.layouts.main')
@section('seo_support')
    <title>
        {!!strip_tags(\App\Helpers\Base::getSetting('title-home'))!!}
    </title>
    <meta name="description" content="{!!strip_tags(\App\Helpers\Base::getSetting('home-description'))!!}" />
    <meta name="keywords" content="{!!strip_tags(\App\Helpers\Base::getSetting('home-keywords'))!!}" />
    <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    <meta property="og:title" content="{!!strip_tags(\App\Helpers\Base::getSetting('title-home'))!!}">
    <meta property="og:description" content="{!!strip_tags(\App\Helpers\Base::getSetting('home-description'))!!}">
    <meta property="og:url" content="{{route('home')}}">
    <meta name="twitter:title" content=" {!!strip_tags(\App\Helpers\Base::getSetting('title-home'))!!}">
    <meta name="twitter:description" content="{!!strip_tags(\App\Helpers\Base::getSetting('home-description'))!!}">
    <meta name="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('after_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css"/>
    <link rel="stylesheet" href="{{asset_theme ('css/homeindex.css')}}" type="text/css"/>
@endsection
@section('content')
@include('themes.tht.home.sections.slides')
<section id="page-item" class="pt-30">
    <div class="container-fluid">
        <div class="row mt-0">
    @include('themes.tht.home.articles.companies')
    @include('themes.tht.home.articles.products')
    @include('themes.tht.home.articles.services')
    @include('themes.tht.home.articles.projects')
        </div>
    </div>
</section>

@include('themes.tht.home.sections.partners')
@include('themes.tht.home.sections.contact')
@endsection
