@extends('site.mobile.layouts.master')

@section('title'){{ $blog->name }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/blog-detail-mobile.css">
@endsection

@section('content')

    <section>
        <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('front.home-page') }}"><span itemprop="name">Trang chủ</span></a>
                <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                                              href="{{ route('front.blogs') }}"><span
                        itemprop="name">Tin tức</span></a>
                <meta itemprop="position" content="2">
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                                              href="#"><span
                        itemprop="name">{{ $blog->name }}</span></a>
                <meta itemprop="position" content="3">
            </li>
        </ol>
        <article>
            <h1 class="titledetail">{{ $blog->name }}</h1>
            <div class="userdetail">
                <a href="javascript:;">{{ $blog->category->name ?? '' }}</a>
                <span>{{ \Illuminate\Support\Carbon::parse($blog->created_at)->format('d/m/Y') }}</span>
            </div>
            <p style="font-weight: 700">{{ $blog->intro }}</p>
            <div id="toc_container">
                <ul id="toc"></ul>
            </div>
            <div class="clr"></div>
            <div class="article_content">
                {!! $blog->body  !!}
            </div>
        </article>
        <div class="bottom">
            <div class="newslist clearfix">
                <h2 class="h2">Tin tức liên quan</h2>
                <ul>
                    @foreach($blogLienquan as $blogLq)
                        <li>
                            <a href="{{ route('front.blogDetail', $blogLq->slug) }}" class="linkimg">
                                <div class="tempvideo">
                                    <img alt="{{ $blogLq->name }}" src="{{ $blogLq->image->path ?? '' }}" width="100">
                                </div>
                                <h3>{{ $blogLq->name }}</h3>
                                <span class="timepost">{{ \Illuminate\Support\Carbon::parse($blogLq->created_at)->format('d/m/Y') }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>

@endsection

@push('scripts')
    <script src="/site/custom-js/blog-mobile.js"></script>






@endpush
