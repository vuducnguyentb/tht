@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{$post->title}}</title>
    <meta name="title" content="{{$post->title}}">
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
@section('content')
@section('after_css')
    <link rel="stylesheet" href="{{asset_theme ('css/post/detail.css')}}"/>
    <link rel="stylesheet" href="{{asset_theme ('css/post/social.css')}}"/>
@endsection
@section('content')
<section class="inner-intro bg-img17 overlay-dark light-color parallax parallax-background2">
        <div class="container">
            <div class="row title">
                <h2 class="h2">{{__('Post')}}</h2>
                <div class="page-breadcrumb">
                    <a href="{{route('homeEn')}}">{{__('Home')}}</a>/<a>{{__('Post')}}</a>
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
                <div class="col-lg-9 col-md-9 blog-post-hr">
                    <div class="blog-post mb-30">
                        <div class="post-meta"><span> <span>{{$post['author']->name ?? ''}}</span>,</span> <span>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}} </span></div>

                        <div class="post-header">
                            <h3 id="tit"><a href="{{route('posts.detailEn', ['slug' => $post->slug])}}">{{$post->title}}</a></h3>
                        </div>

                        <div class="post-media">

                        <a href="{{route('posts.detailEn', ['slug' => $post->slug])}}"> <img id="img-w" alt="" src="{{$post->image ?? ''}}"> </a>

                        </div>
                        <div class="post-entry">
                               <p> {{ $post ->excerpt }}</p>
                             </div>
                        <div class="post-entry">
                            <p>{!! $post ->body !!}</p>
                         </div>

                        <div class="social">
                            @include('themes.tht.share.social')
                        </div>
                    </div>

                    <hr />
                </div>
                <!-- End Post Bar -->

                <!-- Sidebar -->
                <div class="col-lg-3 col-md-3 mt-sm-30">

                            <div class="sidebar-widget">
                                <h5>{{__('Search post')}}</h5>
                                <div class="widget-search">
                                    <form action="/search-post" method="get" name="s" role="search" >
                                        <input class="form-full input-lg" type="text"  placeholder="{{__('Enter post')}}" id="search" name="s">
                                    </form>
                                </div>
                            </div>

                    <div class="sidebar-widget">
                        <h5>{{__('New post')}}</h5>
                        <hr>
                        <ul class="widget-post">


                            @foreach ($postsNew as $item)
                            <li>
                                    <a href="{{route('posts.detailEn', ['slug' => $post->slug])}}" class="widget-post-media">
                                        @if(!empty($item->image))
                                    <img style="height: 50px;" src="{{ $item->image }}" alt="">
                                    @else
                                    <img src="{{asset_theme ('img/nopost.png')}}" alt="">
                                    @endif

                                    </a>
                                    <div class="widget-post-info">
                                    <p><a href="{{route('posts.detailEn', ['slug' => $item->slug])}}">{!! Str::words($item->title, 13,'....')  !!}</a></p>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('themes.tht.en.sections.partner')
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>@endsection
