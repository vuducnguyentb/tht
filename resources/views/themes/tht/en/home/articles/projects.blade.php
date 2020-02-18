<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="page-item">
        <div class="img-page">
            <img class="img-item-page" src=" {{asset_theme('img/full/du-an.jpg')}}" alt="">
            <div class="title-img">
                <a href="{{ route('projectEn')}}" class="link-pages">
                <p class="title-page">{{__('Project')}}
                    <i class="fa fa-angle-right mr-0"></i>
                </p>
                </a>
            </div>
        </div>
        <div class="info-page">
            @foreach ($cate_project as $item)
                <a href="{{asset('category-project/'.$item->slug)}}">
                <div class="link-page">
                    <i class="fa fa-angle-right mr-0"></i>{{ $item->name ?? ''}}</div>
            </a>
                @endforeach
        </div>
    </div>
</div>
