@extends('web.layout')
@section('title', 'Trang chủ')
@section('content')
    <!-- =====  BANNER STRAT  ===== -->
    <div class="container banner mt_20">
        <div class="main-banner owl-carousel">
            @foreach ($slides as $item)
                <div class="item">
                    <a href="#">
                        <img src="{{ $item->image }}" alt="Main Banner" class="img-responsive" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- =====  BANNER END  ===== -->
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <!-- =====  SUB BANNER  STRAT ===== -->
        <div class="row">
            <div class="cms_banner mt_10">
                <div class="col-xs-4 mt_10">
                    <div id="subbanner1" class="sub-hover">
                        <div class="sub-img"><a href="#"><img src="{{ url('web/images/sub1.jpg') }}"
                                    alt="Sub Banner1" class="img-responsive"></a></div>
                        <div class="bannertext text-center">
                            <button class="btn mb_10 cms_btn">Xem chi tiết</button>
                            <h2>Mũ và thu gọn</h2>
                            <p class="mt_10">Nhiều loại kích cỡ, màu sắc</p>
                        </div>
                    </div>
                    <div id="subbanner2" class="sub-hover mt_20">
                        <div class="sub-img"><a href="#"><img src="{{ url('web/images/sub2.jpg') }}"
                                    alt="Sub Banner2" class="img-responsive"></a></div>
                        <div class="bannertext text-center">
                            <button class="btn mb_10 cms_btn">Xem chi tiết</button>
                            <h2>Khăn quàng cổ</h2>
                            <p class="mt_10">Bộ sưu tập của nhà thiết kế</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 mt_10">
                    <div id="subbanner3" class="sub-hover">
                        <div class="sub-img"> <a href="#"><img src="{{ url('web/images/sub3.jpg') }}"
                                    alt="Sub Banner3" class="img-responsive"></a></div>
                    </div>
                </div>
                <div class="col-xs-4 mt_10">
                    <div id="subbanner4" class="sub-hover">
                        <div class="sub-img"><a href="#"><img src="{{ url('web/images/sub4.jpg') }}"
                                    alt="Sub Banner4" class="img-responsive"></a></div>
                        <div class="bannertext text-center">
                            <button class="btn mb_10 cms_btn">Xem chi tiết</button>
                            <h2>Túi xách</h2>
                            <p class="mt_10">Túi dành cho nam và nữ</p>
                        </div>
                    </div>
                    <div id="subbanner5" class="sub-hover mt_20">
                        <div class="sub-img"><a href="#"><img src="{{ url('web/images/sub5.jpg') }}"
                                    alt="Sub Banner5" class="img-responsive"></a></div>
                        <div class="bannertext text-center">
                            <button class="btn mb_10 cms_btn">Xem chi tiết</button>
                            <h2>Giày dép</h2>
                            <p class="mt_10">Hơn 400 nhà thiết kế sang trọng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =====  SUB BANNER END  ===== -->
        <div class="row ">
            <div class="col-sm-12 mtb_10">
                <!-- =====  PRODUCT TAB  ===== -->
                <div id="product-tab" class="mt_50">
                    <div class="heading-part mb_10 ">
                        <h2 class="main_title">Sản phẩm bán chạy</h2>
                    </div>
                    <div class="tab-content clearfix box">
                        <div class="tab-pane active" id="nArrivals">
                            <div class="nArrivals owl-carousel">
                                @foreach ($sellingProducts as $item)
                                    <div class="product-grid">
                                        <div class="item">
                                            <div class="product-thumb">
                                                <div class="image product-imageblock"> <a href="product_detail_page.html">
                                                        <img data-name="product_image" src="{{ $item->thumbnail }}"
                                                            alt="iPod Classic" title="iPod Classic" class="img-responsive">
                                                        <img src="{{ $item->thumbnail }}" alt="iPod Classic"
                                                            title="iPod Classic" class="img-responsive">
                                                    </a>
                                                    <div class="button-group text-center">
                                                        <div class="wishlist"><a href="#"><span>wishlist</span></a>
                                                        </div>
                                                        <div class="quickview"><a href="#"><span>Quick
                                                                    View</span></a></div>
                                                        <div class="compare"><a href="#"><span>Compare</span></a>
                                                        </div>
                                                        <div class="add-to-cart"><a href="#"><span>Add to
                                                                    cart</span></a></div>
                                                    </div>
                                                </div>
                                                <div class="caption product-detail text-center">
                                                    <div class="rating"> <span class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-1x"></i><i
                                                                class="fa fa-star fa-stack-1x"></i></span> <span
                                                            class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-1x"></i><i
                                                                class="fa fa-star fa-stack-1x"></i></span> <span
                                                            class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-1x"></i><i
                                                                class="fa fa-star fa-stack-1x"></i></span> <span
                                                            class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-1x"></i><i
                                                                class="fa fa-star fa-stack-1x"></i></span> <span
                                                            class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-1x"></i><i
                                                                class="fa fa-star fa-stack-x"></i></span> </div>
                                                    <h6 data-name="product_name" class="product-name"><a href="#"
                                                            title="Casual Shirt With Ruffle Hem">{{ $item->product_name }}</a>
                                                    </h6>
                                                    @if ($item->discount == null)
                                                        <span class="price">
                                                            {{ number_format($item->price) }}đ
                                                        </span>
                                                    @else
                                                        <span class="price">
                                                            <strike
                                                                style="font-size: 14px;color: #969696;">{{ number_format($item->discount) }}đ</strike>
                                                            {{ number_format($item->price) }}đ
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <!-- =====  PRODUCT TAB  END ===== -->
                <!-- =====  SUB BANNER  STRAT ===== -->
                <div class="row">
                    <div class="cms_banner mt_50">
                        <div class="col-sm-12 mt_10">
                            <div id="subbanner3" class="sub-hover">
                                <div class="sub-img"> <a href="#"><img src="{{ url('web/images/sub6.jpg') }}"
                                            alt="Sub Banner3" class="img-responsive"></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =====  SUB BANNER END  ===== -->
                <!-- =====  PRODUCT TAB  ===== -->
                <div id="product-tab" class="mt_50">
                    <div class="heading-part mb_10 ">
                        <h2 class="main_title">Sản phẩm nổi bật</h2>
                    </div>
                    <div class="tab-content clearfix box">
                        <div class="tab-pane active" id="nArrivals">
                            <div class="nArrivals owl-carousel">
                                @foreach ($sellingProducts as $item)
                                    <div class="product-grid">
                                        <div class="item">
                                            <div class="product-thumb">
                                                <div class="image product-imageblock"> <a href="product_detail_page.html">
                                                        <img data-name="product_image" src="{{ $item->thumbnail }}"
                                                            alt="iPod Classic" title="iPod Classic" class="img-responsive">
                                                        <img src="{{ $item->thumbnail }}" alt="iPod Classic"
                                                            title="iPod Classic" class="img-responsive">
                                                    </a>
                                                    <div class="button-group text-center">
                                                        <div class="wishlist"><a href="#"><span>wishlist</span></a>
                                                        </div>
                                                        <div class="quickview"><a href="#"><span>Quick
                                                                    View</span></a></div>
                                                        <div class="compare"><a href="#"><span>Compare</span></a>
                                                        </div>
                                                        <div class="add-to-cart"><a href="#"><span>Add to
                                                                    cart</span></a></div>
                                                    </div>
                                                </div>
                                                <div class="caption product-detail text-center">
                                                    <div class="rating"> <span class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-1x"></i><i
                                                                class="fa fa-star fa-stack-1x"></i></span> <span
                                                            class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-1x"></i><i
                                                                class="fa fa-star fa-stack-1x"></i></span> <span
                                                            class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-1x"></i><i
                                                                class="fa fa-star fa-stack-1x"></i></span> <span
                                                            class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-1x"></i><i
                                                                class="fa fa-star fa-stack-1x"></i></span> <span
                                                            class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-1x"></i><i
                                                                class="fa fa-star fa-stack-x"></i></span> </div>
                                                    <h6 data-name="product_name" class="product-name"><a href="#"
                                                            title="Casual Shirt With Ruffle Hem">{{ $item->product_name }}</a>
                                                    </h6>
                                                    @if ($item->discount == null)
                                                        <span class="price">
                                                            {{ number_format($item->price) }}đ
                                                        </span>
                                                    @else
                                                        <span class="price">
                                                            <strike
                                                                style="font-size: 14px;color: #969696;">{{ number_format($item->discount) }}đ</strike>
                                                            {{ number_format($item->price) }}đ
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <!-- =====  PRODUCT TAB  END ===== -->
                <!-- =====  Blog ===== -->
                <div id="Blog" class="mt_50">
                    <div class="heading-part mb_10 ">
                        <h2 class="main_title">Bài Viết</h2>
                    </div>
                    <div class="blog-contain box">
                        <div class="blog owl-carousel ">
                            @foreach ($posts as $item)
                                <div class="item">
                                    <div class="box-holder">
                                        <div class="thumb post-img"><a href="#"> <img src="{{ $item->thumbnail }}"
                                                    alt="OYEENok">
                                            </a>
                                        </div>
                                        <div>
                                            <div class="title-post"
                                                style="font-size: 20px; padding-top: 10px; padding-bottom: 10px;color: #000000">
                                                {{ $item->title }}</div>
                                            <div class="summary-post"
                                                style="font-size: 14px;line-height: 18px;color: #5a5a5a">
                                                {!! $item->summary !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- =====  Blog end ===== -->
                </div>
            </div>
        </div>
        @include('web.elements.brand')
        @include('web.elements.newsletters')
    </div>
    <!-- =====  CONTAINER END  ===== -->
@endsection
