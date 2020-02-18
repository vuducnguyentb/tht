@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{$project->title}}</title>
    @if($project->meta_description != null)
    <meta name="description" content="{{$project->meta_description}}">
    @endif
    <meta name="description" content="{{Str::words($project->body,25,'...')}}">
    <meta name="keywords" content="{{$project->meta_keywords}}">
    <meta property="og:title" content="{{$project->title}}">
    @if($project->meta_description != null)
        <meta property="og:description" content="{{$project->meta_description}}">
    @endif
    @if($project['projectimages'] != null && $project['projectimages']->first() != null)
        <meta property="og:image" content="{{route('posts.detailEn',$project['projectimages']->first()['image'])}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('detail_projectEn',$project->slug)}}">

    <meta name="twitter:title" content="{{$project->title}}">
    @if($project->meta_description != null)
        <meta name="twitter:description" content="{{$project->meta_description}}">
    @endif
        @if($project['projectimages'] != null && $project['projectimages']->first() != null)
        <meta name="twitter:image" content="{{route('posts.detailEn',$project['projectimages']->first()['image'])}}">
    @else
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('after_css')
 <link href="{{asset_theme ('css/project/detail.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
 <!-- Intro Section -->

 <section class="inner-intro bg-img21 overlay-dark light-color parallax parallax-background2">
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
<!-- Blog Post Section -->

