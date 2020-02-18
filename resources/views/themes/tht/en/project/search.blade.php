@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{get_site_setting('projects-list-title-en') }}</title>
    <meta name="description" content="{{get_site_setting('projects-list-description-en') }}">
    <meta name="keywords" content="{{get_site_setting('projects-list-keywords-en') }}">
    <meta property="og:title" content="{{get_site_setting('projects-list-title-en') }}">
    <meta property="og:description" content="{{get_site_setting('projects-list-description-en') }}">
    <meta name="twitter:title" content="{{get_site_setting('projects-list-title-en') }}">
    <meta name="twitter:description" content="{{get_site_setting('projects-list-description-en') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{$project[0]->first()['image']}}">
    <meta property="og:image" content="{{$project[0]->first()['image']}}">
@endsection
@section('after_css')

@endsection
@section('content')
  <!-- CONTENT -->

        <!-- Intro Section -->
        <section class="inner-intro bg-img12 overlay-light parallax parallax-background2">
            <div class="container">
                <div class="row title">
                    <h2 class="h2">{{__('Project')}}</h2>
                    <div class="page-breadcrumb">
                        <a>{{__('Home')}}</a>/<a>{{__('Project')}}</a>
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
        <section class="ptb ptb-sm-80">
            <div class="container">
				@if($count>0)
                <p>{{__('Find')}} {{$count}} {{__('match results')}} <i><b>{{$key}}</b></i> </p>
                @else
                <p>{{__('No results found for')}}  <i><b>{{$key}}</b></i></p>
                @endif
                <div class="row container-masonry nf-col-3">
                    @foreach ($project as $item)
                    <div class="nf-item spacing">
                        <div class="item-box">
                            <a href="{{route('detail_project', ['slug' => $item->slug])}}">
                            <img alt="1" src="{{$item['projectimages']->first()['image']}}" class="item-container" onerror="this.src='{{asset_theme ('img/noproject.png')}}'">
                                <div class="item-mask">
                                    <div class="item-caption">
                                    <h5 class="white">{{$item->title}}</h5>
{{--                                        <p class="white">Branding, Design</p>--}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach


                </div>

            </div>

        </section>
        <!-- End Work Detail Section -->

        <div class="pagination-nav mt-60 mt-xs-30">
            <div>{{ $project->links() }}</div>
        </div>
         <!-- Contact-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="buttons">
                        <h2>{{__("Project's cqategory")}}</h2>
                        <a href="{{route('project')}}" class="btn btn-color-line  btn-lg">{{__('All')}}</a>
                        @foreach ($cate as $item)
                            <a href="{{asset('category-project/'.$item->slug)}}" class="btn btn-color-line  btn-lg">{{$item->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

<!-- End Client Logos Section -->
  <!--End Contact-->
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script><script async src="https://static.addtoany.com/menu/page.js"></script>
@endsection
