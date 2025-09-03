@extends('site.layouts.master')

@section('title')
    Tin tức và sự kiện - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{@$config->image->path ?? ''}}
@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/blog.css">
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
        <ul class="menu clearfix">
            <li><a href="{{ route('front.blogs') }}">Tất cả</a></li>
            @foreach($categories as $cate)
                <li><a href="{{ route('front.blogs', $cate->slug) }}">{{ $cate->name }}</a></li>
            @endforeach

        </ul>
        <div class="clr"></div>
        <div class="col_main">
            <h1 class="h1">Tin tức</h1>
            <ul class="newslist">
                @foreach($blogs as $blog)
                    <li>
                        <a href="{{ route('front.blogDetail', $blog->slug) }}">
                            <picture class="tempvideo">
                                <source width="140" height="80" class="lazyload" srcset="{{ $blog->image->path ?? '' }}"
                                        type="image/webp"/>
                                <img class="" data-src="{{ $blog->image->path ?? '' }}" width="140" height="80"
                                     alt="{{ $blog->name }}">
                            </picture>

                            <h3>{{ $blog->name }}</h3>
                            <figure>
                                {{ $blog->intro }}
                            </figure>
                            <div class="timepost">
                                <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }}</span>
                                <span class="namecate">{{ $blog->category->name ?? '' }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>


            {{ $blogs->links('site.pagination.paginate2') }}

            {{--            <p class="pagination clearfix">--}}
            {{--                <span class="total">1/146</span>--}}
            {{--                <a href="tin-tuc.html" class="current">1</a>--}}
            {{--                <a href="tin-tuc4658.html?page=2">2</a>--}}
            {{--                <a href="tin-tuc9ba9.html?page=3">3</a>--}}
            {{--                <a href="tin-tucfdb0.html?page=4">4</a>--}}
            {{--                <a href="tin-tucaf4d.html?page=5">5</a>--}}
            {{--                <a href="tin-tucc575.html?page=6">6</a>--}}
            {{--                <a href="tin-tuc235c.html?page=7">7</a>--}}
            {{--                <a href="tin-tucfdfa.html?page=8">8</a>--}}
            {{--                <a href="tin-tuc0b08.html?page=9">9</a>--}}
            {{--                <a href="tin-tuc1448.html?page=10">10</a>--}}
            {{--                <a href="tin-tuc4658.html?page=2" class="next">Tiếp theo</a>	<span class="gap">...</span><a href="tin-tucf8cb.html?page=146" class="last">Trang cuối</a>--}}
            {{--            </p>--}}
        </div>
        <div class="col_sub">


            <div class="box summarycomment">
                <div class="box_title">Tin tức bài viết mới nhất</div>

            </div>
            <div class="cat_articles">

                <ul>
                    @foreach($othersPost as $otherPost)
                        <li>
                            <a href="{{ route('front.blogDetail', $otherPost->slug) }}"
                               title="{{ $otherPost->name }}">
                                <picture class="articles_photo">
                                    <source height="100" width="70" class="lazyload"
                                            srcset="{{ $otherPost->image->path ?? '' }}" type="image/webp"/>
                                    <img width="100" height="70"
                                         alt="{{ $otherPost->name }}"
                                         class=""
                                         data-src="{{ $otherPost->image->path ?? '' }}">
                                </picture>

                                <h3>{{ $otherPost->name }}</h3>
                                <span>{{ \Carbon\Carbon::parse($otherPost->created_at)->format('d/m/Y') }}</span>
                            </a>
                        </li>
                    @endforeach


                </ul>

            </div>


        </div>
        <div class="clr"></div>
    </section>
@endsection

@push('scripts')


@endpush
