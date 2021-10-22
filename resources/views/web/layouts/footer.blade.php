<div class="footer pt_60">
    <div class="container">
        <div class="row">
            <div class="footer-top pb_60 mb_30">
                <div class="col-xs-12 col-sm-6">
                    <div class="footer-logo"> <a href="index.html"> <img
                                src="{{ url('web/images/footer-logo.png') }}" alt="OYEENok"> </a> </div>
                </div>
                <!-- =====  testimonial  ===== -->
                <div class="col-xs-12 col-sm-6">
                    <div class="Testimonial">
                        <div class="client owl-carousel">
                            <div class="item client-detail">
                                <div class="client-avatar"> <img alt="" src="{{ url('images/user1.jpg') }}"> </div>
                                <div class="client-title"><strong>joseph Lui</strong></div>
                                <div class="client-designation mb_10"> - php Developer</div>
                                <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem ipsum dolor sit
                                    amet, volumus oporteat his at sea in Rem ipsum dolor sit amet, sea in odio
                                    ..</p>
                            </div>
                            <div class="item client-detail">
                                <div class="client-avatar"> <img alt="" src="{{ url('images/user2.jpg') }}"> </div>
                                <div class="client-title"><strong>joseph Lui</strong></div>
                                <div class="client-designation mb_10"> - php Developer</div>
                                <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem ipsum dolor sit
                                    amet, volumus oporteat his at sea in Rem ipsum dolor sit amet, sea in odio
                                    ..</p>
                            </div>
                            <div class="item client-detail">
                                <div class="client-avatar"> <img alt="" src="{{ url('images/user3.jpg') }}"> </div>
                                <div class="client-title"><strong>joseph Lui</strong></div>
                                <div class="client-designation mb_10"> - php Developer</div>
                                <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem ipsum dolor sit
                                    amet, volumus oporteat his at sea in Rem ipsum dolor sit amet, sea in odio
                                    ..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =====  testimonial end ===== -->
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-md-3 footer-block">
                <h6 class="footer-title ptb_20">Information</h6>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Delivery Information</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div> --}}
            <div class="col-md-4 footer-block">
                <h6 class="footer-title ptb_20">Sản Phẩm</h6>
                <ul>
                    @foreach ($productCategory as $item)
                        <li>
                            <a href="{{ route('web.productCategory', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                {{ $item->category_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 footer-block">
                <h6 class="footer-title ptb_20">Bài viết</h6>
                <ul>
                    @foreach ($postCategory as $item)
                        <li>
                            <a href="{{ route('web.postCategory', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                {{ $item->category_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 footer-block">
                <h6 class="footer-title ptb_20">Contacts</h6>
                <ul>
                    <li>Warehouse & Offices, 12345 Street name, California USA</li>
                    <li>(+123) 456 789
                        <br> (+024) 666 888
                    </li>
                    <li>Contact@yourcompany.com</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom mt_60 ptb_20">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="social_icon">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="copyright-part text-center">@ 2017 All Rights Reserved OYEENok</div>
                </div>
                <div class="col-sm-4">
                    <div class="payment-icon text-right">
                        <ul>
                            <li><i class="fa fa-cc-paypal "></i></li>
                            <li><i class="fa fa-cc-visa"></i></li>
                            <li><i class="fa fa-cc-discover"></i></li>
                            <li><i class="fa fa-cc-mastercard"></i></li>
                            <li><i class="fa fa-cc-amex"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
