@extends('site.mobile.layouts.master')

@section('title'){{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection


@section('css')
    <link rel="stylesheet" href="/site/custom-css/home-page-mobile.css">


@endsection


@section('content')

    <section>
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
        <h1 class="title-h1">{{ $config->web_title }} </br > Âm thanh chất, Giá trị thật</h1>
        <ul class="navhome">
            @foreach($cateParents as $cate)
                <li><a class="" href="{{ route('front.getCategoryProduct', $cate->slug) }}" title="">
                        <div class="iconnav">
                            <img src="{{ $cate->image->path ?? '' }}" width="30px" height="30px" alt="">
                        </div>
                        <span>{{ $cate->name }}</span>
                    </a></li>
            @endforeach

        </ul>
        <div class="clr"></div>

        <div class="brands_hot box">
            <div class="hd"><h2 class="box_title">Thương hiệu cung cấp</h2></div>
            <div class="bd brand_list">
                @foreach($manufactures as $manufacture)
                    <a href="{{ route('front.getManufactureProduct', $manufacture->slug) }}">
                        <img width="96" height="37" class="lazyload" data-src="{{ $manufacture->image->path ?? '' }}"
                             alt="{{ $manufacture->name }}"/>
                    </a>
                @endforeach


            </div>
        </div>

        @foreach($categories as $category)
            <div class="cat_goods box catg496">
                <div class="hd">
                    <h2 class="box_title">{{ $category->name }}</h2>
                </div>
                <ul class="homeproduct">
                    @foreach($category->products as $product)
                        <li data-id="12865">
                            <div class="item-label">
                            </div>

                            <a href="{{ route('front.getProductDetail', $product->slug) }}">

                                <picture class="img">
                                    <source height="140" width="140" class="lazyload photo"
                                            srcset="{{ $product->image->path ?? '' }}"
                                            type="image/webp"/>
                                    <img height="140" width="140" class="lazyload photo"
                                         data-src="{{ $product->image->path ?? '' }}"
                                         alt="{{ $product->name }}">
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
                <a class="cat_goods_more" href="{{ route('front.getCategoryProduct', $category->slug) }}">Xem tất cả {{ $category->name }}</a>
            </div>

        @endforeach



        <div class="newslist new_articles clearfix">

            <ul class="news clearfix">
                @foreach($posts as $post)
                    <li>
                        <a href="{{ route('front.blogDetail', $post->slug) }}">
                            <div class="articles_photo">
                                <img class="lazyload" width="100" height="70" alt="{{ $post->name }}"
                                     data-src="{{ $post->image->path ?? '' }}">
                            </div>
                            <h3> {{ $post->name }}</h3>
                            <span>{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y') }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('front.blogs') }}" class="newsother viewall">Xem thêm</a>
        </div>

    </section>

@endsection

@push('scripts')
    <script src="/site/custom-js/home-page-mobile.js"></script>


@endpush
