@extends('site.mobile.layouts.master')

@section('title'){{ $product->name }} - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection


@section('css')
    <link rel="stylesheet" href="/site/custom-css/detail-product-mb.css">

@endsection

@section('content')
    <section ng-controller="productPage">
        <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('front.home-page') }}"><span itemprop="name">Trang chủ</span></a>
                <meta itemprop="position" content="1"></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('front.getCategoryProduct', $product->category->slug ?? '' ) }}"><span itemprop="name">{{ $product->category->name ?? '' }}</span></a>
                <meta itemprop="position" content="2"></li><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="javascript:;"><span itemprop="name">{{ $product->name }}</span></a><meta itemprop="position" content="3"></li></ol>
        <div class="gallery  clearfix" id="gallery">
            <div class="cover">
                <a href="{{ $product->image->path ?? '' }}" title="" class="clearfix color_box" rel="gallery_color">
                    <img class="lazyload" data-src="{{ $product->image->path ?? '' }}" alt=""/>
                </a>
            </div>
        </div>



        <h1>{{ $product->name }}</h1>
        <div class="ratingresult">
            Mã SP: {{ $product->code }} |
            Thương hiệu: <a target="_blank" href="thuong-hieu-nexo">{{ $product->manufacturer->name ?? 'Đang cập nhật' }}</a>
        </div>
        <div class="goods_details">
            <div class="price_sale">
                <div class="area_price">
                    @if($product->price > 0)
                        <strong>{{ formatCurrency($product->price) }}₫</strong>
                    @else
                        <strong>Liên hệ</strong>
                    @endif
                </div>
                <div class="area_rank">
                    <div>{{ $product->state == 1 ? 'Còn hàng' : 'Hết hàng' }}</div>
                </div>
            </div>
            <div class="clr"></div>
            <ul class="policy ">
                <li class="inpr" style="width: 100%;float: left;"><span class="no">Mã SP : <strong>{{ $product->code }}</strong></span></li>
                <li class="inpr" style="width: 100%;float: left;">Thương hiệu: <strong><a title="Thương hiệu Nexo" href="/thuong-hieu-nexo">{{ $product->manufacturer->name ?? 'Đang cập nhật' }}</a></strong></li>
                <li class="inpr"  style="width: 100%;float: left;"><span>Tình trạng : <span class="tinhtrang">{{ $product->state == 1 ? 'Còn hàng' : 'Hết hàng' }}</span></span></li>
                <li class="wrpr" style="width: 100%;float: left;"><span>Bảo hành : <strong> Chính Hãng</strong> </span></li>
            </ul>
            <style>
                .buy_now {
                    font-family: "Times New Roman";
                }
            </style>

            <div class="area_order">
                <form  method="post" id="purchase_form">
                    <div class="clr"></div>
                    <p>Số lượng: <input aria-label="Số lượng" min="1" type="text" name="number" value="1" size="4" class="number" id="number" ng-model="item_qty"/>

                    </p>
                </form>
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


                <div class="clr"></div>
                <div class="rowr">
                    <ul class="policy ">
                        <li><i class="icon-poltel"></i>
                            <p>Liên hệ CSKH : <a href="tel:0777891991"> <strong>{{ $config->hotline }}</strong></a></p>
                        </li>
                        <li><i class="icon-poltel"></i>
                            <p>Đặt hàng ngay : <a href="tel:0777 891 992"><strong>{{ $config->zalo }}</strong></a></p>
                        </li>
                        <li><i class="icon-polmail"></i>
                            <p>Email: {{ $config->email }}</p>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
        <ul class="policy clearfix">


        </ul>
        <div class="tableparameter" id="tableparameter">
            <h2>Thông số kỹ thuật</h2>
            <ul class="parameter">
                @foreach($product->attributesInfo as $keyAttr => $attribute)
                    <li class="pro">
                        <span>{{ $keyAttr }}:</span>
                        @foreach($attribute as $value)
                            <span>{{ $value }} </span>
                        @endforeach
                    </li>
                @endforeach
            </ul>
            <div class="viewparameterfull" id="showall_parameter">Xem chi tiết thông số kỹ thuật</div>
            <div class="viewparameterfull hidden" id="less_parameter">Thu gọn</div>
        </div>


        <p class="intro">{{ $product->name }}</p>
        <article id="description">
            <div class="article_content">
                {!! $product->body !!}
            </div>
            <div class="view-more hidden">
                <p id="btn-viewmore"><span id="view1">Đọc thêm </span><!-- <span id="view2" class="hidden">Thu gọn </span> --></p>
            </div>
        </article>

        <div class="box goods_related" id="related">
            <h3 class="box_title">Sản phẩm liên quan</h3>
            <div class="scroll_product">
                @foreach($otherProducts as $productOther)
                <div class="item" data-id="11951">
                    <div class="item-label">
                    </div>
                    <a href="loa-subwoofer-nexo-ls18">
                        <div class="img"><img height="120" width="120" class="lazyload" data-src="{{ $productOther->image->path ?? '' }}" alt="{{ $productOther->name }}"/></div>
                        <h3>{{ $productOther->name }}</h3>
                        <div class="price">
                            @if($productOther->price > 0)
                                <strong>{{ formatCurrency($productOther->price) }}₫</strong>
                            @else
                                <strong>Liên hệ</strong>
                            @endif
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="submit_form">
            <h4 class="booking-title">Đăng ký tư vấn sản phẩm</h4>
            <form id="booking" class="booking_form" name="booking">
                <input placeholder="Địa chỉ *" type="text" name="badd" id="badd" required="">
                <div class="input_inline">
                    <input placeholder="Tên đầy đủ *" type="text" name="bname" id="bname" required="">
                    <input placeholder="Điện thoại *" type="text" name="bmobile" id="bmobile" required="">
                    <input type="hidden" name="goods_name" value="Loa Subwoofer Amate Nitid N18WP">
                    <input type="hidden" name="goods_url" value="https://prosound.vn/loa-subwoofer-amate-nitid-n18wp">
                </div>
                <textarea placeholder="Nội dung *" name="bnotice" rows="5" id="bnotice" required=""></textarea>
                <div class="fsubmit">
                    <a class="button" onclick="submitBooking();" name="booking">Gửi đăng ký</a>
                </div>
            </form>
        </div>




