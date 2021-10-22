@extends('web.layout')
@section('title', 'Đăng nhập')
@section('content')
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Đăng nhập</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="active">Đăng nhập</li>
                    </ul>
                </div>
            </div>
            <!-- =====  BREADCRUMB END===== -->
            <div id="column-left" class="col-sm-4 col-lg-2 hidden-xs" style="background-color: #1A1A1A">

                <div class="left_banner left-sidebar-widget mt_30 mb_40 menu_customer">

                    <ul>
                        <li><a href="">Xem thông tin</a></li>
                        <li><a href="">Đổi mật khẩu</a></li>
                        <li><a href="">Cập nhật thông tin</a></li>
                        <li><a href="">Thông tin đơn hàng</a></li>
                        <li><a href="">Lịch sử mua hàng</a></li>
                        <li><a href="">Sản phẩm yêu thích</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-8 col-lg-10 mb_20">
                <!-- contact  -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel-login panel">
                            <div class="panel-heading">
                                <div class="row mb_20">
                                    <div class="col-xs-12">
                                        <h4>Đăng nhập</h4>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="login-form">
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                            <div class="form-group">
                                                <input type="text" id="username" tabindex="1" class="form-control"
                                                    placeholder="Nhập tên tài khoản...">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="password" tabindex="2" class="form-control"
                                                    placeholder="Nhập mật khẩu...">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <button id="save" tabindex="4"
                                                            class="form-control btn btn-login">Đăng nhập</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <a href="{{ route('customer.forgotPassword') }}" tabindex="5"
                                                                class="forgot-password">Quên mật
                                                                khẩu?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <a href="{{ route('customer.register') }}" tabindex="5">Bạn
                                                                chưa có tài khoản?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ mix('js/web/login.js') }}"></script> --}}
@endsection
