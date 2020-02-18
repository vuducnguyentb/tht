@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{get_site_setting('projects-list-title-en') }}</title>
    <meta name="description" content="{{get_site_setting('projects-list-description-en') }}">
    <meta name="keywords" content="{{get_site_setting('projects-list-keywords-en') }}">
    <meta property="og:title" content="{{get_site_setting('projects-list-title-en') }}">
    <meta property="og:description" content="{{get_site_setting('projects-list-description-en') }}">
    @if($project[0] == null || $project[0]['projectimages']->first() == null )
    <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @else
        <meta property="og:image" content="{{route('posts.detailEn',$project[0]['projectimages']->first()['image'])}}">
    @endif
    <meta property="og:url" content="{{route('projectEn')}}">

    <meta name="twitter:title" content="{{get_site_setting('projects-list-title-en') }}">
    <meta name="twitter:description" content="{{get_site_setting('projects-list-description-en') }}">
    <meta name="twitter:card" content="summary_large_image">
    @if($project[0] == null || $project[0]['projectimages']->first() == null )
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @else
        <meta name="twitter:image" content="{{route('posts.detailEn',$project[0]['projectimages']->first()['image'])}}">
    @endif

@endsection
@section('after_css')
<link href="{{asset_theme ('css/project/list.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
  <!-- CONTENT -->

  <!-- Intro Section -->
  <section class="inner-intro bg-img16 light-color overlay-dark parallax parallax-background2">
      <div class="container">
          <div class="row title">
              <h2 class="h2">{{__('Project')}}</h2>
              <div class="page-breadcrumb">
                  <a href="{{route('homeEn')}}">{{__('Home')}}</a>/<span>{{__('Project')}}</span>
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
        <!-- Work Detail Section -->
        <div class="clearfix"></div>
  @if($project[0] != null)
      <section id="cate">
                <div class="container">
                    <div class="row padding-top">
                        <div class="buttons">
{{--                            @if($locale == 'en')--}}
                                <a id="tit2" href="{{route('projectEn')}}" class="btn btn-color-line  btn-lg">{{__('All')}}</a>
                                @foreach ($cate as $item)
                                    <a id="tit" href="{{asset('category-project/'.$item->slug)}}" class="btn btn-color-line btn-lg">{{$item->name}}</a>
                                @endforeach
{{--                                @else--}}
{{--                                <a id="tit2" href="{{route('project')}}" class="btn btn-color-line  btn-lg">@lang('project.project_all')</a>--}}
{{--                                @foreach ($cate as $item)--}}
{{--                                    <a id="tit" href="{{asset('danh-muc-du-an/'.$item->slug)}}" class="btn btn-color-line btn-lg">{{$item->name}}</a>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

                        </div>

                    </div>


                    <div style="height: 10px"></div>
                </div>
            </section>
			<section id="about" class="wow fadeIn ptb ptb-sm-80">
                <div class="container">
                        @foreach ($project as $item)
                        <div class="pro">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 mb-xs-30">
                                <img src="{{$item['projectimages']->first()['image']}}" onerror="this.src='{{asset_theme ('img/noproject.png')}}'" alt="">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="panel-group">
{{--                                    @if($locale == 'en')--}}
                                        <a href="{{route('detail_projectEn', ['slug' => $item->slug])}}"><h5 class="white">{{$item->title}}</h5></a>
                                        <p id="bd">{{strip_tags($item->body)}}</p>
                                        <a href="{{route('detail_projectEn', ['slug' => $item->slug])}}" class="btn-text mt-15">{{__('See more')}}</a>
{{--                                        @else--}}
{{--                                        <a href="{{route('detail_project', ['slug' => $item->slug])}}"><h5 class="white">{{$item->title}}</h5></a>--}}
{{--                                        <p id="bd">{{strip_tags($item->body)}}</p>--}}
{{--                                        <a href="{{route('detail_project', ['slug' => $item->slug])}}" class="btn-text mt-15">Xem thêm</a>--}}
{{--                                        @endif--}}

                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                    </div>

                @else
                    <h2 class="text-center">{{__('The project is updating')}}</h2>
                @endif
                    <div class="pagi">
                        <div class="container-masonry row">
                            <div class="text-right pd-25">
                                <div>{{ $project->links() }}</div>
                            </div>
                        </div>
                    </div>

                </section>

  <!--End Contact-->
  @include('themes.tht.en.sections.partner')
@endsection
@section('after_js')

<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
@endsection