<section class="ptb ptb-sm-80">
    <div class="container">
        <div class="row">
            <!-- Post Bar -->
            <div class="col-lg-9 col-md-9 blog-post-hr">
                <div class="blog-post mb-30">
                    <div class="post-meta"><span> <a>{{__('Project')}}</a>,</span> <span>{{ \Carbon\Carbon::parse($project->created_at)->format('d/m/Y')}} </span></div>

                    <div class="post-header">
                    <h2>{{$project->title}}</h2>
                    </div>
                    <div class="post-media text-center">
                        <img src="{{$project['projectimages']->first()['image']}}" alt="" onerror="this.src='{{asset_theme ('img/noproject.png')}}'" />
                    </div>
                    <hr/>
                    <section id="shop-item" class="ptb img pt-sm-80">
                        <div class="content ">
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                        Launch demo modal
                        </button> -->

                        <div class="row text-center owl-carousel item4-carousel nf-carousel-theme o-flow-hidden">
                        @foreach ($projectImages as $item)
                            <img id="myImg" src="{{$item->image}}"  data-toggle="modal" data-target="#exampleModalLong-{{$item->id}}" class="img-project">
                         @endforeach
                        </div>
                        <!-- Modal -->

                        @foreach ($projectImages as $item)
                        <div class="modal fade" id="exampleModalLong-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
{{--                                <h5 class="modal-title" id="exampleModalLongTitle">Ảnh dự án</h5>--}}
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="owl-carousel item1-carousel nf-carousel-theme o-flow-hidden">
                                    <div class="item text-center">

                                    <img id="myImg" src="{{$item->image}}" data-toggle="modal" data-target="#exampleModalLong">
                                    </div>
                                    @foreach ($projectImages as $item)
                                        <div class="item text-center">
                                            <img  src="{{$item->image}}" alt="" />
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> -->
                            </div>
                        </div>
                        </div>
                        @endforeach

                            <hr />
                        </div>
                    </section>


                    <div class="post-entry">
                        <p>{!!strip_tags($project->body,'<p><br><img><ul><li><table><quote><em><strong>')!!}</p>
                    </div>
                    {{-- <div class="post-tag pull-left"><span><a>Branding</a>,</span><span><a>Design</a></span></div> --}}
                </div>


            </div>
            <!-- End Post Bar -->
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-3 mt-sm-30">
                <div class="sidebar-widget">
                    {{-- <h5>Tìm kiếm</h5> --}}
                    {{-- <div class="widget-search">
                        <input class="form-full input-lg" type="text" value="" placeholder="Search Here" name="search" id="wid-search">
                        <input type="submit" value="" name="email" id="wid-s-sub">
                    </div> --}}
                    {{-- <form action="{{route('project.search')}}" method="get" name="s" role="search">
                            <div class="form-group">
                               <input type="text" class="form-controller form-control" placeholder="Tìm dự án..."  id="search" name="search"></input>
                           </div>
                       </form> --}}
                </div>
                <div class="sidebar-widget">
                    <h5>{{__("Project's category")}}</h5>
                    <hr>
                    <ul>
{{--                        @if($locale == 'en')--}}
                            @foreach ($cate as $item)
                                <li><a href="{{asset('category-project/'.$item->slug)}}">{{$item->name}}</a></li>
                            @endforeach
{{--                            @else--}}
{{--                            @foreach ($cate as $item)--}}
{{--                                <li><a href="{{asset('danh-muc-du-an/'.$item->slug)}}">{{$item->name}}</a></li>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}

                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h5>{{__("Product new")}}</h5>
                    <hr>
                    <ul class="widget-post">
{{--                        @if($locale == 'en')--}}
                            @foreach ($all as $item)
                                <li>
                                    <a class="widget-post-media" href="{{route('detail_projectEn', ['slug' => $item->slug])}}">
                                        <img src="{{$item['projectimages']->first()['image']}}" onerror="this.src='{{App\Helpers\Theme::assetsPath('img/noproject.png')}}'"  alt="">
                                    </a>
                                    <div class="widget-post-info">
                                        <h6><a href="{{route('detail_projectEn', ['slug' => $item->slug])}}">{{$item->title}}</a></h6>
                                        <div class="post-meta"><span>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span></div>
                                    </div>
                                </li>
                            @endforeach
{{--                            @else--}}
{{--                            @foreach ($all as $item)--}}
{{--                                <li>--}}
{{--                                    <a class="widget-post-media" href="{{route('detail_project', ['slug' => $item->slug])}}">--}}
{{--                                        <img src="{{$item['projectimages']->first()['image']}}" onerror="this.src='{{App\Helpers\Theme::assetsPath('img/noproject.png')}}'"  alt="">--}}
{{--                                    </a>--}}
{{--                                    <div class="widget-post-info">--}}
{{--                                        <h6><a href="{{route('detail_project', ['slug' => $item->slug])}}">{{$item->title}}</a></h6>--}}
{{--                                        <div class="post-meta"><span>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span></div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
                    </ul>
                </div>
                <div class="post-author">
                        {{-- <div class="post-author-img pull-left">
                            <img alt="author" src="img/user-av.jpg">
                        </div> --}}
                        <div class="post-author-details pull-left">
                            <h6>@lang('project.project_share')</h6>
                            <ul class="social">
                                <li><a href="https://facebook.com/sharer/sharer.php?u={{route('detail_projectEn',$project->slug)}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet/?text=C%C3%94NG%20TY%20CP%20TH%C6%AF%C6%A0NG%20M%E1%BA%A0I%20D%E1%BB%8ACH%20V%E1%BB%A4%20V%C3%80%20K%E1%BB%B8%20THU%E1%BA%ACT%20CAO%20THT&amp;url={{route('detail_project',$project->slug)}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/share?url={{route('detail_projectEn',$project->slug)}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=C%C3%94NG%20TY%20CP%20TH%C6%AF%C6%A0NG%20M%E1%BA%A0I%20D%E1%BB%8ACH%20V%E1%BB%A4%20V%C3%80%20K%E1%BB%B8%20THU%E1%BA%ACT%20CAO%20THT&amp;caption=C%C3%94NG%20TY%20CP%20TH%C6%AF%C6%A0NG%20M%E1%BA%A0I%20D%E1%BB%8ACH%20V%E1%BB%A4%20V%C3%80%20K%E1%BB%B8%20THU%E1%BA%ACT%20CAO%20THT&amp;content={{route('detail_project',$project->slug)}}&amp;canonicalUrl={{route('detail_project',$project->slug)}}&amp;shareSource=tumblr_share_button" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                <li><a href="https://pinterest.com/pin/create/button/?url={{route('detail_projectEn',$project->slug)}}&amp;media={{route('detail_projectEn',$project->slug)}}&amp;description=C%C3%94NG%20TY%20CP%20TH%C6%AF%C6%A0NG%20M%E1%BA%A0I%20D%E1%BB%8ACH%20V%E1%BB%A4%20V%C3%80%20K%E1%BB%B8%20THU%E1%BA%ACT%20CAO%20THT" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
            </div>
            <!-- End Sidebar -->
        </div>
    </div>
</section>

    <!-- End Shop Item -->
    @include('themes.tht.en.sections.partner')

@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
<!-- <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script> -->
@endsection
