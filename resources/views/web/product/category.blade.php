@extends('web.layout')
@section('title', $category->category_name)
@section('content')
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>{{ $category->category_name }}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ </a></li>
                        <li class="active">{{ $category->category_name }}</li>
                    </ul>
                </div>
            </div>
            <!-- =====  BREADCRUMB END===== -->
            <div id="column-left" class="col-sm-4 col-lg-3 ">
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
                <div class="category-page-wrapper mb_30">
                    <div class="list-grid-wrapper pull-left">
                        <div class="btn-group btn-list-grid">
                            <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                            <button type="button" id="list-view" class="btn btn-default list-view"></button>
                        </div>
                    </div>
                    <div class="page-wrapper pull-right">
                        <label class="control-label" for="input-limit">Lọc giá :</label>
                        <div class="limit">
                            <select id="input-limit" class="form-control">
                                <option value="8" selected="selected">Cao - Thấp</option>
                                <option value="25">Thấp - Cao</option>
                            </select>
                        </div>
                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="row">
                    @foreach ($productOfCategory as $item)
                        <div class="product-layout product-grid col-md-4 col-sm-6 col-xs-12">
                            <div class="item">
                                <div class="product-thumb clearfix mb_30">
                                    <div class="image product-imageblock">
                                        <a href="{{ route('web.product.details', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                             <img
                                                data-name="product_image" src="{{ $item->thumbnail }}" alt="{{ $item->product_name }}"
                                                title="{{ $item->product_name }}" class="img-responsive">
                                                <img
                                                src="{{ $item->thumbnail }}" alt="{{ $item->product_name }}" title="{{ $item->product_name }}"
                                                class="img-responsive">
                                            </a>
                                        <div class="button-group text-center">
                                            <div class="wishlist"><a href="#"><span>Yêu thích</span></a></div>
                                            <div class="quickview"><a href="{{ route('web.product.details', ['slug' => $item->slug, 'id' => $item->id]) }}"><span>Xem chi tiết</span></a></div>
                                        </div>
                                    </div>
                                    <div class="caption product-detail text-center">
                                        <h6 data-name="product_name" class="product-name mt_20">
                                            <a href="{{ route('web.product.details', ['slug' => $item->slug, 'id' => $item->id]) }}"
                                                title="{{ $item->product_name }}">{{ $item->product_name }}
                                            </a>
                                        </h6>
                                        <div class="rating"> <span class="fa fa-stack"><i
                                                    class="fa fa-star-o fa-stack-1x"></i><i
                                                    class="fa fa-star fa-stack-1x"></i></span> <span
                                                class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                    class="fa fa-star fa-stack-1x"></i></span> <span
                                                class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                    class="fa fa-star fa-stack-1x"></i></span> <span
                                                class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                    class="fa fa-star fa-stack-1x"></i></span> <span
                                                class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                    class="fa fa-star fa-stack-x"></i></span> </div>
                                        @if ($item->discount == null)
                                            <span class="price">
                                                {{ number_format($item->price) }}đ
                                            </span>
                                        @else
                                            <span class="price">
                                                <strike
                                                    style="font-size: 14px;color: #969696;">{{ number_format($item->price) }}đ</strike>
                                                {{ number_format($item->discount) }}đ
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination-nav text-center mt_50">
                    <ul>
                        <li><a href="{{ $productOfCategory->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>
                        </li>

                        <li class="active"><a href="#">{{ $productOfCategory->currentPage() }}</a></li>

                        @if ($productOfCategory->lastPage() != $productOfCategory->currentPage())
                            <li><a href="#">{{ $productOfCategory->lastPage() }}</a></li>
                        @endif

                        <li><a href="{{ $productOfCategory->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        @include('web.elements.brand')
    </div>
@endsection
