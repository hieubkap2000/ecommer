@extends('web.layout')
@section('title', $product->product_name)
@section('content')

    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>{{ $product->product_name }}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a
                                href="{{ route('web.productCategory', ['slug' => $product->category_slug, 'id' => $product->category_id]) }}">{{ $product->category_name }}</a>
                        </li>
                        <li class="active">{{ $product->product_name }}</li>
                    </ul>
                </div>
            </div>
            <!-- =====  BREADCRUMB END===== -->
            <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
                <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
                    <div class="nav-responsive">
                        <div class="heading-part">
                            <h2 class="main_title">Danh mục</h2>
                        </div>
                        <ul class="nav  main-navigation collapse in">
                            @foreach ($limitCategory as $item)
                                <li>
                                    <a
                                        href="{{ route('web.productCategory', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                        {{ $item->category_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="left_banner left-sidebar-widget mb_50"> <a href="#"><img
                            src="{{ url('web/images/left1.jpg') }}" alt="Left Banner" class="img-responsive"></a> </div>
                <div class="left-special left-sidebar-widget mb_50">
                    <div class="heading-part mb_10 ">
                        <h2 class="main_title">Sản phẩm bán chạy</h2>
                    </div>
                    <div id="left-special" class="owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 907px;">

                                <div class="owl-item" style="width: 226.656px;">
                                    <ul class="row ">
                                        @foreach ($sellingProducts as $item)
                                            <li class="item product-layout-left mb_20">
                                                <div class="product-list col-xs-4">
                                                    <div class="product-thumb">
                                                        <div class="image product-imageblock image_selling_product"> <a
                                                                href="product_detail_page.html"> <img class="img-responsive"
                                                                    title="iPod Classic" alt="iPod Classic"
                                                                    src="{{ $item->thumbnail }}"> <img
                                                                    class="img-responsive" title="iPod Classic"
                                                                    alt="iPod Classic" src="{{ $item->thumbnail }}"> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-8">
                                                    <div class="caption product-detail">
                                                        <h6 class="product-name"><a
                                                                href="#">{{ $item->product_name }}</a>
                                                        </h6>
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
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 mtb_20">
                <div class="row mt_10 ">
                    <div class="col-md-6">
                        @php
                            $images = explode(',', $product->images);
                        @endphp
                        <div class="exzoom" id="exzoom">
                            <!-- Images -->
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    <li><img src="{{ $product->thumbnail }}" /></li>
                                    @foreach ($images as $img)
                                        <li><img src="{{ $img }}" /></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                            <div class="exzoom_nav"></div>
                            <!-- Nav Buttons -->
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn">
                                    < </a>
                                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 prodetail caption product-thumb">
                        <h4 data-name="product_name" class="product-name"><a href="#"
                                title="Casual Shirt With Ruffle Hem">{{ $product->product_name }}</a></h4>
                        <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                    class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                    class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                    class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                    class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                    class="fa fa-star fa-stack-x"></i></span>
                        </div>

                        @if ($product->discount == null)
                            <span class="price mb_20">
                                {{ number_format($product->price) }}đ
                            </span>
                        @else
                            <span class="price mb_20">
                                <strike
                                    style="font-size: 14px;color: #969696;">{{ number_format($product->price) }}đ</strike>
                                {{ number_format($product->discount) }}đ
                            </span>
                        @endif
                        <hr>
                        <ul class="list-unstyled product_info mtb_20">
                            <li>
                                <label>Thương hiệu:</label>
                                <span> <a href="#">{{ $product->brand_name }}</a></span>
                            </li>
                            <li>
                                <label>Mã sản phẩm:</label>
                                <span> {{ $product->product_code }}</span>
                            </li>
                            <li>
                                <label>Số lượng:</label>
                                <span> {{ $product->quantity }}</span>
                            </li>
                        </ul>
                        <hr>
                        <p class="product-desc mtb_30">
                            {!! $product->short_description !!}
                        </p>
                        <hr>
                        <div id="product">
                            <div class="form-group">
                                <div class="row">
                                    <div class="Sort-by col-md-6">
                                        @php
                                            $size = explode(',', $product->size);
                                            $color = explode(',', $product->color);
                                            $price = $product->discount == null ? $product->price : $product->discount;
                                        @endphp
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                        <input type="hidden" value="{{ $product->id }}" id="product_id">
                                        <input type="hidden" value="{{ $product->product_name }}" id="product_name">
                                        <input type="hidden" value="{{ $price }}" id="price">
                                        <input type="hidden" value="{{ $product->thumbnail }}" id="thumbnail">
                                        <label>Size</label>
                                        <select name="product_size" id="size" class="selectpicker form-control">
                                            <option disabled selected>--Chọn size</option>
                                            @if (!empty($product->size))
                                                @foreach ($size as $s)
                                                    <option value="{{ $s }}">{{ $s }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="Color col-md-6">
                                        <label>Color</label>
                                        <select name="product_color" id="color" class="selectpicker form-control">
                                            <option disabled selected>--Chọn màu</option>
                                            @if (!empty($product->color))
                                                @foreach ($color as $c)
                                                    <option value="{{ $c }}">{{ $c }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="qty mt_30 form-group2">
                                <label>Qty</label><br>
                                <input name="product_quantity" id="qty" min="1" value="1" type="number">
                            </div>
                            <div class="button-group mt_30">
                                <button class="btn addToCart"><i class="fas fa-cart-plus"></i> Thêm giỏ hàng</button>
                                <button class="btn"><i class="fas fa-heart"></i> Yêu thích</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="exTab5" class="mtb_30">
                            <ul class="nav nav-tabs">
                                <li class="active"> <a href="#1c" data-toggle="tab" aria-expanded="true">Chi
                                        tiết</a> </li>
                                <li class=""><a href=" #2c" data-toggle="tab" aria-expanded="false">Đánh giá</a>
                                </li>
                            </ul>
                            <div class="tab-content ">
                                <div class="tab-pane active" id="1c">
                                    {!! $product->content !!}
                                </div>
                                <div class="tab-pane" id="2c">
                                    <form class="form-horizontal">
                                        <div id="review"></div>
                                        <h4 class="mt_20 mb_30">Write a review</h4>
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label class="control-label" for="input-name">Your Name</label>
                                                <input name="name" value="" id="input-name" class="form-control"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label class="control-label" for="input-review">Your Review</label>
                                                <textarea name="text" rows="5" id="input-review"
                                                    class="form-control"></textarea>
                                                <div class="help-block"><span class="text-danger">Note:</span> HTML
                                                    is not translated!</div>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="col-md-6">
                                                <label class="control-label">Rating</label>
                                                <div class="rates"><span>Bad</span>
                                                    <input name="rating" value="1" type="radio">
                                                    <input name="rating" value="2" type="radio">
                                                    <input name="rating" value="3" type="radio">
                                                    <input name="rating" value="4" type="radio">
                                                    <input name="rating" value="5" type="radio">
                                                    <span>Good</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="buttons pull-right">
                                                    <button type="submit" class="btn btn-md btn-link">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="3c">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis malesuada mi id
                                        tristique. Sed ipsum nisi, dapibus at faucibus non, dictum a diam. Nunc vitae
                                        interdum diam. Sed finibus, justo vel maximus facilisis, sapien turpis euismod
                                        tellus, vulputate semper diam ipsum vel tellus.applied clearfix to the tab-content
                                        to rid of the gap between the tab and the content</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('web.elements.brand')
    </div>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('web/css/jquery.exzoom.css') }}" />
@endsection

@section('script')
    <script src="{{ url('web/js/jquery.exzoom.js') }}"></script>
    <script src="{{ mix('js/web/product.js') }}"></script>

@endsection
