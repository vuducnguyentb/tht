<!-- HEADER -->
<header class="header">
    <div class="container">

        <!-- logo -->
        <div class="logo">
        <a href="{{route('homeEn')}}">
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
                    <li> <a href="{{url('/about-us')}}">{{__('About Us')}}</a>
                        <ul class="nav-dropdown menu-chil">
                            <li ><a href="{{url('/ceo-letter')}}">{{__('CEO Letter')}}</a></li>
                            <li ><a href="{{url('/core-value')}}">{{__('Core value')}}</a></li>
                            <li ><a href="{{url('/organizational-chart')}}">{{__('Organizational chart')}}</a></li>
                            <li ><a href="{{route('partnersEn')}}">{{__('Partners')}}</a></li>
                        </ul>
                    </li>
                    <li> <a href="{{route('productsEn')}}">{{__('Products')}}</a>
                        <ul class="nav-dropdown menu-chil">
                            @foreach($cate as $item)
                        <li class="nav-has-sub"> <a href="/brand-product/{{$item->slug}}">{{ $item->name ??''}}</a>
                                    <ul class="nav-sub-dropdown menu-chil">
                                        @foreach($item->producttypes as $type)
                                    <li><a href="/type-product/{{$type->slug}}">{{ $type->name ??''}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li> <a href="{{ route('servicesEn')}}">{{__('Solutions')}}</a>
                        <ul class="nav-dropdown menu-chil">
                            @foreach ($cate_service as $item)
                                <li><a href="{{asset('category-solution/'.$item->slug)}}">{{ $item->name ?? ''}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li> <a href="{{ route('projectEn')}}">{{__('Projects')}}</a>
                        <ul class="nav-dropdown menu-chil">
                                @foreach ($cate_project as $item)
                            <li><a href="{{asset('category-project/'.$item->slug)}}">{{ $item->name ?? ''}}</a></li>
                                @endforeach

                            </ul>
                    </li>
                    <li class="nav-has-sub"> <a href="{{route('postEn')}}">{{__('News')}}</a>
                        <ul class="nav-dropdown menu-chil">
                            @foreach ($cate_post as $item)
                        <li><a href="/category-post/{{$item->slug}}">{{ $item->name ?? ''}}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    <li class="nav-has-sub"> <a href="{{route('catalogsEn')}}">{{__('Support')}}</a>
                        <ul class="nav-dropdown menu-chil">
                            <li><a href="{{route('catalogsEn')}}">{{__('Catalog Product')}}</a></li>
                        </ul>
                    </li>
                    <li> <a href="{{route('addcontactEn')}}">{{__('Contact Us')}}</a></li>
                </ul>
            </nav>
        </div>
    </header>
