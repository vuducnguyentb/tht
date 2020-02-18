<section id="client-logos" class=" fadeIn ptb ptb-sm-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 center-col margin-50px-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center">
                <h2>Đối tác</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="owl-carousel client-carousel nf-carousel-theme ">
            @foreach($partners as $partner)
                <div class="item">
                    <div class="client-logo">
                    <a href="{{route('partners.detail', ['slug' => $partner->slug])}}">
                    <img src="{{$partner->image}}"
                             onerror="this.src='{{App\Helpers\Theme::assetsPath('img/nopartner.png')}}'" alt=""/>
                    </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
