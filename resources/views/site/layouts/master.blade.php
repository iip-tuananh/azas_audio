<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body id="page_index" ng-app="App">

@include('site.partials.header')

@yield('content')

<script>
    var CSRF_TOKEN = "{{ csrf_token() }}";
</script>

@include('site.partials.angular_mix')


<script>
    app.controller('headerPartial', function ($rootScope, $scope, cartItemSync, $interval, $window) {
        $scope.hasItemInCart = true;
        $scope.cart = cartItemSync;

        // xóa item trong giỏ
        $scope.removeItem = function (product_id) {
            jQuery.ajax({
                type: 'GET',
                url: "{{route('cart.remove.item')}}",
                data: {
                    product_id: product_id
                },
                success: function (response) {
                    if (response.success) {
                        $scope.cart.items = response.items;
                        $scope.cart.count = Object.keys($scope.cart.items).length;
                        $scope.cart.totalCost = response.total;

                        $interval.cancel($rootScope.promise);

                        $rootScope.promise = $interval(function(){
                            cartItemSync.items = response.items;
                            cartItemSync.total = response.total;
                            cartItemSync.count = response.count;
                        }, 1000);

                        if ($scope.cart.count == 0) {
                            $scope.hasItemInCart = false;
                        }
                        $scope.$applyAsync();
                    }
                },
                error: function (e) {
                    jQuery.toast.error('Đã có lỗi xảy ra');
                },
                complete: function () {
                    $scope.$applyAsync();
                }
            });
        }

        $scope.search = function () {
            if (!$scope.keywords || !$scope.keywords.trim()) {
                alert('Vui lòng nhập từ khóa tìm kiếm!');
                return;
            }

            // Xây URL cơ bản
            var url = '/tim-kiem?keywords=' + encodeURIComponent($scope.keywords.trim());

            // Điều hướng
            $window.location.href = url;
        };

    });

    // đồng bộ hiển thị số lượng item giỏ hàng
    app.factory('cartItemSync', function ($interval) {
        var cart = {items: null, total: null};

        cart.items = @json($cartItems);
        cart.count = {{$cartItems->sum('quantity')}};
        cart.total = {{$totalPriceCart}};

        return cart;
    });
</script>

@stack('scripts_angular')

</body>

@include('site.partials.footer')
<div class="copyright">&copy; 2025 {{ $config->web_title }}</div>
{{--<a href="#top" rel="nofollow" title="Về Đầu Trang" id="back-top">↑</a>--}}


<script src="/site/js/callbutton.js"></script>


<div class="hidden-xs">
    @if($config->click_call)
        <div onclick="window.location.href= 'tel:{{ $config->hotline }}'" class="hotline-phone-ring-wrap">
            <div class="hotline-phone-ring">
                <div class="hotline-phone-ring-circle"></div>
                <div class="hotline-phone-ring-circle-fill"></div>
                <div class="hotline-phone-ring-img-circle">
                    <a href="tel: {{ $config->hotline }}" class="pps-btn-img">
                        <img src="/site/img/phone.png" alt="Gọi điện thoại" width="50" loading="lazy">
                    </a>
                </div>
            </div>
            <a href="tel:{{ $config->hotline }}">
            </a>
            <div class="hotline-bar"><a href="tel:{{ $config->hotline }}">
                </a><a href="tel:{{ $config->hotline }}">
                    <span class="text-hotline">{{ $config->hotline }}</span>
                </a>
            </div>

        </div>
    @endif

    <div class="inner-fabs">
        @if($config->facebook_chat)
            <a target="blank" href="{{ $config->facebook }}" class="fabs roundCool" id="challenges-fab"
               data-tooltip="Send Messenger">
                <img class="inner-fab-icon" src="/site/img/mess1.png" alt="challenges-icon" border="0" loading="lazy">
            </a>
        @endif
        @if($config->zalo_chat)
            <a target="blank" href="https://zalo.me/{{ preg_replace('/\s+/', '', $config->zalo) }}" class="fabs roundCool" id="chat-fab"
               data-tooltip="Send message Zalo">
                <img class="inner-fab-icon" src="/site/img/icon_zalo.webp" alt="chat-active-icon" border="0" loading="lazy">
            </a>
        @endif

    </div>
    <div class="fabs roundCool call-animation" id="main-fab">
        <img class="img-circle" src="/site/img/lienhe.png" alt="" width="135" loading="lazy">
    </div>
</div>





@stack('scripts')

</html>
