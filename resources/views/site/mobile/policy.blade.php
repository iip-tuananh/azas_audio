@extends('site.mobile.layouts.master')

@section('title'){{ $policy->title }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/policy-mobile.css">
@endsection

@section('content')

    <section>
        <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="./"><span itemprop="name">Trang chủ</span></a>
                <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="javascript:;"><span itemprop="name">Chính sách bảo mật thông tin </span></a>
                <meta itemprop="position" content="1">
            </li>
        </ol>
        <article>
            <h1 class="titledetail">{{ $policy->title }}</h1>
            <div class="userdetail">
                <a>Chính sách</a>
                <span>{{ $policy->title }}</span>
                <span>{{ \Carbon\Carbon::parse($policy->created_at)->format('d/m/Y') }}</span>
            </div>
            <p style="font-weight: 700"></p>
            <div id="toc_container">
                <ul id="toc"></ul>
            </div>
            <div class="clr"></div>

            <div class="article_content">
                {!! $policy->content !!}
            </div>
        </article>
    </section>

@endsection

@push('scripts')


@endpush
