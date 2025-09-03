@extends('site.mobile.layouts.master')

@section('title')Tìm kiếm - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection


@section('css')
    <link rel="stylesheet" href="/site/custom-css/search-mobile.css">

@endsection

@section('content')
    <section>
        <p class="search-results">Tìm thấy <strong>{{ $products->count() }}</strong> kết quả khớp với từ khóa "<strong>{{ $keyword }}</strong>"</p>
        <div class="watching">
            <div class="sortby">
                Sắp xếp:
                <a href="{{ request()->fullUrlWithQuery(['sort'=>'price_desc','page'=>1]) }}" class="current"><span>Giá  giảm dần <em class="arrow_down">&darr;</em></span></a>
                <a href="{{ request()->fullUrlWithQuery(['sort'=>'price_asc','page'=>1]) }}"><span>Giá tăng dần<em class="arrow_up">&uarr;</em></span></a>
            </div>
        </div>

        <ul class="homeproduct">
            @foreach($products as $product)
                <li>
                    <div class="item-label">
                    </div>
                    <a href="loa-yamaha-vc4nb" title="Loa Yamaha VC4NB">
                        <picture class="img">
                            <source height="260" width="260" class="lazyload photo"
                                    srcset="{{ $product->image->path ?? '' }}" type="image/webp" />
                            <img height="260" width="260" class="lazyload photo"
                                 data-src="{{ $product->image->path ?? '' }}" alt="{{ $product->name }}"/>
                        </picture>
                        <h3>{{ $product->name }}</h3>
                        <div class="price">
                            @if($product->price > 0)
                                <strong>{{ formatCurrency($product->price) }}₫</strong>
                            @else
                                <strong>Liên hệ</strong>
                            @endif
                        </div>
                        <div class="promotion clr"></div>
                    </a>
                </li>
            @endforeach

        </ul>

        <style>
            .pagination {
                text-align: center !important;
            }
        </style>
        <div style="text-align: center;">
            {{ $products->links('site.pagination.paginate2') }}

        </div>
    </section>

@endsection

@push('scripts')
    <script src="/site/custom-js/product-list.js"></script>


@endpush
