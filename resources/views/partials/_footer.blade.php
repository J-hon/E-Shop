<!-- Back to top button -->
<a id="button"></a>

<!-- Footer section -->
<section class="footer-section">
    <div class="container">
        <div class="footer-logo text-center">
            <a href=#"><img src="/images/logo-light.png" alt=""></a>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget about-widget">
                    <h2>About</h2>
                    <p>
                        UI E-shops is a platform for students that aims to ease buying and selling within the campus.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget about-widget">
                    <h2>Hot links</h2>
                    <ul>
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="{{ route('merchant') }}">Merchant</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget about-widget">
                    <h2>Support us</h2>
                    <ul>
                        <li><a href="mailto:info.uieshop1@gmail.com">Support@UI E-shops</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget contact-widget">
                    <h2>Questions</h2>
                    <div class="con-info">
                        <span><i class="fas fa-map-marker-alt"></i></span>
                        <p>Computer Science Dept. University of Ibadan, Ibadan. </p>
                    </div>
                    <div class="con-info">
                        <span><i class="fa fa-phone"></i></span>
                        <p>+234 816 5544 525</p>
                    </div>
                    <div class="con-info">
                        <span><i class="fas fa-envelope-open-text"></i></span>
                        {{--<p><a href="mailto:info.jonadify007@gmail.com">jonadify007@gmail.com</a></p>--}}
                        <p>uieshops1@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="social-links-warp text-center">
        <div class="container">
            <div class="social-links">
                <a href="" class="instagram"><i class="fab fa-instagram"></i><span>Instagram</span></a>
                <a href="" class="google-plus"><i class="fab fa-google-plus-g"></i><span>G+plus</span></a>
                <a href="" class="facebook"><i class="fab fa-facebook"></i><span>Facebook</span></a>
                <a href="" class="twitter"><i class="fab fa-twitter"></i><span>Twitter</span></a>
            </div>

            <p class="text-white text-center mt-5">&copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                UI E-shops
            </p>
        </div>
    </div>
</section>
<!-- Footer section end -->
