<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="page-item">
        <div class="img-page">
            <img class="img-item-page" src="{{asset_theme('img/full/21.jpg')}}" alt="">
            <div class="title-img">
                <a href="{{ route('products')}}" class="link-pages">
                    <p class="title-page">Sản phẩm
                        <i class="fa fa-angle-right mr-0"></i>
                    </p>
                </a>
            </div>
        </div>
        <div class="info-page">
            @foreach($product_categories as $cate)

            <div class="link-page">
                <i class="fa fa-angle-right mr-0"></i>
                {{ $cate->name ??''}}
            <ul class="sub-menu">
                @foreach($product_types as $type)
                    @if($cate->id == $type->product_category_id)
                <li><a href="/the-loai-san-pham/{{$type->slug}}">  <i class="fa fa-angle-right mr-0"></i>{{ $type->name ??''}}</a></li>
                    @endif
                @endforeach
            </ul>
            </div>
            @endforeach

        </div>
    </div>
</div>
