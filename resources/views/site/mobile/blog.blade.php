@extends('site.mobile.layouts.master')

@section('title')Tin tức và sự kiện - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/blog-mobile.css">
@endsection

@section('content')
    <section>
        <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('front.home-page') }}"><span itemprop="name">Trang chủ</span></a>
                <meta itemprop="position" content="1">
            </li>
            @if($categoryBlog)
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                                                  href="{{ route('front.blogs') }}"><span
                            itemprop="name">Tin tức</span></a>
                    <meta itemprop="position" content="2">
                </li>

                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                                                  href="{{ route('front.blogs', $categoryBlog->slug) }}"><span
                            itemprop="name">{{ $categoryBlog->name }}</span></a>
                    <meta itemprop="position" content="2">
                </li>
            @else
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                                                  href="{{ route('front.blogs') }}"><span
                            itemprop="name">Tin tức</span></a>
                    <meta itemprop="position" content="2">
                </li>
            @endif

        </ol>
        <div class="scrollmenu _cat_article">
            <ul class="article_categories">
                <li><a href="{{ route('front.blogs') }}">Tất cả</a></li>
                @foreach($categories as $cate)
                    <li><a href="{{ route('front.blogs', $cate->slug) }}">{{ $cate->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="clr"></div>
        <h1 class="titlehome">Tin tức</h1>
        <ul class="newslist">
            @foreach($blogs as $blog)
                <li>
                    <a href="{{ route('front.blogDetail', $blog->slug) }}l">
                        <picture class="tempvideo">
                            <source width="140" height="80" class="lazyload" srcset="{{ $blog->image->path ?? '' }}" type="image/webp" />
                            <img class="" data-src="{{ $blog->image->path ?? '' }}" width="140" height="80"
                                 alt="{{ $blog->name }}">
                        </picture>

                        <h3>{{ $blog->name }}</h3>

                        <div class="timepost">
                            <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }}</span>
                            <span class="namecate">{{ $blog->category->name ?? '' }}</span>
                        </div>
                    </a>
                </li>
            @endforeach


                {{ $blogs->links('site.pagination.paginate2') }}


        </ul>
        <div class="titlehome">Tin tức mới nhất</div>
        <div class="summarycomment">
            @foreach($othersPost as $key => $otherPost)
                <a href="{{ route('front.blogDetail', $otherPost->slug) }}">
                    <div>{{ $key + 1 }}</div>
                    <h3>{{ $otherPost->name }}<span class="morecom">• {{ $otherPost->category->name ?? '' }}</span></h3>
                </a>
            @endforeach
        </div>
    </section>
@endsection

@push('scripts')
    <script src="/site/custom-js/blog-mobile.js"></script>


@endpush
