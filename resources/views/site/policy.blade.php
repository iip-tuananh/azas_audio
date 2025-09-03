@extends('site.layouts.master')

@section('title'){{ $policy->title }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/policy.css">
@endsection

@section('content')

    <section>
        <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="index.html"><span itemprop="name">Trang chủ</span></a>
                <meta itemprop="position" content="1"></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="javascript:;"><span itemprop="name">Chính sách đổi trả hàng </span></a><meta itemprop="position" content="1"></li></ol>

        <div class="col_sub">
            <ul class="cat_help">
                <li class="cat_help_title">Về Chúng Tôi</li>
                <li ><a href="{{ route('front.about_page') }}">Giới thiệu</a></li>

            @foreach($policies as $item)
                    <li ><a href="{{ route('front.policy', $item->slug) }}">{{ $item->title }}</a></li>
                @endforeach
            </ul>
{{--            <ul class="cat_help">--}}
{{--                <li class="cat_help_title">Hỗ trợ khách hàng</li>--}}
{{--                <li class="actived"><a href="chinh-sach-doi-tra-hang.html">Chính sách đổi trả hàng </a></li>--}}
{{--                <li ><a href="chinh-sach-bao-hanh.html">Chính sách bảo hành </a></li>--}}
{{--                <li ><a href="chinh-sach-van-chuyen.html">Chính sách vận chuyển</a></li>--}}
{{--                <li ><a href="hinh-thuc-mua-tra-gop-online.html">Hình thức mua trả góp online</a></li>--}}
{{--                <li ><a href="mua-hang-online.html">Mua hàng online</a></li>--}}
{{--                <li ><a href="chinh-sach-kiem-hang.html">Chính sách kiểm hàng</a></li>--}}
{{--            </ul>--}}
        </div>

        <div class="col_main">
            <article>
                <h1 class="titledetail">{{ $policy->title }}</h1>
                <div class="userdetail">
                    <a>Chính sách</a>
                    <span>{{ $policy->title }}</span>
                    <span>{{ \Carbon\Carbon::parse($policy->created_at)->format('d/m/Y') }}</span>
                </div>
                <p style="font-weight: 700"></p>


                <div class="article_content">
                    {!! $policy->content !!}
                </div>
            </article>
        </div>

    </section>

@endsection

@push('scripts')


@endpush