{{--        <div class="quickbar" id="quickbar">--}}
{{--            <a rel="nofollow"  href="javascript:buy(12379)" class="buy_now">--}}
{{--                <b>Đặt mua ngay</b>--}}
{{--            </a>--}}
{{--            <a rel="nofollow"  href="tel:077.789.1991" class="buy_ins">--}}
{{--                <b>Gọi Đặt Mua</b>--}}
{{--            </a>--}}
{{--        </div>--}}
    </section>
@endsection

@push('scripts')

    <script src="/site/custom-js/detail-product-mobile.js"></script>


    <div class="gallery gallery_color_box clearfix" id="gallery" style="height:0px!important;min-height:0px!important">
        <div class="thumb clearfix">
            <div class="thumb_inner">
                <ul>
                    <li data-glid="0">
                        <a class="color_box" href="https://prosound.vn/cdn/images/202407/goods_img/loa-yamaha-dhr12m-P12865-1721797165214.jpg" title="" rel="gallery_color">
                            <img class="lazyload" data-src="https://prosound.vn/cdn/images/202407/thumb_img/loa-yamaha-dhr12m-thumb-P12865-1721797165983.webp" alt=""></a>
                    </li>
                    <li data-glid="0">
                        <a class="color_box" href="https://prosound.vn/cdn/images/202407/goods_img/loa-yamaha-dhr12m-P12865-1721797165596.jpg" title="" rel="gallery_color">
                            <img class="lazyload" data-src="https://prosound.vn/cdn/images/202407/thumb_img/loa-yamaha-dhr12m-thumb-P12865-1721797165287.webp" alt=""></a>
                    </li>
                    <li data-glid="0">
                        <a class="color_box" href="https://prosound.vn/cdn/images/202407/goods_img/loa-yamaha-dhr12m-P12865-1721797166395.jpg" title="" rel="gallery_color">
                            <img class="lazyload" data-src="https://prosound.vn/cdn/images/202407/thumb_img/loa-yamaha-dhr12m-thumb-P12865-1721797166367.webp" alt=""></a>
                    </li>
                    <li data-glid="0">
                        <a class="color_box" href="https://prosound.vn/cdn/images/202407/goods_img/loa-yamaha-dhr12m-P12865-1721797166778.jpg" title="" rel="gallery_color">
                            <img class="lazyload" data-src="https://prosound.vn/cdn/images/202407/thumb_img/loa-yamaha-dhr12m-thumb-P12865-1721797166267.webp" alt=""></a>
                    </li>
                    <li data-glid="0">
                        <a class="color_box" href="https://prosound.vn/cdn/images/202407/goods_img/loa-yamaha-dhr12m-P12865-1721797167242.jpg" title="" rel="gallery_color">
                            <img class="lazyload" data-src="https://prosound.vn/cdn/images/202407/thumb_img/loa-yamaha-dhr12m-thumb-P12865-1721797167783.webp" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>



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

