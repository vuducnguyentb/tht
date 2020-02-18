@extends('themes.tht.layouts.main')
@section('seo_support')
    <title>{{get_site_setting('projects-cate-title') }}</title>
    <meta name="description" content="{{get_site_setting('projects-cate-description') }}">
    <meta name="keywords" content="{{get_site_setting('projects-cate-keywords') }}">
    <meta property="og:title" content="{{get_site_setting('projects-cate-title') }}">
    <meta property="og:description" content="{{get_site_setting('projects-cate-description') }}">
    @if($project[0] != null && $project[0]['projectimages']->first() != null)
        <meta property="og:image" content="{{route('posts.detail',$project[0]['projectimages']->first()['image'])}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('project.cate',$cate_id->slug)}}">
    <meta name="twitter:title" content="{{get_site_setting('projects-cate-title') }}">
    <meta name="twitter:description" content="{{get_site_setting('projects-cate-description') }}">
    <meta name="twitter:card" content="summary_large_image">
    @if($project[0] != null && $project[0]['projectimages']->first() != null)
        <meta name="twitter:image" content="{{route('posts.detail',$project[0]['projectimages']->first()['image'])}}">
    @else
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
        {{--    @if($project[0] != null )--}}
{{--        <meta name="twitter:image" content="{{route('posts.detail',$project[0]['projectimages']->first()['image'])}}">--}}
{{--    @else--}}
{{--        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">--}}
{{--    @endif--}}
@endsection
@section('after_css')
<link href="{{asset_theme ('css/project/list.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
  <!-- CONTENT -->

  <!-- Intro Section -->
  <section class="inner-intro bg-img16 light-color overlay-dark parallax parallax-background2" style="">
      <div class="container">
          <div class="row title">
              <h2 class="h2">Dự án</h2>
              <div class="page-breadcrumb">
                  <a href="{{route('home')}}">Trang chủ</a>/<span>Dự án</span>
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
        <section id="cate">
            <div class="container">
                <div class="row padding-top">
                    <div class="buttons" id="myDIV">
                            <a id="tit2" href="{{route('project')}}" class="btn btn-color-line btn-lg ">Tất cả</a>
                            @foreach ($cate as $item)
                                <a id="tit" href="{{asset('danh-muc-du-an/'.$item->slug)}}" class="nut btn btn-color-line btn-lg">{{$item->name}}</a>
                            @endforeach
                    </div>

                </div>

                <nav style="padding-top:50px" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><h5 class="bred">Dự án</h5></li>
                        <li class="breadcrumb-item"><a class="bred" href="{{asset('danh-muc-du-an/'.$item->slug)}}">{{$cate_id->name}}</a></li>
                        </ol>
                    </nav>
            </div>
        </section>

        <section id="about" class="wow fadeIn ptb ptb-sm-80">
            @if(count($project) >0 )
                <div class="container">
                    @foreach ($project as $item)
                    <div class="pro">
                    <div class="row mt-0">
                        <div class="col-md-6 col-sm-6 mb-xs-30">

                                <a href="{{route('detail_project', ['slug' => $item->slug])}}">
                                    <img src="{{$item['projectimages']->first()['image']}}" onerror="this.src='{{asset_theme ('img/noproject.png')}}'" alt="">
                                </a>

                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="panel-group">

                                    <a href="{{route('detail_project', ['slug' => $item->slug])}}"><h5 class="white">{{$item->title}}</h5></a>
                                    <p id="bd">{{strip_tags($item->body)}}</p>
                                    <a href="{{route('detail_project', ['slug' => $item->slug])}}" class="btn-text mt-15">Xem thêm</a>

                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagi">
                    <div class="container-masonry row">
                        <div class="text-right pd-25">
                            <div>{{ $project->links() }}</div>
                        </div>
                    </div>
                </div>
                @else
                <div class="container">
               <h3>Dự án đang được cập nhập</h3>
                </div>
                @endif
            </section>
  @include('themes.tht.sections.partner')
    @endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
<script>
// var url = window.location.href;
// var tg = url.split('/');

//     jQuery('#cate .container .row .buttons a').each(function(){

//         url_this = jQuery(this).attr("href");
//         var ts = url_this.split('/');

//             if(decodeURIComponent(tg[tg.length -2]) === decodeURIComponent(ts[ts.length -1]) ){
//                 jQuery(this).addClass('active');
//                 return false;
//             }else{
//                 if(decodeURIComponent(tg[tg.length -2]) === decodeURIComponent(ts[ts.length -2]) ){
//                     jQuery(this).addClass('active');
//                     return false;
//                 }
//             }
    //     if(decodeURIComponent(tg[tg.length -2]) === decodeURIComponent(ts[ts.length -1])){
    //         jQuery(this).addClass('active');
    //         jQuery(this).removeClass('active').addClass('active');
    // }
    });
</script>
@endsection
