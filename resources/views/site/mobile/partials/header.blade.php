<header ng-controller="headerPartial">
    <div class="header_bar">
        <div class="menu" id="_menu"><i class="iconmobile-menu"></i></div>
        <a class="logo"  title="{{ $config->web_title }}" href="{{ route('front.home-page') }}">
            <img height="40" width="218" src="{{ $config->image->path ?? '' }}" alt="{{ $config->web_title }}">
        </a>
        <div id="brand" class="bmenu">
            <span class="brand_name"><i class="iconmobile-menu"></i></span>
        </div>
        <nav class="brand" id="_brand">
            <ul>
                @foreach($manufactures as $manu)
                    <li >
                        <a href="{{ route('front.getManufactureProduct', $manu->slug) }}">
                            {{ $manu->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
    <div class="header_search">
        <form action="tim-kiem" method="get" class="search" id="search-site">
            <input name="keywords" aria-label="Search" id="search-keyword" type="search" placeholder="Tìm sản phẩm bạn cần "
                   ng-model="keywords"
                   value="" autocomplete="off"  />
            <div class="iconsearch" ng-click="search()"><i class="iconmobile-search"></i></div>
            <button type="reset" class="btn-reset" style="display: none;"><i class="iconmobile-reset"></i></button>
            <button type="button" aria-label="Tìm kiếm" class="btn-submit" style="display: none;">Tìm</button>
            <div id="suggestion"></div>
        </form>
    </div>
    <nav class="subnav" id="_subnav">
        <ul class="navigation" id="navigation">
            <li id="user_area">
                <div class="user_wrap clearfix">
{{--                    <div class="user_photo">--}}
{{--                        <i class="iconmobile-user-white"></i>--}}
{{--                    </div>--}}
{{--                    <div class="user_info">--}}

{{--                        <a href="thanh-vien?act=login"><strong>Đăng nhập</strong></a>--}}
{{--                        <p class="userguide">Nhận nhiều ưu đãi hơn</p>--}}
{{--                    </div>--}}
                    <span id="hide_nav">X</span>
                </div>
            </li>

            @foreach($categories as $cate)
                @if($cate->childs()->count())
                    <li class="cate_items">
                        <span><a href="{{ route('front.getCategoryProduct', $cate->slug) }}">{{ $cate->name }}</a><span class="toggle_arrow">+</span></span>
                        <ul class="sub_cat hide clearfix subcat_492">
                            @foreach($cate->childs as $child)
                                <li>
                                    <a href="{{ route('front.getCategoryProduct', $child->slug) }}">{{ $child->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </li>

                @else
                    <li class="cate_items">
                        <span><a href="{{ route('front.getCategoryProduct', $cate->slug) }}">{{ $cate->name }}</a></span>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</header>
