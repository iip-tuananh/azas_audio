@extends('site.layouts.master')

@section('title'){{ $category->name }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/category.css">
    <link rel="stylesheet" href="/site/custom-css/product-list.css">
@endsection

@section('content')
    <section>
        <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('front.home-page') }}"><span itemprop="name">Trang chủ</span></a>
                <meta itemprop="position" content="1">
            </li>

            @if($category->parent_id)
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                                                  href="{{ route('front.getCategoryProduct', $cateParent->slug) }}"><span
                            itemprop="name">{{ $cateParent->name }}</span></a>
                    <meta itemprop="position" content="3">
                </li>

                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                                                  href="{{ route('front.getCategoryProduct', $category->slug) }}"><span
                            itemprop="name">{{ $category->name }}</span></a>
                    <meta itemprop="position" content="3">
                </li>
            @else

                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                                                  href="{{ route('front.getCategoryProduct', $category->slug) }}"><span
                            itemprop="name">{{ $category->name }}</span></a>
                    <meta itemprop="position" content="3">
                </li>
            @endif



        </ol>
        <div class="cat_name"><h1>{{ $category->name }}</h1></div>
        <div class="clr"></div>
        <div class="filter_bar clearfix">
            <div class="filter_child">
                @if($category->parent_id)
                    <a href="{{ route('front.getCategoryProduct', $cateParent->slug) }}">Tất cả</a>
                @else
                    <a href="{{ route('front.getCategoryProduct', $category->slug) }}" class="current">Tất cả</a>
                @endif
                @foreach($allCategories as $cate)
                    <a href="{{ route('front.getCategoryProduct', $cate->slug) }}"
                       class="{{ $cate->id ==  $category->id ? 'current' : ''}}">{{ $cate->name }}</a>
                @endforeach
                {{--                <a class="current" href="loa-nexo.html">Loa Nexo</a>--}}
            </div>
        </div>

        <div class="filter_bar">
            <h2 class="cat_name2">{{ $category->short_des }}</h2>
            <ul class="filter">

            </ul>
            <div class="choosedfilter">
            </div>
            <div class="clr"></div>
        </div>

        <ul class="homeproduct clearfix" id="_loadList">
            @foreach($products as $product)
                <li class="item">
                    <a href="{{ route('front.getProductDetail', $product->slug) }}" title="{{ $product->name }}">
                        <picture class="img">
                            <source height="260" width="260" class="lazyload photo"
                                    srcset="{{ $product->image->path ?? '' }}"
                                    type="image/webp"/>
                            <img height="260" width="260" class="lazyload photo"
                                 data-src="{{ $product->image->path ?? '' }}"
                                 alt="{{ $product->name }}"/>
                        </picture>
                        <h3>{{ $product->name }}</h3>
                        <div class="price">
                            @if($product->price > 0)
                                <strong>{{ formatCurrency($product->price) }}₫</strong>
                            @else
                                <strong>Giá Liên Hệ</strong>
                            @endif
                        </div>


                        <div class="promotion clr"></div>
                    </a></li>

            @endforeach
        </ul>


        {{ $products->links('site.pagination.paginate2') }}


        <div class="clr"></div>
        <article id="description">

            <div class="article_content">
                {!! $category->intro !!}
            </div>

            <div class="view-more hidden">
                <p id="btn-viewmore"><span id="view1">Đọc thêm </span><span id="view2" class="hidden">Thu gọn </span>
                </p>
            </div>
        </article>


    </section>

@endsection

@push('scripts')
    <script src="/site/custom-js/product-list.js"></script>

@endpush
