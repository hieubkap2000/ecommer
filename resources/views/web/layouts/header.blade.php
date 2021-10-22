<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="main-search mt_40">
                    <input id="search-input" name="search" value="" placeholder="Search" class="form-control input-lg"
                        autocomplete="off" type="text">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
            <div class="navbar-header col-xs-6 col-sm-4"> <a class="navbar-brand" href="{{ route('home') }}"> <img
                        alt="OYEENok" src="{{ url('web/images/logo.png') }}"> </a> </div>
            <div class="col-xs-6 col-sm-4 shopcart">
                <div id="cart" class="btn-group btn-block mtb_40">
                    <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse"
                        aria-expanded="true"><span id="shippingcart">Giỏ hàng</span>
                        <span id="cart-total">Số lượng
                            (<span id="cart_quantity">{{ $quantity }}</span>)</span>
                    </button>
                </div>
                <div id="cart-dropdown" class="cart-menu collapse">
                    <ul>
                        <li>
                            <table class="table table-striped">
                                <tbody class="cart_content_header">

                                </tbody>
                            </table>
                        </li>
                        {{-- <li>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-right"><strong>Tổng tiền</strong></td>
                                        <td class="text-right subtotal_price"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </li> --}}
                        <li>
                            <button class="btn" onclick="viewCart()" style="width: 100%">Xem giỏ hàng</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="navbar">
            <p>Trang chủ</p>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span
                    class="i-bar"><i class="fa fa-bars"></i></span></button>
            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul id="menu" class="nav navbar-nav">
                    <li> <a href="{{ route('home') }}">Trang chủ</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm </a>
                        <ul class="dropdown-menu">
                            @foreach ($productCategory as $item)
                                <li>
                                    <a
                                        href="{{ route('web.productCategory', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                        {{ $item->category_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bài viết </a>
                        <ul class="dropdown-menu">
                            @foreach ($postCategory as $item)
                                <li>
                                    <a
                                        href="{{ route('web.postCategory', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                        {{ $item->category_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li> <a href="blog_page.html">Giới thiệu</a></li>
                    <li> <a href="about.html">Liên hệ</a></li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </nav>
    </div>
</div>
