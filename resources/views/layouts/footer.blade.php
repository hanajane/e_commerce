<footer class="light-footer">
    <div class="widget-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 widget">
                    <div class="widget-title">
                        <h4>About Us</h4>
                    </div>
                        <div class="link-widget">
                            <div class="info">
                                <a href="#x">Beachy Bodies</a>
                            </div>
                            <div class="info">
                                <a href="#x">Online Help</a>
                            </div>
                            <div class="info">
                                <a href="#x">Order Status</a>
                            </div>
                            <div class="info">
                                <a href="#x">Contact Us</a>
                            </div>
                        </div>
                </div>
                <div class="col-sm-2 widget">
                    <div class="widget-title">
                        <h4>Quick Shop</h4>
                    </div>
                    <div class="link-widget">
                        <div class="info">
                            <a href="{{route('allProducts')}}">Shop All</a>
                        </div>
                        <div class="info">
                            <a href="{{route('swimwearProducts')}}">Swimwear</a>
                        </div>
                        <div class="info">
                            <a href="{{route('coverUpProducts')}}">Cover ups</a>
                        </div>
                        <div class="info">
                            <a href="{{route('accessoryProducts')}}">Accessories</a>
                        </div>
                        <div class="info">
                            <a style="color:red; font-weight:bolder" href="#">SALE</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 widget">
                    <div class="widget-title">
                        <h4>Policies</h4>
                    </div>
                    <div class="link-widget">
                        <div class="info">
                            <a href="">Terms of Us</a>
                        </div>
                        <div class="info">
                            <a href="">Privacy Policy</a>
                        </div>
                        <div class="info">
                            <a href="">Refund Policy</a>
                        </div>
                        <div class="info">
                            <a href="">ARefund Policy</a>
                        </div>
                        <div class="info">
                            <a href="#">Billing System</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 widget">
                    <div class="widget-title">
                        <h4>Our Programs</h4>
                    </div>
                    <div class="link-widget">
                        <div class="info">
                            <a href="">Ambassador Program</a>
                        </div>
                        <div class="info">
                            <a href="">Affillate Program</a>
                        </div>
                        <div class="info">
                            <a href="">Careers</a>
                        </div>
                        <div class="info">
                            <a href="">ARefund Policy</a>
                        </div>
                        <div class="info">
                            <a href="#">Billing System</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Get in Touch</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form><br />
                    <div class="contact-widget">
                        <div class="info">
                            <p><i class="lnr lnr-map-marker"></i><span>Montreal, Canada.</span></p>
                        </div>
                        <div class="info">
                            <a href="tel:+5145186830"><i class="lnr lnr-phone-handset"></i><span>514 518 6830</span></a>
                        </div>
                        <div class="info">
                            <a href="mailto:bodiesbeachy@gmail.com"><i class="lnr lnr-envelope"></i><span>beachybodies@gmail.com</span></a>
                        </div>
                        <div class="info">
                            <p class="social pull-left">
                                <a class="no-margin" href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </p>
                        </div>
                    </div><!-- / contact-widget -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="footer-info">
        <div class="container">
                <div class="pull-left">
                    <p><?php echo date("Y"); ?> - <strong>Beachy Bodies</strong></p>
                </div>
                <span class="pull-right">
                    <img src="{{asset('images/icons/visa.png')}}" alt="">
                    <img src="{{asset('images/icons/mastercard.png')}}" alt="">
                    <img src="{{asset('images/icons/paypal.png')}}" alt="">
                </span>
        </div><!-- / container -->
    </div><!-- / footer-info -->
</footer><!--/Footer-->



<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js/price-range.js')}}"></script>
<script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/scrolling-nav.js')}}"></script>
<script src="{{asset('js/preloader.js')}}"></script>
</body>
</html>