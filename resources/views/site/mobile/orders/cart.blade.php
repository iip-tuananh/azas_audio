@extends('site.mobile.layouts.master')
@section('title')
    Giỏ hàng
@endsection

@section('css')

    <link rel="stylesheet" href="/site/custom-css/cart-mobile.css">
@endsection

@section('content')
    <section ng-controller="Cart">
        <div id="content" class="flow_wrapper">
            <div class="bar-top">
                <a href="{{ route('front.home-page') }}" class="buymore">Mua thêm sản phẩm khác</a>
                <div class="yourcart">
                    <a href="javascript:void(0)" class="delete_cart" ng-click="removeAllItem()">Xóa giỏ hàng</a>
                </div>
            </div>
            <div class="wrap_fullcart" ng-cloak>
                <form method="post" >
                    <ul class="listorder clearfix">
                        <li class="clearfix" ng-repeat="item in items">
                            <div class="col_img">
                                <a href="loa-subwoofer-nexo-els600" class="photo" rel="external">
                                    <img ng-src="<% item.attributes.image %>"/>
                                </a>
                                <a href="loa-subwoofer-nexo-els600" class="name" rel="external"><% item.name %></a>
                                <div class="extra_info">
                                    <a href="javascript:void(0)" class="icon_delete tip" title="Xóa Sản Phẩm"  ng-click="removeItem(item.id)">Xóa</a>
                                </div>
                            </div>
                            <div class="col_price">
                                <span class="price fl"><% item.price | number %>₫ </span>
                                <div class="button-container fr">
                                    <button class="cart-qty-minus" type="button" value="-" ng-click="decrementQuantity(item); changeQty(item.quantity, item.id)">-</button>
                                    <input type="number" min="1"  class="qty" step="1"
                                           ng-model="item.quantity" ng-change="changeQty(item.quantity, item.id)"
                                           title="Đừng quên cập nhật số lượng của các giỏ sửa đổi"/>
                                    <button class="cart-qty-plus" type="button" value="+" ng-click="incrementQuantity(item); changeQty(item.quantity, item.id)">+</button>
                                </div>
                            </div>
                        </li>

                    </ul>
                </form>
                <div class="order_total">
                    <div class="subtotal">
                        Tổng cộng <strong><% total | number%>₫</strong>
                    </div>
                    <div class="discount"></div>
                </div>

                <div class="order_total consignee_list">
                    <form name="theForm" >
{{--                        <h3>Thêm thông tin giao hàng</h3>--}}
{{--                        <div class="inline_input clearfix">--}}
{{--                            <div class="input">--}}
{{--                                <p class="label">Tên người nhận</p>--}}
{{--                                <input type="text" name="consignee" placeholder="* Bắt buộc" maxlength="120" required value="asdsd" id="consignee_0"/>--}}
{{--                            </div>--}}
{{--                            <div class="input">--}}
{{--                                <p class="label">Số điện thoại</p>--}}
{{--                                <input required type="text" name="tel" placeholder="* Bắt buộc" minlength="10" maxlength="10" value="0999999999" id="tel_0"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="block_input last">--}}
{{--                            <p class="label">Email </p>--}}
{{--                            <input name="email" type="email" placeholder="Không bắt buộc, để gửi email xác nhận" maxlength="120" value="" id="email_0"/>--}}
{{--                        </div>--}}
{{--                        <div class="odd">--}}
{{--                            <select class="hidden" name="country" id="selCountries_0" onchange="regionChanged(this, 1, 'selProvinces_0')">--}}
{{--                                <option value="0">Quốc gia (Bắt buộc)</option>--}}
{{--                                <option value="1" selected="selected">Việt Nam</option>--}}
{{--                            </select>--}}
{{--                            <select class="field-input"--}}
{{--                                    id="customer_shipping_province"--}}
{{--                                    ng-model="form.customer_province"--}}
{{--                                    ng-change="changeProvince()">--}}
{{--                                <option data-code="" value="">--}}
{{--                                    Chọn tỉnh / thành--}}
{{--                                </option>--}}
{{--                                <option data-code="province.code"--}}
{{--                                        ng-value="province.code"--}}
{{--                                        ng-repeat="province in provinces">--}}
{{--                                    <% province.name %>--}}
{{--                                </option>--}}
{{--                            </select>--}}
{{--                            <span class="invalid-feedback d-block" role="alert"--}}
{{--                                  ng-if="errors && errors['customer_province']">--}}
{{--                                                                <strong><% errors['customer_province'][0] %></strong>--}}
{{--                                                            </span>--}}
{{--                            <select class="field-input"--}}
{{--                                    id="customer_shipping_district"--}}
{{--                                    ng-model="form.customer_district"--}}
{{--                                    ng-change="changeDistrict()">--}}
{{--                                <option data-code="" value="">Chọn quận /--}}
{{--                                    huyện</option>--}}
{{--                                <option data-code="district.code"--}}
{{--                                        ng-value="district.code"--}}
{{--                                        ng-repeat="district in district_options">--}}
{{--                                    <% district.name %>--}}
{{--                                </option>--}}
{{--                            </select>--}}
{{--                            <span class="invalid-feedback d-block" role="alert"--}}
{{--                                  ng-if="errors && errors['customer_district']">--}}
{{--                                                                <strong><% errors['customer_district'][0] %></strong>--}}
{{--                                                            </span>--}}

