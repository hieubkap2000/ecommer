@extends('web.layout')
@section('title', 'Giỏ hàng')
@section('content')
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Giỏ hàng</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="active">Giỏ hàng</li>
                    </ul>
                </div>
            </div>
            <!-- =====  BREADCRUMB END===== -->
            <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">

                <div class="left_banner left-sidebar-widget mb_50 mt_30">
                    <a href="#">
                        <img src="{{ url('web/images/left1.jpg') }}" alt="Left Banner" class="img-responsive">
                    </a>
                </div>

            </div>

            <div class="col-sm-8 col-lg-9 mtb_20">
                @if (Session::has('message'))
                    @if (Session::get('message')['type'] == 'error')
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('message')['message'] }}
                        </div>
                    @else
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message')['message'] }}
                        </div>
                    @endif
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center">Hình ảnh</td>
                                <td class="text-center">Tên sản phẩm</td>
                                <td class="text-center">Giá</td>
                                <td class="text-center">Số lượng</td>
                                <td class="text-center">Màu sắc</td>
                                <td class="text-center">Size</td>
                                <td class="text-center">Tổng tiền</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cartContent as $key => $item)
                                <tr>
                                    <td class="text-center">
                                        <a href="#">
                                            <img src="{{ $item->options['thumbnail'] }}" alt="iPod Classic"
                                                title="iPod Classic" class="img_cart">
                                        </a>
                                    </td>
                                    <td class="text-left"><a href="product.html">{{ $item->name }}</a></td>
                                    <td class="text-left">{{ number_format($item->price) }}đ</td>
                                    <td class="text-left">
                                        <div style="max-width: 200px;" class="input-group btn-block">
                                            {{-- Form update quantity item cart --}}
                                            <span>
                                                <form action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
                                                    <input type="number" class="form-control quantity" size="1"
                                                        name="quantity" value="{{ $item->qty }}">
                                                    <input type="hidden" class="form-control" name="id_cart"
                                                        value="{{ $key }}">
                                                    <input type="hidden" class="form-control" name="id_product"
                                                        value="{{ $item->id }}">
                                                    <br>
                                                    <button class="btn btn_cart" title="Cập nhật">
                                                        <i class="fa fa-refresh"></i>
                                                    </button>
                                                </form>
                                            </span>
                                            {{-- Form delete item cart --}}
                                            <span>
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" class="form-control" name="id_cart"
                                                        value="{{ $key }}">
                                                    <input type="hidden" class="form-control" name="id_product"
                                                        value="{{ $item->id }}">
                                                    <button class="btn btn-danger btn_cart" title="Xóa sản phẩm">
                                                        <i class="fa fa-times-circle"></i>
                                                    </button>
                                                </form>
                                                <div>
                                                    {{-- End form --}}
                                            </span>
                                    </td>
                                    <td class="text-center">{{ $item->options['color'] }}</td>
                                    <td class="text-center">{{ $item->options['size'] }}</td>
                                    <td class="text-center">{{ number_format($item->qty * $item->price) }}đ</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{-- <div class="col-sm-4 col-sm-offset-8" style="margin-bottom: 10px">
                        <form action="{{ route('cart.applyCoupon') }}" method="post">
                            <div class="input-group">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                <input type="text" class="form-control" id="input-coupon"
                                    placeholder="Nhập mã giảm giá..." value="" name="discount_code">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn" id="button-coupon">Áp Dụng</button>
                                </span>
                            </div>
                        </form>
                        </table>
                    </div> --}}
                    <div class="col-sm-4 col-sm-offset-8">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-right"><strong>Tổng tiền sản phẩm:</strong></td>
                                    <td class="text-right">{{ Cart::subtotal() }}đ</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Thuế(1%):</strong></td>
                                    <td class="text-right">{{ Cart::tax() }}đ</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Tổng tiền:</strong></td>
                                    <td class="text-right">{{ Cart::total() }}đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="checkout.html">
                    <input class="btn pull-right mt_30" type="submit" value="Checkout">
                </form>
            </div>
        </div>
        @include('web.elements.brand')
    </div>

@endsection

@section('script')
    <script src="{{ url('web/js/jquery.exzoom.js') }}"></script>
    <script src="{{ mix('js/web/product.js') }}"></script>
@endsection
