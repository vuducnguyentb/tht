@extends('themes.tht.layouts.main')
@section('seo_support')
    <title>  {{get_site_setting('404-title')}}</title>
    <meta name="description" content="{{get_site_setting('404-description')}}">
    <meta name="keywords" content="{{get_site_setting('404-keyworks')}}">
    <meta property="og:title" content=" {{get_site_setting('404-title')}}">
    <meta property="og:description" content="{{get_site_setting('404-description')}}">
    <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    <meta property="og:url" content="{{route('posts.detail','')}}">
    <meta name="twitter:title" content="{{get_site_setting('404-title')}}">
    <meta name="twitter:description" content="{{get_site_setting('404-description')}}">
    <meta name="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('after_css')
    <link rel="stylesheet" href="{{asset_theme ('css/404.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
@endsection
@section('content')
<section class="notfound">
<div class="error">
                <div class="container-floud">
                    <div class="col-xs-12 ground-color text-center">
                        <div class="container-error-404">
                            <div class="clip"><div class="shadow"><span class="digit thirdDigit"></span></div></div>
                            <div class="clip"><div class="shadow"><span class="digit secondDigit"></span></div></div>
                            <div class="clip"><div class="shadow"><span class="digit firstDigit"></span></div></div>
                            <div class="msg">OH!<span class="triangle"></span></div>
                        </div>
                        <h2 class="h1">Lỗi! Trang không tồn tại</h2>
                        <div class="row text-center pt-30">
                            <div class="col-xs-12">
                               <a href="{{route('home')}}"><button class="btn btn-md btn-black ">Về Trang chủ</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Error Page -->
</section>
@endsection
@section('after_js')
<script>
function randomNum()
        {
            "use strict";
            return Math.floor(Math.random() * 9)+1;
        }
            var loop1,loop2,loop3,time=30, i=0, number, selector3 = document.querySelector('.thirdDigit'), selector2 = document.querySelector('.secondDigit'),
                selector1 = document.querySelector('.firstDigit');
            loop3 = setInterval(function()
            {
              "use strict";
                if(i > 40)
                {
                    clearInterval(loop3);
                    selector3.textContent = 4;
                }else
                {
                    selector3.textContent = randomNum();
                    i++;
                }
            }, time);
            loop2 = setInterval(function()
            {
              "use strict";
                if(i > 80)
                {
                    clearInterval(loop2);
                    selector2.textContent = 0;
                }else
                {
                    selector2.textContent = randomNum();
                    i++;
                }
            }, time);
            loop1 = setInterval(function()
            {
              "use strict";
                if(i > 100)
                {
                    clearInterval(loop1);
                    selector1.textContent = 4;
                }else
                {
                    selector1.textContent = randomNum();
                    i++;
                }
            }, time);
</script>
@endsection
