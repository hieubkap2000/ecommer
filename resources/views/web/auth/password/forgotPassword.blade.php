@extends('web.layout')
@section('title', 'Quên mật khẩu')
@section('content')
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Quên mật khẩu</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a href="{{ route('customer.login') }}">Đăng nhập</a></li>
                        <li class="active">Quên mật khẩu</li>
                    </ul>
                </div>
            </div>
            <!-- =====  BREADCRUMB END===== -->
            <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">

                <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#">
                        <img src="{{ url('web/images/left1.jpg') }}" alt="Left Banner" class="img-responsive"></a>
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 mtb_20">
                <!-- contact  -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel-login panel">
                            <div class="panel-heading">
                                <div class="row mb_20">
                                    <div class="col-xs-12">
                                        <h4>Quên mật khẩu</h4>
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
                                                <input type="text" id="email" tabindex="1" class="form-control"
                                                    placeholder="Nhập email của bạn...">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <button id="save" tabindex="4"
                                                            class="form-control btn btn-login">Xác nhận</button>
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
    <script src="{{ mix('js/web/forgotPassword.js') }}"></script>
@endsection
