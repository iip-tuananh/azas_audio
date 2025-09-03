<head>
    <meta name='generator' content='Custom by 0966398663' />
    <meta charset="utf-8">
    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" content="{{ $config->web_title }}"/>
    <meta content="INDEX,FOLLOW" name="robots" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width" />




    <link rel="shortcut icon" href="{{@$config->favicon->path ?? ''}}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{@$config->favicon->path ?? ''}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{@$config->favicon->path ?? ''}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{@$config->favicon->path ?? ''}}">
    <meta name="application-name" content="{{ $config->web_title }}" />
    <meta name="generator" content="@yield('title')" />

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:site_name" content="{{ url()->current() }}">
    <meta property="og:image:alt" content="{{ $config->web_title }}">
    <meta itemprop="description" content="@yield('description')">
    <meta itemprop="image" content="@yield('image')">
    <meta itemprop="url" content="{{ url()->current() }}">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="{{ url()->current() }}" />


    <style>
        @-webkit-keyframes snowflakes-fall {
            0% {top:-10%}
            100% {top:100%}
        }
        @-webkit-keyframes snowflakes-shake {
            0%,100% {-webkit-transform:translateX(0);transform:translateX(0)}
            50% {-webkit-transform:translateX(80px);transform:translateX(80px)}
        }
        @keyframes snowflakes-fall {
            0% {top:-10%}
            100% {top:100%}
        }
        @keyframes snowflakes-shake {
            0%,100%{transform:translateX(0)}
            50% {transform:translateX(80px)}
        }
        .snowflake {
            color: #fff;
            font-size: 1em;
            font-family: Arial, sans-serif;
            text-shadow: 0 0 5px #000;
            position:fixed;
            top:-10%;
            z-index:9999;
            -webkit-user-select:none;
            -moz-user-select:none;
            -ms-user-select:none;
            user-select:none;
            cursor:default;
            -webkit-animation-name:snowflakes-fall,snowflakes-shake;
            -webkit-animation-duration:10s,3s;
            -webkit-animation-timing-function:linear,ease-in-out;
            -webkit-animation-iteration-count:infinite,infinite;
            -webkit-animation-play-state:running,running;
            animation-name:snowflakes-fall,snowflakes-shake;
            animation-duration:10s,3s;
            animation-timing-function:linear,ease-in-out;
            animation-iteration-count:infinite,infinite;
            animation-play-state:running,running;
        }
        .snowflake:nth-of-type(0){
            left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s
        }
        .snowflake:nth-of-type(1){
            left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s
        }
        .snowflake:nth-of-type(2){
            left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s
        }
        .snowflake:nth-of-type(3){
            left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s
        }
        .snowflake:nth-of-type(4){
            left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s
        }
        .snowflake:nth-of-type(5){
            left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s
        }
        .snowflake:nth-of-type(6){
            left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s
        }
        .snowflake:nth-of-type(7){
            left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s
        }
        .snowflake:nth-of-type(8){
            left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s
        }
        .snowflake:nth-of-type(9){
            left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s
        }
        .snowflake:nth-of-type(10){
            left:25%;-webkit-animation-delay:2s,0s;animation-delay:2s,0s
        }
        .snowflake:nth-of-type(11){
            left:65%;-webkit-animation-delay:4s,2.5s;animation-delay:4s,2.5s;
        }
        @media (max-width:1024px) {
            footer .colfoot{
                width: 100% !important;
                padding:10px !important;
                color:#fff;
            }
            footer .colfoot li {
                display: inline-block;
                color:#fff;
                padding: 5px 10px;
                width: 100%;
                box-sizing: border-box;
            }
            ul.camket{display:none;}
            .coso {
                color: #fff;
                padding: 10px;
            }
        }
    </style>



    <link rel="stylesheet" href="/site/custom-css/index-mb.css">
    <link rel="stylesheet" href="/site/css/callbutton-mobi.css?v=12">

    <style>
        /* Ẩn mọi phần tử có ng-cloak cho đến khi Angular khởi tạo */
        [ng\:cloak],
        [ng-cloak],
        [data-ng-cloak],
        [x-ng-cloak],
        .ng-cloak,
        .x-ng-cloak {
            display: none !important;
        }
    </style>

</head>





