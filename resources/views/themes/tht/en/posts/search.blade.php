@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{get_site_setting('posts-search-title-en') }}</title>
    <meta name="description" content="{{get_site_setting('posts-search-description-en') }}">
    <meta name="keywords" content="{{get_site_setting('posts-search-keywords-en') }}">
    <meta property="og:title" content="{{get_site_setting('posts-search-title-en') }}">
    <meta property="og:description" content="{{get_site_setting('posts-search-description-en') }}">
    @if(($post[0]) !== null)
        <meta property="og:image" content="{{$post[0]->image}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('searchEn')}}">
    <meta name="twitter:title" content="{{get_site_setting('posts-search-title-en') }}">
    <meta name="twitter:description" content="{{get_site_setting('posts-search-description-en') }}">
    <meta name="twitter:card" content="summary_large_image">

    @if(($post[0]) !== null)
    <meta name="twitter:image" content="{{$post[0]->first()['image']}}">
    @else
    <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
@endsection
@section('after_css')
<link href="{{asset_theme ('css/post/list.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section class="inner-intro bg-img17 overlay-dark light-color parallax parallax-background2">
        <div class="container">
            <div class="row title">
                <h2 class="h2">{{__('Post')}}</h2>
                <div class="page-breadcrumb">
                <a href="{{route('homeEn')}}">{{__('Home')}}</a>/<a>{{__('Post')}}</a><span>
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
                <section class="ptb ptb-sm-80">
                    <div class="container">
                       <!-- Post Item -->
                        <div class="row container-masonry">
                                @if($count>0)
                                <p>{{__('Find')}} {{$count}} {{__('result')}} <i><b>{{$key}}</b></i> </p>
                                @else
                                <p>{{__('Result is not found')}}  <i><b>{{$key}}</b></i></p>
                                @endif
                            @foreach ($post as $item)
                                <div class="col-md-4 col-sm-6 col-xs-12 nf-item spacing-grid">
                                    <div class="blog-post">
                                        <div class="post-media">
                                           <a href="{{route('posts.detailEn', ['slug' => $item->slug])}}">
                                            @if(!empty( $item->image ))
                                                    <img class="item-container" src="{{$item->image}}" alt="1" />

                                            @else
                                            <img class="item-container" src="https://photo2.tinhte.vn/data/attachment-files/2017/07/4079292_Chup_thu_Nikon_D7500_camera.tinhte.vn_06.jpg" alt="1" />
                                            @endif
                                            <a href="{{route('posts.detailEn', ['slug' => $item->slug])}}">
                                        </div>
                                        <div class="post-meta"><span>by <a>{{$item['author']->name ?? ''}}</a>,</span> <span> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span></div>
                                        <div class="post-header">
                                            <h5><a href="{{route('posts.detailEn', ['slug' => $item->slug])}}">{{ $item->title}}</a></h5>
                                        </div>
                                        <div class="post-entry">
                                        <p>{{ $item->excerpt}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="pagination-nav mt-60 mt-xs-30">
                                <div>{{ $post->appends('s',$key)->links() }}</div>
                        </div>
                    </div>
                </section>
                @include('themes.tht.sections.en.partner')
   @endsection
   @section('after_js')
   <script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
@endsection