{{--                            <select class="field-input" id="customer_shipping_ward"--}}
{{--                                    ng-model="form.customer_ward"--}}
{{--                                    ng-change="changeWard()">--}}
{{--                                <option data-code="" value="" >Chọn--}}
{{--                                    phường / xã</option>--}}
{{--                                <option data-code="ward.code" ng-value="ward.code"--}}
{{--                                        ng-repeat="ward in ward_options">--}}
{{--                                    <% ward.name %>--}}
{{--                                </option>--}}
{{--                            </select>--}}

{{--                            <span class="invalid-feedback d-block" role="alert"--}}
{{--                                  ng-if="errors && errors['customer_ward']">--}}
{{--                                                                <strong><% errors['customer_ward'][0] %></strong>--}}
{{--                                                            </span>--}}

{{--                        </div>--}}
{{--                        <div class="clr"></div>--}}
{{--                        <div class="block_input">--}}
{{--                            <p class="label">Địa chỉ</p>--}}
{{--                            <input required type="text" name="address" placeholder="VD: Thôn 6, Ấp Bình Hưng (Bắt buộc)" maxlength="255" value="hjkjhk" id="address_0"/>--}}
{{--                        </div>--}}
{{--                        <div class="block_input">--}}
{{--                            <p class="label">Thời gian giao hàng tốt nhất</p>--}}
{{--                            <input type="text" name="best_time" placeholder="Vd: 18:00" maxlength="120" value="hjkjhk" id="best_time_0"/>--}}
{{--                        </div>--}}
                        <div class="actions">
                            <a href="{{ route('cart.checkout') }}"><input type="button" name="submit" value="Thanh Toán" class="btn_submit"/></a>

                        </div>
                    </form>
                </div>

            </div>
            <div class="clr"></div>
            <p class="notice">Bằng cách đặt hàng, bạn đồng ý với <a target="_blank" href="dieu-khoan-su-dung">Điều khoản sử dụng</a> của shop</p>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="/site/custom-js/cart.js"></script>
@endpush

@push('scripts_angular')
    <script>
        app.controller('Cart', function ($rootScope, $scope, $interval, cartItemSync) {
            $scope.items = @json($cartCollection);
            $scope.total = "{{$total_price}}";
            $scope.checkCart = true;
            $scope.countItem = Object.keys($scope.items).length;


            jQuery(document).ready(function () {
                if ($scope.total == 0) {
                    $scope.checkCart = false;
                    $scope.$applyAsync();
                }
            })

            $scope.changeQty = function (qty, product_id) {
                updateCart(qty, product_id)
            }

            $scope.incrementQuantity = function (product) {
                product.quantity = Math.min(product.quantity + 1, 9999);
            };

            $scope.decrementQuantity = function (product) {
                product.quantity = Math.max(product.quantity - 1, 1);
            };

            function updateCart(qty, product_id) {
                jQuery.ajax({
                    type: 'POST',
                    url: "/update-cart",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    beforeSend: function() {
                        jQuery('.loading-spin').show();
                        showOverlay();
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        jQuery('.loading-spin').hide();
                        hideOverlay();
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.removeItem = function (product_id) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('cart.remove.item')}}",
                    data: {
                        product_id: product_id
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            if ($scope.total == 0) {
                                $scope.checkCart = false;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.countItem = Object.keys($scope.items).length;

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.removeAllItem = function () {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('cart.removeAllItem')}}",
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            if ($scope.total == 0) {
                                $scope.checkCart = false;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.countItem = Object.keys($scope.items).length;

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            function showOverlay() {
                // var overlay = document.getElementById('overlay');
                // overlay.style.display = 'flex';
            }

            function hideOverlay() {
                // var overlay = document.getElementById('overlay');
                // overlay.style.display = 'none';
            }





        })

    </script>
@endpush
