<!-- Service Section -->
<section id="service" class="ptb pb-20">
    <div class="fadeInBottom container ">
        <div class="row">
            <div class="col-sm-5 col-md-4">
                <!-- <p class="lead">
                    Lorem ipsum dolor sit amet,
                </p> -->
                <h2>{{__('Solution')}}</h2>
            </div>
            <div class="col-sm-7 col-md-8 mb-30">
                <p class="lead">
                    {{__('With the motto "Quality of products and services ensure Customer loyalty", we
                    trust, be proud and look forward to becoming a long-term reliable partner of customers.')}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="project-col-3 isotope" id="isotope">
                    @foreach($services as $service)
                        <li>
                            <div class="about-block mb-60 mb-xs-40 clearfix">
                                <figure>
                                    <a href="{{route('detail_servicesEn', ['slug' => $service->slug])}}" >
                                        <img class="img-services" src="{{$service->image}}" alt="" onerror="this.src='{{App\Helpers\Theme::assetsPath('img/noimage.png')}}'"/>
                                    </a>
                                </figure>
                                <div class="text-box mt-25">
                                    <div class="box-title mb-15">
                                        <a href="{{route('detail_servicesEn', ['slug' => $service->slug])}}"><h3 class="title-service">{{$service->title}}</h3></a>
                                    </div>
                                    <div class="text-content">
                                        <p class="t-body">
                                            {{strip_tags($service->body)}}
                                        </p>
                                        <a href="{{route('detail_servicesEn', ['slug' => $service->slug])}}" class="btn-text mt-15">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="row text-center">
            <div style="padding-bottom:15px" class="col-xs-12">
            <a class="btn btn-md btn-black mt-30" href="{{route('servicesEn')}}">{{__('See more')}}</a>
            </div>
        </div>
</section>

<!-- End Service Section -->
