@extends('site.mobile.layouts.master')
@section('title')
    Liên hệ - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{@$config->image->path ?? ''}}
@endsection

@section('css')
    <link rel="stylesheet" href="/site/custom-css/contact-mobi.css">
    <style>
        .invalid-feedback {
            width: 100%;
            margin-bottom: 0.75rem;
            margin-top: 0.25rem;
            font-size: 100%;
            color: #dc3545;
        }
    </style>
@endsection

@section('content')
    <section ng-controller="contactPage">
        <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('front.home-page') }}"><span itemprop="name">Trang chủ</span></a>
                <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="javascript:;"><span itemprop="name">Liên hệ</span></a>
                <meta itemprop="position" content="1">
            </li>
        </ol>

        {!! $config->location !!}

        <form name="formMsg" class="message-form" id="contactForm" ng-cloak>
            <p style="color:#999;margin-bottom: 20px">Bất kỳ liên hệ nào, Vui lòng điền đầy đủ thông tin vào Form,
                chúng tôi sẽ tiếp nhận và phản hồi kịp thời.</p>
            <input placeholder="Họ tên *" type="text" name="name" tabindex="1" required id="cf_username"/>
            <div class="invalid-feedback d-block" ng-if="errors['name']"><% errors['name'][0] %></div>

            <input placeholder="Số điện thoại *" type="text" name="phone" required tabindex="2" id="cf_tel"/>
            <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>

            <input placeholder="E-mail" type="text" name="email"  tabindex="3" id="cf_email"/>

            <input type="text" placeholder="Địa chỉ" name="address" required size="50" tabindex="7"
                   id="cf_title"/>
            <textarea placeholder="Nội dung *" name="message" required rows="6" cols="20" tabindex="7"
                      id="cf_content"></textarea>
            <div class="invalid-feedback d-block" ng-if="errors['message']"><% errors['message'][0] %></div>


            <div class="submit_wrap">
                <input type="button" value="Gửi" tabindex="9" class="button" ng-click="submitForm()" ng-disabled="loading"/>
            </div>
        </form>
    </section>
@endsection

@push('scripts')
    <script>
        app.controller('contactPage', function ($rootScope, $scope) {
            $scope.errors = [];
            $scope.sendSuccess = false;
            $scope.submitForm = function () {
                var url = "{{route('front.submitContact')}}";
                var data = jQuery('#contactForm').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            jQuery('#contactForm')[0].reset();
                            $scope.errors = [];
                            $scope.sendSuccess = true;
                            $scope.$apply();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }

        })
    </script>
@endpush
