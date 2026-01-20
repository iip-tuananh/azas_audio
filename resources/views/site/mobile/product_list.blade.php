@extends('site.mobile.layouts.master')

@section('title'){{ $category->name }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/product-list-mobile.css">

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

        <h1 class="cat_name">{{ $category->name }}</h1>
        <div class="clr"></div>
{{--        <article>--}}
{{--            <div class="article_content">--}}
{{--                <p>Những sản phẩm <strong>loa karaoke cao cấp</strong> của ch&uacute;ng t&ocirc;i với đầy đủ v&agrave; đa--}}
{{--                    dạng với nhiều loại loa chất lượng. Từ c&aacute;c thương hiệu h&agrave;ng đầu thế giới như LOA ĐỨC, PH&Aacute;P,--}}
{{--                    T&Acirc;Y BAN NHA, CANADA <strong>...</strong> đến c&aacute;c sản phẩm chất lượng cao của c&aacute;c h&atilde;ng--}}
{{--                    nhỏ hơn. C&aacute;c loại <strong><em>loa h&aacute;t karaoke</em></strong> n&agrave;y đều được thiết kế v&agrave;--}}
{{--                    sản xuất với c&ocirc;ng nghệ hiện đại v&agrave; ti&ecirc;n tiến, đảm bảo chất lượng &acirc;m thanh tuyệt--}}
{{--                    vời v&agrave; độ bền cao. </p>--}}
{{--            </div>--}}
{{--        </article>--}}
        <div class="section_menu">
            <div class="filter_scroll">
                <div class="brand_menu" id="filter_brand">
                    @if($category->parent_id)
                        <a href="{{ route('front.getCategoryProduct', $cateParent->slug) }}">Tất cả</a>
                    @else
                        <a href="{{ route('front.getCategoryProduct', $category->slug) }}" class="current">Tất cả</a>
                    @endif

                        @foreach($allCategories as $cate)
                            <a href="{{ route('front.getCategoryProduct', $cate->slug) }}"
                               class="{{ $cate->id ==  $category->id ? 'current' : ''}} clearfix">{{ $cate->name }}</a>
                        @endforeach


                </div>
            </div>
            <div class="clr"></div>


        </div>
        <div class="clr"></div>
        <div class="filter_bar">
            <h2 class="cat_name2">{{ $category->short_des }}</h2>
        </div>
        <div class="clr"></div>


        <ul class="homeproduct" id="_loadList">
            @foreach($products as $product)
                <li class="item">
                    <div class="item-label">
                    </div>
                    <a href="{{ route('front.getProductDetail', $product->slug) }}" title="{{ $product->name }}">
                        <picture class="img">
                            <source height="166" width="166" class="lazyload photo"
                                    srcset="{{ $product->image->path ?? '' }}"
                                    type="image/webp"/>
                            <img height="166" width="166" class="lazyload photo"
                                 data-src="{{ $product->image->path ?? '' }}"
                                 alt="{{ $product->name }}">
                        </picture>
                        <div class="ginfo">
                            <h3>{{ $product->name }}</h3>

                            <div class="price">
                                @if($product->price > 0)
                                    <strong>{{ formatCurrency($product->price) }}₫</strong>
                                @else
                                    <strong>Giá Liên Hệ</strong>
                                @endif
                                <del></del>
                            </div>
                            <div class="promotion clr"></div>
                        </div>
                    </a>
                </li>

            @endforeach

        </ul>

        {{ $products->links('site.pagination.paginate2') }}

{{--        <p class="pagination" id="page_ajax">--}}
{{--            <a rel="nofflow" class="current next caret_down" href="javascript:loadMore('loa-karaoke',2)">Xem thêm 322 Loa--}}
{{--                karaoke</a>--}}
{{--        </p>--}}


        <div class="clr"></div>


        <div class="clr"></div>
        <article id="description">
            <div class="article_content">
                {!! $category->intro !!}
            </div>

            <div class="view-more hidden">
                <p id="btn-viewmore"><span id="view1">Đọc thêm </span><span id="view2" class="hidden">Thu gọn </span></p>
            </div>
        </article>


    </section>

@endsection

@push('scripts')
    <script src="/site/custom-js/product-list-mobile.js"></script>
    <script src="/site/custom-js/home-page-mobile.js"></script>

@endpush
