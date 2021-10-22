<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <!-- =====  BASIC PAGE NEEDS  ===== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- =====  SEO MATE  ===== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="2 Days">
    <meta name="robots" content="ALL">
    <meta name="rating" content="8 YEARS">
    <meta name="Language" content="en-us">
    <meta name="GOOGLEBOT" content="NOARCHIVE">
    <!-- =====  MOBILE SPECIFICATION  ===== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width">
    <!-- =====  CSS  ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ url('web/css/font-awesome.min.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ url('web/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('web/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('web/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('web/css/owl.carousel.css') }}">
    <link rel="shortcut icon" href="{{ url('web/images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ url('web/images/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('web/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('web/images/apple-touch-icon-114x114.png') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('web/css/style2.css') }}">

    @yield('css')
</head>

<body>
    <!-- =====  LODER  ===== -->
    <div class="loder"></div>
    <div class="wrapper">
        <div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
            <div class="newsletter-popup"> <img class="offer" src="{{ url('web/images/newsbg.jpg') }}"
                    alt="offer">
                <div class="newsletter-popup-static newsletter-popup-top">
                    <div class="popup-text">
                        <div class="popup-title">50% <span>off</span></div>
                        <div class="popup-desc">
                            <div>Sign up and get 50% off your next Order</div>
                        </div>
                    </div>
                    <form onsubmit="return  validatpopupemail();" method="post">
                        <div class="form-group required">
                            <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email"
                                class="form-control input-lg" required />
                            <button type="submit" class="btn btn-default btn-lg"
                                id="email-popup-submit">Subscribe</button>
                            <label class="checkme">
                                <input type="checkbox" value="" id="checkme" /> Dont show again</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =====  HEADER START  ===== -->
        <header id="header">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="header-top-left">
                                <div class="contact"><a href="#">Call now !</a> <span
                                        class="hidden-xs hidden-sm hidden-md">+91 987-654-321</span></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <ul class="header-top-right text-right">
                                @if (auth('customers')->check())
                                    <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            role="button">{{ auth('customers')->user()->customer_name }} <span
                                                class="caret"></span> </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="{{ route('customer') }}">Tài khoản</a></li>
                                            <li><a href="#">Yêu thích</a></li>
                                            <li><a href="{{ route('customer.logout') }}">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="account"><a href="{{ route('customer.login') }}">Đăng nhập</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('web.layouts.header')
        </header>
        <!-- =====  HEADER END  ===== -->
        @yield('content')
        <!-- =====  FOOTER START  ===== -->
        @include('web.layouts.footer')
        <!-- =====  FOOTER END  ===== -->
    </div>
    <a id="scrollup"></a>
    <script src="{{ url('web/js/jQuery_v3.1.1.min.js') }}"></script>
    <script src="{{ url('web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('web/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('web/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ url('web/js/jquery.firstVisitPopup.js') }}"></script>
    <script src="{{ url('web/js/custom.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ mix('js/web/main.js') }}"></script>
    <script src="{{ mix('js/web/cart.js') }}"></script>
    @yield('script')
</body>

</html>
