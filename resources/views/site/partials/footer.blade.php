<div class="container">
    <ul class="camket clearfix">
        <li>Cam Kết Chính Hãng <br>Đảm Bảo Bởi Pro Sound</li>
        <li>Miễn Phí Giao hàng <br>từ đơn hàng 1.000.000đ</li>
        <li>Hỗ trợ tư vấn <br>{{ $config->hotline }} - {{ $config->zalo }}</li>
        <li>Chính Sách Đổi Trả <br>Khi Đủ Điều Kiện</li>
    </ul>
</div>


<footer>
    <div class="container">
        <ul class="colfoot" style="width: 33%;">
            <li class="cot_title">
                <img height="42" width="200" src="{{ $config->image->path ?? '' }}" alt="{{ $config->web_title }}">
            </li>
            <li class="company_info">
                <p class="nameshop">{{ $config->web_title }}</p>
                <p>ĐKKD số : {{ $config->dkkd }}</p>
                <p>Nơi cấp : {{ $config->noicap_dkkd }}</p>
                <p><strong>Trụ sở :</strong> {{ $config->address_company }}</p>
                <p class="listtel_content"><span>Liên hệ:</span><strong class="tel">{{ $config->hotline }}</strong> |
                    <strong
                        class="tel"> {{ $config->zalo }}</strong> (8:00-20:00)</p>
                <p>Email: {{ $config->email }}</p>
            </li>
        </ul>
        <ul class="colfoot" style="width: 20%">
            <h3>
                <li class="cot_title">Danh mục</li>
            </h3>
            <li><a target="_blank" rel="nofollow" href="{{ route('front.about_page') }}">Giới thiệu</a></li>
             @foreach($categories as $cate)
                <li><a target="_blank" rel="nofollow" href="{{ route('front.getCategoryProduct', $cate->slug) }}">{{ $cate->name }} </a></li>
            @endforeach
        </ul>
        <ul class="colfoot" style="width: 20%">
            <h3>
                <li class="cot_title">Hỗ trợ khách hàng</li>
            </h3>
            @foreach($policies as $poly)
                <li><a target="_blank" rel="nofollow" href="{{ route('front.policy', $poly->slug) }}">{{ $poly->title }}</a></li>
            @endforeach
        </ul>

        <ul class="colfoot" style="padding-left: 50px">
            <h4>
                <li class="cot_title">Kết nối với chúng tôi</li>
            </h4>
            <li class="social_link">
                <a target="_blank" rel="noreferrer" href="{{ $config->facebook }}"><img height="40"
                                                                                                       width="40"
                                                                                                       src="/site/img/facebook.png"
                                                                                                       alt="facebook"></a>
                <a rel="nofollow" rel="noreferrer" href="https://m.me/{{ $config->facebook }}" target="_blank">
                    <img src="/site/img/messager.png" alt="messager" height="40" width="40">
                </a>
                <a target="_blank" rel="noreferrer" href="https://www.zalo.me/{{ $config->zalo }}"><img height="40"
                                                                                                        width="40"
                                                                                                        src="/site/img/zalo.png"
                                                                                                        alt="zalo"></a>
                <a target="_blank" rel="noreferrer" href="{{ $config->youtube }}"><img height="40"
                                                                                                    width="40"
                                                                                                    src="/site/img/youtube.png"
                                                                                                    alt="youtube"></a>

            </li>
            <li>
                <img src="/site/img/payment.png" height="27" width="140" alt="payment support">

                <a href="http://online.gov.vn/Home/WebDetails/104468"><img width="130" height="50"
                                                                           src="/site/img/logosalenoti.png"
                                                                           alt="bo cong thuong"></a>

            </li>
        </ul>
{{--        <div class="coso">--}}
{{--            <ul class="col50">--}}
{{--                <li><p>MIỀN BẮC : Biệt thự M01-L03, Khu A - Khu đô thị mới Dương Nội, phường Dương Nội, Quận Hà Đông,--}}
{{--                        Thành phố Hà Nội</p>--}}
{{--                    <p> 📍 MAP : <a target="_blank" rel="nofollow" href="https://maps.app.goo.gl/FyF7ZkiVDrokcDyi7"--}}
{{--                                   title="bản đồ vị trí Pro Sound Việt Nam">https://maps.app.goo.gl/FyF7ZkiVDrokcDyi7</a>--}}
{{--                    </p></li>--}}
{{--                <li><p>MIỀN NAM : Số 409 Trần Văn Giàu, Phường Bình Trị Đông B, Quận Bình Tân, TPHCM</p>--}}
{{--                    <p> 📍 MAP : <a target="_blank" rel="nofollow" href="https://maps.app.goo.gl/YZ9tUYztaLtnPvwh7"--}}
{{--                                   title="bản đồ vị trí Pro Sound Sài Gòn">https://maps.app.goo.gl/YZ9tUYztaLtnPvwh7</a>--}}
{{--                    </p></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
    </div>

</footer>
