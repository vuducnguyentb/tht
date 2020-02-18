<!-- HEADER -->
<header class="header">
    <div class="container">

        <!-- logo -->
        <div class="logo">
        <a href="{{route('home')}}">
                <img class="l-black" src="{{asset_theme ('img/logo.png')}}" alt="" />
                <img class="l-white" src="{{asset_theme ('img/logo.png')}}" alt=""/>
                <img class="l-color" src="{{asset_theme ('img/logo.png')}}" alt=""/>
            </a> </div>
            <!--End logo-->

            <!-- Rightside Menu (Search, Cart, Bart icon) -->
            <div class="side-menu-btn">
                <ul>
                    <!-- Search Icon -->
                    <li class=""> <a class="right-icon search toggle-menu menu-top push-body"><i class="fa fa-search"></i></a>
                    </li>
                    <!-- End Search Icon -->
                </ul>
            </div>
            <!-- End Rightside Menu -->

            <!-- Navigation Menu -->
            <nav class='navigation'>
                <ul class="menu-parent">
                    <li> <a href="{{url('/gioi-thieu-ve-cong-ty')}}">Về công ty</a>
                        <ul class="nav-dropdown menu-chil">
                            <li ><a href="{{url('/loi-chao-ceo')}}">Lời chào CEO</a></li>
                            <li ><a href="{{url('/gia-tri-cot-loi')}}">Giá trị cốt lõi</a></li>
                            <li ><a href="{{url('/so-do-to-chuc')}}">Sơ đồ tổ chức</a></li>
                            <li ><a href="{{route('partners')}}">Đối tác</a></li>
                        </ul>
                    </li>
                    <li> <a href="{{route('products')}}">Sản phẩm</a>
                        <ul class="nav-dropdown menu-chil">
                            @foreach($cate as $item)
                        <li class="nav-has-sub"> <a href="/thuong-hieu-san-pham/{{$item->slug}}">{{ $item->name ??''}}</a>
                                    <ul class="nav-sub-dropdown menu-chil">
                                        @foreach($item->producttypes as $type)
                                    <li><a href="/the-loai-san-pham/{{$type->slug}}">{{ $type->name ??''}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li> <a href="{{ route('services')}}">Giải pháp</a>
                        <ul class="nav-dropdown menu-chil">
                            @foreach ($cate_service as $item)
                                <li><a href="{{asset('danh-muc-giai-phap/'.$item->slug)}}">{{ $item->name ?? ''}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li> <a href="{{ route('project')}}">Dự án</a>
                        <ul class="nav-dropdown menu-chil">
                                @foreach ($cate_project as $item)
                            <li><a href="{{asset('danh-muc-du-an/'.$item->slug)}}">{{ $item->name ?? ''}}</a></li>
                                @endforeach

                            </ul>
                    </li>
                    <li class="nav-has-sub"> <a href="{{route('post')}}">Tin tức</a>
                        <ul class="nav-dropdown menu-chil">
                            @foreach ($cate_post as $item)
                        <li><a href="/chuyen-muc/{{$item->slug}}">{{ $item->name ?? ''}}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    <li class="nav-has-sub"> <a href="{{route('catalogs')}}">Hỗ trợ</a>
                        <ul class="nav-dropdown menu-chil">
                            <li><a href="{{route('catalogs')}}">Catalog sản phẩm</a></li>
                        </ul>
                    </li>
                    <li> <a href="{{route('addcontact')}}">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
    </header>
