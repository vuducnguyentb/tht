<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="page-item">
        <div class="img-page">
            <img class="img-item-page" src=" {{asset_theme('img/full/16.jpg')}}" alt="">
            <div class="title-img">
                <a href="{{url('/about-us')}}" class="link-pages">
                <p class="title-page">{{__('Introduce about the company')}}
                    <i class="fa fa-angle-right mr-0"></i>
                </p>
                </a>
            </div>
        </div>
        <div class="info-page">
            <a href="{{url('/ceo-letter')}}">
                <div class="link-page">
                    <i class="fa fa-angle-right mr-0"></i>{{__('CEO letter')}}</div>
            </a>
            <a href="{{url('/core-value')}}">
            <div class="link-page">
                <i class="fa fa-angle-right mr-0"></i>
                {{__('Core value')}} </div>
            </a>
            <a href="{{url('/organizational-chart')}}">
            <div class="link-page">
                <i class="fa fa-angle-right mr-0"></i>
               {{__('Organizational chart')}} </div>
            </a>
            <a href="{{route('partnersEn')}}">
            <div class="link-page">
                <i class="fa fa-angle-right mr-0"></i>
                {{__('Partner')}} </div>
            </a>
        </div>
    </div>
</div>
