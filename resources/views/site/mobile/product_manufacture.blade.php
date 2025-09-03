@extends('site.mobile.layouts.master')

@section('title'){{ $manufacture->name }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/manufacture-list-mobile.css">
@endsection

@section('content')
    <section>
        <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('front.home-page') }}"><span itemprop="name">Trang chủ</span></a>
                <meta itemprop="position" content="1"></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="javascript:;"><span itemprop="name">{{ $manufacture->name }}</span></a>
                <meta itemprop="position" content="1"></li></ol>
        <div class="box thin_box brand_details">
            <h1 class="box_title">{{ $manufacture->name }}</h1>
            <div class="bd brand_info">
                <img src="{{ $manufacture->image->path ?? '' }}" style="max-width: 100%">
                <div class="scrollmenu cat_list">
                    <ul class="mnav clearfix">
                        <li><a href="{{ route('front.getManufactureProduct', $manufacture->slug) }}">Tất cả danh mục</a></li>
                        @foreach($categories as $cate)
                            <li><a href="{{ route('front.getProductByManuAndCate', ['cateSlug' => $cate->slug, 'manufactureSlug' => $manufacture->slug]) }}">{{ $cate->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="box fefefef">
            <div class="hd">
                @if(@$category)
                    <h3 class="box_title">{{ $category->name }} Thương hiệu {{ $manufacture->name }}</h3>
                @else
                    <h3 class="box_title">Thương hiệu {{ $manufacture->name }}</h3>
                @endif
                <div class="extra">
                 <span class="order">
        		Sắp xếp:
                <a  href="{{ request()->fullUrlWithQuery(['sort'=>'price_desc','page'=>1]) }}">
                 <span class="fcheck">&darr;</span>Giá giảm dần
                </a> |
                <a  href="{{ request()->fullUrlWithQuery(['sort'=>'price_asc','page'=>1]) }}">
                    <span class="fcheck">&#8593;</span>Giá tăng dần
                </a>

        	</span>
                </div>
            </div>
            <div class="bd">
                <ul class="homeproduct">
                    @foreach($products as $product)
                        <li data-id="12207">
                            <a href="{{ route('front.getProductDetail', $product->slug) }}" title="{{ $product->name }}">
                                <img src="{{ $product->image->path ?? '' }}" alt="{{ $product->name }}"/>
                                <h3>{{ $product->name }}</h3>
                                <div class="price">
                                    @if($product->price > 0)
                                        <strong>{{ formatCurrency($product->price) }}₫</strong>
                                    @else
                                        <strong>Giá Liên Hệ</strong>
                                    @endif
                                </div>
                                <div class="promotion clr"></div>
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{ $products->links('site.pagination.paginate2') }}

            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="/site/custom-js/manufacture-list-mobile.js"></script>
@endpush
