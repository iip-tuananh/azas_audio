@extends('site.layouts.master')

@section('title')
    {{ $blog->name }} - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{@$config->image->path ?? ''}}
@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/blog-detail.css">
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
        <div class="col_main">
            <article>
                <h1 class="titledetail">{{ $blog->name }}</h1>
                <div class="userdetail">
                    <a>{{ $blog->category->name ?? '' }}</a>
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

                <h5 class="titlerelate">Tin tức liên quan</h5>
                <ul class="newsrelate">
                    @foreach($blogLienquan as $blogLq)
                        <li>
                            <a href="{{ route('front.blogDetail', $blogLq->slug) }}" class="linkimg">
                                <div class="tempvideo">
                                    <img alt="{{ $blogLq->name }}" src="{{ $blogLq->image->path ?? '' }}" width="100">
                                </div>
                                <h3>{{ $blogLq->name }}</h3>
                                <span
                                    class="timepost">{{ \Illuminate\Support\Carbon::parse($blogLq->created_at)->format('d/m/Y') }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>

        </div>
        <div class="col_sub">

            <div class="box summarycomment">
                <div class="box_title">Tin mới</div>
                <div class="bd">
                </div>
            </div>
            <div class="cat_articles">
                <div class="figure">
                    <span style="display: none">Tin mới</span>
                </div>

                <ul>
                    @foreach($otherBlogs as $otherBlog)
                        <li>
                            <a href="{{ route('front.blogDetail', $otherBlog->slug) }}" title="{{ $otherBlog->name }}">
                                <picture class="articles_photo">
                                    <source height="100" width="70" class="lazyload"
                                            srcset="{{ $otherBlog->image->path ?? '' }}" type="image/webp"/>
                                    <img width="100" height="70" alt="{{ $otherBlog->name }}" class=""
                                         data-src="{{ $otherBlog->name }}">
                                </picture>

                                <h3>{{ $otherBlog->name }}</h3>
                                <span>{{ \Illuminate\Support\Carbon::parse($blogLq->created_at)->format('d/m/Y') }}</span>
                            </a>
                        </li>
                    @endforeach


                </ul>

            </div>
        </div>
    </section>

@endsection

@push('scripts')







@endpush
