@extends('site.layouts.master')

@section('title'){{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/home-page.css">

@endsection


@section('content')
    <section class="homepage-banner">
        <div class="homebanner">

            <div id="sync1">
                @foreach($banners as $banner)
                    <div class="item">
                        <picture>
                            <source height="200" width="1200" srcset="{{ $banner->image->path ?? '' }}"
                                    type="image/webp"/>
                            <img src="{{ $banner->image->path ?? '' }}" height="200" width="1200"
                                 alt="Banner Home ">
                        </picture>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <div class="clr clearfix" style="margin-top: 10px;"></div>
    <h1 class="title-h1">{{ $config->web_title }} - Âm thanh chất, Giá trị thật</h1>
    <div class="container">
        <ul class="navhome">
            @foreach($cateParents as $cate)
                <li>
                    <a class="" href="{{ route('front.getCategoryProduct', $cate->slug) }}" title="">
                        <div class="iconnav">
                            <img src="{{ $cate->image->path ?? '' }}" width="45px" height="45px" alt="{{ $cate->name }}">
                        </div>
                        <span>{{ $cate->name }}</span>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
    <div class="box box-brands">
        <div class="hd">
            <h2 class="box_title">Thương hiệu cung cấp</h2>
        </div>
        <ul class="brands_list clearfix">
            @foreach($manufactures as $manufacture)
                <li>
                    <a href="{{ route('front.getManufactureProduct', $manufacture->slug) }}">
                        <img class="lazyload" data-src="{{ $manufacture->image->path ?? '' }}" alt="{{ $manufacture->name }}"/>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
    <div class="container">
    </div>

    @foreach($categories as $category)
        <div class="box cat_goods container" id="catalog-496">
            <div class="hd">
                <h2 class="box_title">{{ $category->name }}</h2>
            </div>
            <div class="extra">
            </div>

            <div class="bd clearfix">
                <ul class="homeproduct">
                    @foreach($category->products as $product)
                        <li>
                            <div class="item-label">
                            </div>
                            <a href="{{ route('front.getProductDetail', $product->slug) }}" title="{{ $product->name }}">

                                <picture class="img">
                                    <source height="260" width="260" class="lazyload photo"
                                            srcset="{{ $product->image->path ?? '' }}"
                                            type="image/webp"/>
                                    <img height="260" width="260" class="lazyload photo"
                                         data-src="{{ $product->image->path ?? '' }}"
                                         alt="Loa Yamaha DHR12M"/>
                                </picture>
                                <h3>{{ $product->name }}</h3>
                                <div class="price">
                                    @if($product->price)
                                        <strong>{{formatCurrency($product->price)}}₫</strong>
                                    @else
                                        <strong style="color: #d8192a">Liên hệ</strong>
                                    @endif
                                </div>
                                <div class="promotion clr"></div>
                            </a>
                        </li>
                    @endforeach


                </ul>
            </div>
            <div class="bt"><a class="viewall" href="{{ route('front.getCategoryProduct', $category->slug) }}">Xem tất cả {{ $category->name }}</a></div>
        </div>
    @endforeach


{{--    <div class="container">--}}
{{--        <div class="xm-plain-box articles_cat">--}}
{{--            <div class="hd">--}}
{{--                <h2 class="box_title"><a href="du-an-cong-trinh.html">Dự án công trình</a></h2>--}}
{{--            </div>--}}
{{--            <div class="box-bd">--}}
{{--                <ul class="acat18">--}}
{{--                    <li>--}}
{{--                        <a href="lap-dat-am-thanh-nexo-nha-hang-dang-cap-nhat-ha-noi--gu-bistronomy.html" target="_blank">--}}
{{--                            <img class=" lazyloaded"--}}
{{--                                 data-src="https://prosound.vn/cdn/article_thumb/202304/lap-dat-am-thanh-nexo-nha-hang-dang-cap-nhat-ha-noi--gu-bistronomy-thumb-1682561784.jpg"--}}
{{--                                 alt="Lắp đặt âm thanh Nexo nhà hàng đẳng cấp nhất Hà Nội | Gu Bistronomy"--}}
{{--                                 src="cdn/article_thumb/202304/lap-dat-am-thanh-nexo-nha-hang-dang-cap-nhat-ha-noi--gu-bistronomy-thumb-1682561784.jpg">--}}
{{--                            <h3>Lắp đặt âm thanh Nexo nhà hàng đẳng cấp nhất Hà Nội | Gu Bistronomy</h3>--}}
{{--                            <span class="timeview">1 năm trước - Lượt xem: 92303</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="lap-dat-he-thong-am-thanh-adamson-cho-quan-lounge-stown-tai-trung-son-binh-chanh.html"--}}
{{--                           target="_blank">--}}
{{--                            <img class=" lazyloaded"--}}
{{--                                 data-src="https://prosound.vn/cdn/article_thumb/202304/lap-dat-he-thong-am-thanh-adamson-cho-quan-lounge-stown-tai-trung-son-binh-chanh-thumb-1682562201.jpg"--}}
{{--                                 alt="Lắp Đặt Hệ Thống Âm thanh Adamson cho quán LOUNGE STOWN tại Trung Sơn, Bình Chánh"--}}
{{--                                 src="cdn/article_thumb/202304/lap-dat-he-thong-am-thanh-adamson-cho-quan-lounge-stown-tai-trung-son-binh-chanh-thumb-1682562201.jpg">--}}
{{--                            <h3>Lắp Đặt Hệ Thống Âm thanh Adamson cho quán LOUNGE STOWN tại Trung Sơn, Bình Chánh</h3>--}}
{{--                            <span class="timeview">2 năm trước - Lượt xem: 197990</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="lap-dat-he-thong-am-thanh-amate-s26p-cho-nha-hang-le-meridien.html" target="_blank">--}}
{{--                            <img class=" lazyloaded"--}}
{{--                                 data-src="https://prosound.vn/cdn/article_thumb/202302/lap-dat-he-thong-am-thanh-amate-s26p-cho-nha-hang-le-meridien-thumb-1677259624.webp"--}}
{{--                                 alt="Top 10 Amply Karaoke hay nhất hiện nay | Bán chạy 2022"--}}
{{--                                 src="cdn/article_thumb/202302/lap-dat-he-thong-am-thanh-amate-s26p-cho-nha-hang-le-meridien-thumb-1677259624.webp">--}}
{{--                            <h3>Lắp đặt hệ thống âm thanh AMATE S26P cho nhà hàng LE MERIDIEN</h3>--}}
{{--                            <span class="timeview">1 năm trước - Lượt xem: 116755</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="lap-dat-he-thong-am-thanh-nexo-cho-quan-lounge-double-9-o-cua-dong.html" target="_blank">--}}
{{--                            <img class=" lazyloaded"--}}
{{--                                 data-src="https://prosound.vn/cdn/article_thumb/202302/lap-dat-he-thong-am-thanh-nexo-cho-quan-lounge-double-9-o-cua-dong-thumb-1677258356.webp"--}}
{{--                                 alt="Top 7 Vang Số Chống Hú Hay Nhất - Giá Ngất Ngây"--}}
{{--                                 src="cdn/article_thumb/202302/lap-dat-he-thong-am-thanh-nexo-cho-quan-lounge-double-9-o-cua-dong-thumb-1677258356.webp">--}}
{{--                            <h3>Lắp đặt hệ thống âm thanh NEXO cho quán Lounge Double 9 ở Cửa Đông</h3>--}}
{{--                            <span class="timeview">4 năm trước - Lượt xem: 97384</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="lap-dat-dan-loa-karaoke-adamson-point-12-o-tay-ninh.html" target="_blank">--}}
{{--                            <img class=" lazyloaded"--}}
{{--                                 data-src="https://prosound.vn/cdn/article_thumb/202302/lap-dat-dan-loa-karaoke-adamson-point-12-o-tay-ninh-thumb-1677469979.webp"--}}
{{--                                 alt="Top 9 MICRO KHÔNG DÂY Karaoke Hay Nhất Hiện Nay, Hát Rực Rỡ"--}}
{{--                                 src="cdn/article_thumb/202302/lap-dat-dan-loa-karaoke-adamson-point-12-o-tay-ninh-thumb-1677469979.webp">--}}
{{--                            <h3>Lắp đặt dàn loa karaoke Adamson Point 12 ở Tây Ninh</h3>--}}
{{--                            <span class="timeview">1 năm trước - Lượt xem: 110890</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="box cat_articles_box clearfix">--}}
{{--            <div class="cat_articles clearfix">--}}

{{--                <a href="lap-loa-xin--song-chat.html">--}}
{{--                    <div class="article_photo">--}}
{{--                        <img class="lazyload" width="100" height="70" alt="LẮP LOA XỊN – SỐNG CHẤT"--}}
{{--                             data-src="cdn/article_thumb/202507/lap-loa-xin--song-chat-sthumb-1751337857.jpg">--}}
{{--                    </div>--}}
{{--                    <h3> LẮP LOA XỊN – SỐNG CHẤT</h3>--}}
{{--                    <span class="timepost">129 lượt xem</span>--}}
{{--                </a>--}}


{{--                <a href="lap-dat-he-thong-am-thanh-yamaha-dxr12mkii-ket-hop-sub-dxs15xlf-nha-an-bo-cong-an.html">--}}
{{--                    <div class="article_photo">--}}
{{--                        <img class="lazyload" width="100" height="70"--}}
{{--                             alt="Lắp Đặt Hệ Thống âm thanh Yamaha DXR12MKII kết hợp sub DXS15XLF Nhà Ăn Bộ Công An"--}}
{{--                             data-src="cdn/article_thumb/202503/lap-dat-he-thong-am-thanh-yamaha-dxr12mkii-ket-hop-sub-dxs15xlf-nha-an-bo-cong-an-sthumb-1743048978.jpg">--}}
{{--                    </div>--}}
{{--                    <h3> Lắp Đặt Hệ Thống âm thanh Yamaha DXR12MKII kết hợp sub DXS15XLF Nhà Ăn Bộ Công An</h3>--}}
{{--                    <span class="timepost">347 lượt xem</span>--}}
{{--                </a>--}}


{{--                <a href="ban-giao-he-thong-am-thanh-yamaha-cho-phong-hop-cua-tong-cong-ty-dau-tu-phat-trien-duong-cao-toc-viet-nam.html">--}}
{{--                    <div class="article_photo">--}}
{{--                        <img class="lazyload" width="100" height="70"--}}
{{--                             alt="Bàn Giao Hệ Thống Âm Thanh YAMAHA Cho Phòng Họp Của Tổng Công Ty Đầu tư phát triển Đường Cao Tốc Việt Nam"--}}
{{--                             data-src="cdn/article_thumb/202408/ban-giao-he-thong-am-thanh-yamaha-cho-phong-hop-cua-tong-cong-ty-dau-tu-phat-trien-duong-cao-toc-viet-nam-sthumb-1723714297.jpg">--}}
{{--                    </div>--}}
{{--                    <h3> Bàn Giao Hệ Thống Âm Thanh YAMAHA Cho Phòng Họp Của Tổng Công Ty Đầu tư phát triển Đường Cao Tốc--}}
{{--                        Việt Nam</h3>--}}
{{--                    <span class="timepost">905 lượt xem</span>--}}
{{--                </a>--}}


{{--                <a href="lap-dat-he-thong-am-thanh-4acoustic-si12-tai-vinh-phuc.html">--}}
{{--                    <div class="article_photo">--}}
{{--                        <img class="lazyload" width="100" height="70"--}}
{{--                             alt="Lắp đặt hệ thống âm thanh 4Acoustic Si12 tại Vĩnh Phúc"--}}
{{--                             data-src="cdn/article_thumb/202407/lap-dat-he-thong-am-thanh-4acoustic-si12-tai-vinh-phuc-sthumb-1722248090.jpg">--}}
{{--                    </div>--}}
{{--                    <h3> Lắp đặt hệ thống âm thanh 4Acoustic Si12 tại Vĩnh Phúc</h3>--}}
{{--                    <span class="timepost">720 lượt xem</span>--}}
{{--                </a>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="brand_hot">
        <div class="container">


        </div>
    </div>

    <div class="news_articles box">
        <div class="container">
            <div class="hd">
                <h2 class="box_title">Tin mới</h2>
                <div class="extra"><a class="viewall" href="{{ route('front.blogs') }}">Xem thêm</a></div>
            </div>
            <div class="cat_articles">
                @foreach($posts as $post)
                    <a href="{{ route('front.blogDetail', $post->slug) }}">
                        <picture class="articles_photo">
                            <source height="100" width="70" class="lazyload"
                                    srcset="{{ $post->image->path ?? '' }}"
                                    type="image/webp"/>
                            <img width="100" height="70" alt="{{ $post->name }}"
                                 class="lazyload"
                                 data-src="{{ $post->image->path ?? '' }}">
                        </picture>
                        <h3>{{ $post->name }}</h3>
                        <span class="timepost">{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y') }}</span>
                    </a>

                @endforeach

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="/site/custom-js/home-page.js"></script>

@endpush
