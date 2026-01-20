<header ng-controller="headerPartial">
    <div class="header-middle">
        <div class="wrap-main clearfix">
            <a class="logo" title="{{ $config->web_title }}" href="{{ route('front.home-page') }}" aria-label="logo">
                <img height="50" width="200" src="{{ $config->image->path ?? '' }}" alt="{{ $config->web_title }}">
            </a>
            <form id="search-site" method="get" autocomplete="off">
                <input class="topinput" aria-label="Keywords" id="search-keyword" name="keywords" type="text"
                       tabindex="0" value=""
                       placeholder="Tìm kiếm sản phẩm..." autocomplete="off" maxlength="50" ng-model="keywords">
                <button class="btntop" type="button" aria-label="Search" ng-click="search()"><i
                        class="icontgdd-topsearch"></i></button>
                <div class="search-suggest"></div>
            </form>
            <div class="all_cat_wrapper brand" id="tophistory">
                <span>Thương hiệu</span>
                <div class="all_category brand">
                    <ul class="categories">
                        @foreach($manufactures as $manu)
                            <li>
                                <a href="{{ route('front.getManufactureProduct', $manu->slug) }}">
                                    {{ $manu->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <span id="tophistory">
                <span>Đã xem</span>
                <div class="history_goods"><div id="history" class="box box_history">
	<h4 class="box_title">Sản phẩm Đã Xem</h4>
	<ul class="homeproduct">
        @foreach($viewedProducts as $viewedProduct)
            <li>
            <a href="{{ route('front.getProductDetail', $viewedProduct->slug) }}" title="{{ $viewedProduct->name }}">
                <img class="photo lazyload"
                     data-src="{{ $viewedProduct->image->path ?? '' }}"
                     alt="{{ $viewedProduct->name }}"/>
                <h3>{{ $viewedProduct->name }}</h3>
                @if($viewedProduct->price > 0)
                    <div class="price">
                    {{ formatCurrency($viewedProduct->price) }}đ
                </div>
                @else
                    <div class="price">
                    Giá liên hệ
                </div>
                @endif


            </a>
            </li>
        @endforeach


			</ul>
</div>
</div>
            </span>

            {{--            <div id="km">--}}
            {{--                <a href="khuyen-mai/index.html" target="_blank">--}}
            {{--                    <span></span>--}}
            {{--                    <span></span>--}}
            {{--                    <span></span>--}}
            {{--                    <span></span>--}}
            {{--                </a>--}}
            {{--                <div class="content-km">--}}
            {{--                    <a href="khuyen-mai/index.html" target="_blank"><strong>Khuyến mại</strong><p>Tháng 08 / 25</p>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="cart" id="cart">
                <p class="cart_info">
                    <a href="{{ route('cart.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22"
                             viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                               stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                               font-family="none" font-weight="none" font-size="none" text-anchor="none"
                               style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#ffffff">
                                    <path
                                        d="M82.41667,7.16667c-16.53604,0 -30.24445,12.59212 -32.04004,28.66667h-7.37663c-8.28467,0 -15.18102,6.21064 -16.04102,14.45231l-8.95833,86c-0.473,4.53292 1.00624,9.07826 4.05924,12.47168c3.053,3.38625 7.42377,5.32601 11.98177,5.32601h103.91667c4.558,0 8.92877,-1.93976 11.98177,-5.32601c3.053,-3.38983 4.52524,-7.93876 4.05224,-12.47168l-8.95134,-86c-0.86,-8.24167 -7.75635,-14.45231 -16.04101,-14.45231h-7.33464c0.11108,1.1825 0.16797,2.37933 0.16797,3.58333v7.16667h7.16667c2.76275,0 5.06034,2.07369 5.34701,4.8221l8.95833,86c0.15766,1.51217 -0.33667,3.02506 -1.35075,4.15023c-1.01767,1.12875 -2.47692,1.77767 -3.99626,1.77767h-103.91667c-1.51933,0 -2.97517,-0.64551 -3.98926,-1.77067c-1.01767,-1.12875 -1.51541,-2.64506 -1.35775,-4.15723l8.95833,-86c0.28667,-2.74842 2.58426,-4.8221 5.34701,-4.8221h7.16667v12.54167c-0.02741,1.93842 0.99102,3.74144 2.66532,4.71865c1.6743,0.97721 3.74507,0.97721 5.41937,0c1.6743,-0.97721 2.69273,-2.78023 2.66532,-4.71865v-19.70833c0,-11.93709 9.56291,-21.5 21.5,-21.5c10.71331,0 19.49313,7.70805 21.18506,17.91667h-35.04248c-0.301,1.14667 -0.47591,2.3435 -0.47591,3.58333v7.16667h35.83333v12.54167c-0.02741,1.93842 0.99102,3.74144 2.66532,4.71865c1.6743,0.97721 3.74507,0.97721 5.41937,0c1.6743,-0.97721 2.69273,-2.78023 2.66532,-4.71865v-19.70833c0,-17.74724 -14.50276,-32.25 -32.25,-32.25z"></path>
                                </g>
                            </g>
                        </svg>
                        <em><% cart.count%> </em></a>
                </p>
            </div>
        </div>
    </div>
    </div>
    <div class="header-bottom">
        <div class="wrap-main">
            <ul class="categories">
                <li class=" ">
                    <a href="{{ route('front.home-page') }}">Trang chủ</a>
                </li>
{{--                @foreach($categories as $cate)--}}
{{--                    @if($cate->childs()->count())--}}
{{--                        <li class=" hassub">--}}
{{--                            <a href="{{ route('front.getCategoryProduct', $cate->slug) }}">{{ $cate->name }}</a>--}}
{{--                            <div class="sub_cat sub_cat_492">--}}
{{--                                @foreach($cate->childs as $child)--}}
{{--                                    <a href="{{ route('front.getCategoryProduct', $child->slug) }}">{{ $child->name }}</a>--}}
{{--                                @endforeach--}}

{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        <li class=" ">--}}
{{--                            <a href="{{ route('front.getCategoryProduct', $cate->slug) }}">{{ $cate->name }}</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}

            <style>
                /* Item cha phải position để con absolute bám theo */
                .menu-item { position: relative; }

                /* Submenu mặc định ẩn */
                .sub-menu{
                    display: none;
                    position: absolute;
                    top: 0;
                    left: 100%;
                    min-width: 220px;
                    background: #fff;
                    border: 1px solid rgba(0,0,0,.08);
                    box-shadow: 0 10px 30px rgba(0,0,0,.10);
                    padding: 8px 0;
                    z-index: 999;
                }

                /* Cấp 2: xổ xuống dưới cấp 1 */
                .sub-menu-lv2{
                    top: 100%;
                    left: 0;
                }

                /* Hover thì hiện */
                .menu-item.has-sub:hover > .sub-menu-lv2{
                    display: block;
                }
                .menu-item.has-sub-right:hover > .sub-menu-lv3{
                    display: block;
                }

                /* Link style */
                .sub-menu li a{
                    display: block;
                    padding: 8px 12px;
                    white-space: nowrap;
                }
                .sub-menu li a:hover{
                    background: rgba(0,0,0,.04);
                }

                /* Mũi tên báo có submenu (tuỳ chọn) */
                .menu-item.has-sub > a::after,
                .menu-item.has-sub-right > a::after{
                    content: "›";
                    float: right;
                    opacity: .6;
                    margin-left: 10px;
                }

                /* cấp 1 mũi tên xuống (tuỳ chọn nhìn dễ hơn) */
                .menu-item.has-sub > a::after{
                    content: "▾";
                }
                .menu-item.has-sub-right > a::after{
                    content: "›";
                }

                /* Tránh bị “hở” khi rê chuột sang phải: tăng vùng hover */
                .menu-item.has-sub-right{ padding-right: 10px; }

            </style>

                @foreach($postCategories as $postCategory)
                    <li class=" ">
                        <a href="{{ route('front.blogs', $postCategory->slug) }}">{{ $postCategory->name }}</a>
                    </li>
                @endforeach


                @foreach($categories as $cate)
                    @php $lv2s = $cate->childs; @endphp

                    @if($lv2s->count())
                        <li class="menu-item has-sub">
                            <a href="{{ route('front.getCategoryProduct', $cate->slug) }}">{{ $cate->name }}</a>

                            <ul class="sub-menu sub-menu-lv2">
                                @foreach($lv2s as $child)
                                    @php $lv3s = $child->childs; @endphp

                                    @if($lv3s->count())
                                        <li class="menu-item has-sub-right">
                                            <a href="{{ route('front.getCategoryProduct', $child->slug) }}">{{ $child->name }}</a>

                                            <ul class="sub-menu sub-menu-lv3">
                                                @foreach($lv3s as $subChild)
                                                    <li class="menu-item">
                                                        <a href="{{ route('front.getCategoryProduct', $subChild->slug) }}">{{ $subChild->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="menu-item">
                                            <a href="{{ route('front.getCategoryProduct', $child->slug) }}">{{ $child->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="menu-item">
                            <a href="{{ route('front.getCategoryProduct', $cate->slug) }}">{{ $cate->name }}</a>
                        </li>
                    @endif
                @endforeach



                <li class=" ">
                    <a href="{{ route('front.about_page') }}">Giới thiệu</a>
                </li>
            </ul>
        </div>
    </div>
</header>
