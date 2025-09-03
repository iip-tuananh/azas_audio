@extends('site.layouts.master')

@section('title'){{ $product->name }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/product-detail.css">

@endsection

@section('content')
    <section ng-controller="productPage">
        <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('front.home-page') }}"><span itemprop="name">Trang chủ</span></a>
                <meta itemprop="position" content="1"></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('front.getCategoryProduct', $product->category->slug ?? '' ) }}"><span itemprop="name">{{ $product->category->name ?? '' }}</span></a>
                <meta itemprop="position" content="2"></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="javascript:;"><span itemprop="name">{{ $product->name }}</span></a><meta itemprop="position" content="3"></li></ol>
        <div class="goods_details clearfix">

            <div class="picture">
{{--                <div class="gallery gallery_color_box clearfix" id="gallery">--}}
                <div class="gallery clearfix" id="gallery">
                    <div class="cover">
                        <a href="{{ $product->image->path ?? '' }}"
                           class="clearfix color_box" rel="gallery_color">
                            <img class="lazyload color_box" rel="gallery_color"
                                 data-src="{{ $product->image->path ?? '' }}"
                                 alt="{{ $product->name }}"/>
                        </a>
                        <p class="clickzoom clearfix"><i class="icontgdd-clickzoom"></i> Click để phóng to hình sản phẩm
                        </p>

                    </div>
                    <div class="thumb clearfix">
                        <div class="thumb_inner">
                            <ul>
                                <li><a class="color_box"
                                       href="{{ $product->image->path ?? '' }}"
                                       rel="gallery_color">
                                        <img class="lazyload"
                                             data-src="{{ $product->image->path ?? '' }}"
                                             alt="{{ $product->name }}"/>
                                    </a></li>
                                @foreach($product->galleries as $key => $gallery)
                                    <li data-glid="{{ $key }}">
                                        <a class="color_box"
                                           href="{{ $gallery->image->path ?? '' }}"
                                           rel="gallery_color"><img class="lazyload"
                                                                    data-src="{{ $gallery->image->path ?? '' }}"
                                                                    alt="{{ $product->name }}"></a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div id="cache_thumb" class="hidden"></div>
            </div>
            <div class="goods_name clearfix">
                <h1>{{ $product->name }}</h1>
                <div class="area_price">
                    @if($product->price > 0)
                        <strong>{{ formatCurrency($product->price) }}₫</strong>
                    @else
                        <strong>Liên hệ</strong>
                    @endif
                </div>
            </div>
            <div class="rowtop">
                <div class="area_order clearfix">

                    <ul class="policy ">
                        <li class="inpr" style="float: left;"><span
                                class="no">Mã SP : <strong>{{ $product->code }}</strong></span></li>

                        <li class="inpr">Thương hiệu: <strong><a title="Thương hiệu Yamaha"
                                                                 href="thuong-hieu-yamaha.html">{{ $product->manufacturer->name ?? 'Đang cập nhật' }}</a></strong>
                        </li>
                        <li class="inpr" style=";float: left;"><span>Tình trạng : <span
                                    class="tinhtrang">{{ $product->state == 1 ? 'Còn hàng' : 'Hết hàng' }}</span></span>
                        </li>
                        <li class="wrpr"><span>Bảo hành : <strong>Chính hãng</strong> </span></li>
                    </ul>

                    <form method="post" id="purchase_form" style="margin-top: 10px">

                        <div class="clr"></div>

                        <p>Số lượng: <input aria-label="số lượng" type="number" name="number"
                                            min="1"
                                            value="1" size="4" ng-model="item_qty"
                                            class="number" id="number"/>
                        </p>
                    </form>
                    <div class="clr"></div>

                    <style>
                        .buy_now {
                            font-family: "Times New Roman";
                        }
                    </style>
                    @if($product->price > 0)
                        @if($product->state == 1)
                            <div class="area_action clearfix">
                                <a href="javascript:void(0)" class="buy_now" ng-click="order()">
                                    <b>Đặt mua ngay</b>
                                    <span>Giao hàng toàn quốc</span>
                                </a>
                            </div>
                        @else
                            <div class="area_action clearfix">
                                <a href="{{ route('front.contact') }}" class="buy_now" >
                                    <b>Liên hệ</b>
                                    <span>Giao hàng toàn quốc</span>
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="area_action clearfix">
                            <a href="{{ route('front.contact') }}" class="buy_now" >
                                <b>Liên hệ</b>
                                <span>Giao hàng toàn quốc</span>
                            </a>
                        </div>
                    @endif


                    <div class="clr"></div>
                    <div class="callorder">
                        Hoặc gọi ngay để đặt mua: <a rel="nofollow"
                                                     href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a> | <a
                            rel="nofollow" href="tel:{{ $config->zalo }}">{{ $config->zalo }}</a> (8:00-20:00)
                    </div>
                </div>
            </div>


            <style>
                /* ---------- Modal base ---------- */
                .m-modal{position:fixed; inset:0; display:none; align-items:center; justify-content:center; z-index:9999;}
                .m-modal.is-open{display:flex;}
                .m-backdrop{position:absolute; inset:0; background:rgba(0,0,0,.35); animation:fade .2s ease-out;}
                .m-card{
                    position:relative; z-index:1; background:#fff; border-radius:6px;
                    min-width:260px; max-width:92vw; padding:20px 16px 22px;
                    box-shadow:0 10px 30px rgba(0,0,0,.18); animation:pop .2s ease-out;
                }
                .m-close{
                    position:absolute; top:6px; right:8px; border:0; background:transparent;
                    font-size:20px; line-height:1; cursor:pointer; opacity:.6;
                }
                .m-close:hover{opacity:1;}

                .m-body h3{margin:0 24px 12px 0; font-size:16px; font-weight:600; color:#111;}
                .m-actions{display:flex; gap:10px; margin-top:6px;}

                .btn{display:inline-flex; align-items:center; justify-content:center; padding:8px 14px;
                    border-radius:6px; font-weight:600; border:1px solid transparent; cursor:pointer; text-decoration:none;}
                .btn-primary{background:#111; color:#fff; border-color:#111;}
                .btn-primary:hover{filter:brightness(.95);}
                .btn-secondary{background:#eee; color:#333; border-color:#ddd;}
                .btn-secondary:hover{background:#e5e5e5;}

                @keyframes fade{from{opacity:0} to{opacity:1}}
                @keyframes pop{from{transform:translateY(6px); opacity:0} to{transform:translateY(0); opacity:1}}
            </style>

            <!-- Modal -->
            <div id="cartAddedModal" class="m-modal" aria-hidden="true">
                <div class="m-backdrop" data-close-modal></div>

                <div class="m-card" role="dialog" aria-modal="true" aria-labelledby="m-title" tabindex="-1">
                    <button class="m-close" aria-label="Đóng" data-close-modal id="cboxClose">&times;</button>
                    <div class="m-body">
                        <h3 id="m-title">Thêm vào giỏ hàng thành công</h3>
                    </div>

                    <div class="m-actions">
                        <a href="/thanh-toan" class="btn btn-primary">Thanh toán ngay</a>
                        <button class="btn btn-secondary" data-close-modal>Mua tiếp</button>
                    </div>
                </div>
            </div>







            <div class="requestcall2">
                <div class="rowr">
                    <ul class="policy ">
                        <li><i class="icon-poltel"></i>
                            <p>Liên hệ CSKH : <a href="tel:0777891991"> <strong>{{ $config->hotline }}</strong></a></p>
                        </li>
                        <li><i class="icon-poltel"></i>
                            <p>Đặt hàng ngay : <a href="tel:077.789.1991"><strong>{{ $config->hotline }}</strong></a>
                            </p>
                        </li>
                        <li><i class="icon-polmail"></i>
                            <p>Email: {{ $config->email }}</p>
                        </li>
                    </ul>
                </div>
                <div class="input_action">
                    <ul class="policy">
                        <li class="titlep" style="padding: 3px 0 3px 5px;border-bottom:none"><h4>Vì Sao Bạn Nên
                                Chọn {{ $config->short_name_company }} ?</h4></li>

                        <li style="padding: 3px 0 3px 0px;">
                <span class="iconp">
                    <img src="/site/img/check%402x.png" alt="Chính hãng">
                </span>
                            <span>Hàng nhập khẩu <strong>chính hãng</strong>, giá tốt nhất VN</span>
                        </li>
                        <li style="padding: 3px 0 3px 0px;">
                <span class="iconp">
                     <img src="/site/img/check%402x.png" alt="đại lý cấp 1">
                </span>
                            <span>Là <strong>đại lý cấp 1</strong> được ủy quyền từ các hãng</span>
                        </li>
                        <li style="padding: 3px 0 3px 0px;">
                <span class="iconp">
                    <img src="/site/img/icon-bh.png" alt="hỗ trợ kỹ thuật">
                </span>
                            <span>Hỗ trợ <strong>trọn đời</strong> với kỹ thuật kinh nghiệm lâu năm</span>
                        </li>
                        <li style="padding: 3px 0 3px 0px;">
                <span class="iconp">
                     <img src="/site/img/icon-so.png" alt="số 1 việt nam">
                </span>
                            <span>Bảo hành, bảo trì sản phẩm nhanh <strong>số 1  Việt Nam</strong></span>
                        </li>
                        <li style="padding: 3px 0 3px 0px;">
                <span class="iconp">
                     <img src="/site/img/icon-so.png" alt="số 1 việt nam">
                </span>
                            <span>1 đổi 1 trong 15 ngày nếu lỗi do NSX</span>
                        </li>
                    </ul>
                    <ul class="service-free">
                        <li><i class="iconmy-express"></i> <strong>BẢO HÀNH CHÍNH HÃNG</strong></li>
                        @foreach($policies as $policy)
                            <li><a href="{{ route('front.policy', $policy->slug) }}">{{ $policy->title }}</a></li>
                        @endforeach
                        <li><a href="{{ route('front.contact') }}">Liên hệ góp ý</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col_main">

            <div class="clr"></div>

            <div class="clr"></div>

            <div id="goods_info">
                <article id="description">
                    <div class="article_content">
                        {!! $product->body !!}
                    </div>
                    <div class="view-more hidden">
                        <p id="btn-viewmore"><span id="view1">Đọc thêm </span>
                            <!-- <span id="view2" class="hidden">Thu gọn </span> --></p>
                    </div>
                </article>


            </div>
        </div>

        <div class="col_sub">

            <div class="clr"></div>
            <div class="tableparameter" id="tableparameter">
                <h2>Thông tin sản phẩm</h2>

                <style>
                    .pro-label {
                        display: block;
                        margin-bottom: 4px;
                        font-weight: 600;
                    }

                    .pro-value {
                        display: block;
                        line-height: 1.6;
                    }

                    /* mỗi value 1 dòng */
                </style>
                <ul class="parameter">
                    @foreach($product->attributesInfo as $keyAttr => $attribute)
                        <li class="pro">
                            <span>{{ $keyAttr }}:</span>
                            @foreach($attribute as $value)
                                <span class="pro-value">{{ $value }} </span>
                            @endforeach
                        </li>
                    @endforeach

                </ul>
                <div class="viewparameterfull" id="showall_parameter">Xem chi tiết</div>
                <div class="viewparameterfull hidden" id="less_parameter">Thu gọn</div>
            </div>

            <div class="box goods_related" id="related">
                <h3 class="box_title">Sản phẩm liên quan</h3>
                <ul class="homeproduct">
                    @foreach($otherProducts as $productOther)
                        <li>
                            <div class="item-label">
                            </div>
                            <a href="loa-nexo-ps10-r2-france.html">
                                <img class="lazyload"
                                     data-src="{{ $productOther->image->path ?? '' }}"
                                     alt="{{ $productOther->name }}"/>
                                <h3>{{ $productOther->name }}</h3>
                                <div class="price">
                                    @if($productOther->price > 0)
                                        <strong>{{ formatCurrency($productOther->price) }}₫</strong>
                                    @else
                                        <strong>Liên hệ</strong>
                                    @endif
                                </div>

                            </a>

                        </li>
                    @endforeach

                </ul>
            </div>


        </div>

        <div class="clr"></div>


    </section>

    <div class="closebtn"><span>✖</span>Đóng</div>
    <div class="fullparameter">
        <div class="scroll">
            <h3>Thông số kỹ thuật chi tiết</h3>
            <ul class="parameter" id="append_param"></ul>
        </div>
    </div>
@endsection

@push('scripts')

    <script src="/site/custom-js/detail-product.js"></script>

@endpush

@push('scripts_angular')
    <script>
        app.controller('productPage', function ($rootScope, $scope, cartItemSync, $interval) {
            $scope.errors = [];
            $scope.sendSuccess = false;
            $scope.item_qty = 1;
            $scope.product = @json($product);
            $scope.order = function () {
                if (!parseInt($scope.item_qty)) {
                    alert('Vui lòng nhập số lượng');
                    return;
                }

                url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
                url = url.replace('productId', {{$product->id}});

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        'qty': parseInt($scope.item_qty)
                    },
                    success: function (response) {
                        if (response.success) {
                            $interval.cancel($rootScope.promise);
                            $rootScope.promise = $interval(function () {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            toastr.success('Đã thêm sản phẩm vào giỏ hàng !');
                            openModal('cartAddedModal')
                        }
                    },
                    error: function () {
                        toastr.warning('Thao tác thất bại !');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }
        })

    </script>


    <script>
        function openModal(id){
            const m = document.getElementById(id);
            if(!m) return;
            m.classList.add('is-open');
            document.body.style.overflow = 'hidden';
            // focus vào khung modal để hỗ trợ bàn phím
            const card = m.querySelector('.m-card');
            if(card) card.focus();
        }

        function closeModal(m){
            m.classList.remove('is-open');
            document.body.style.overflow = '';
        }

        // Đóng khi click backdrop, nút ×, nút "Mua tiếp"
        document.addEventListener('click', (e)=>{
            if(e.target.matches('[data-close-modal]')){
                const modal = e.target.closest('.m-modal');
                if(modal) closeModal(modal);
            }
        });

        // ESC để đóng
        document.addEventListener('keydown', (e)=>{
            if(e.key === 'Escape'){
                document.querySelectorAll('.m-modal.is-open').forEach(closeModal);
            }
        });

        // Ví dụ: sau khi thêm vào giỏ bằng Ajax, gọi openModal('cartAddedModal');
    </script>


@endpush

