@extends('main')

@section('title', '| Contact Us')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Contact Us</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                <a>Contact</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <!-- Contact section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 contact-info">
                    <h3>Get in touch</h3>
                    <p><i class="fas fa-home"></i> Computer Science, University of Ibadan</p>
                    <p><i class="fas fa-phone"></i> +234 816 5544 525</p>
                    <p><i class="fas fa-envelope"></i> uieshop1@gmail.com</p>

                    <div class="contact-social">
                        <a href="https://www.intsagram.com" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="" class="google-plus"><i class="fab fa-google-plus-g"></i></a>
                        <a href="https://www.facebook.com" class="facebook"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.twitter.com" class="twitter"><i class="fab fa-twitter"></i></a>
                    </div>

                    <form class="contact-form">
                        <input type="text" placeholder="Your name">
                        <input type="text" placeholder="Your e-mail">
                        <input type="text" placeholder="Subject">
                        <textarea placeholder="Message"></textarea>
                        <div class="text-center pt-5">
                            <a href="#" class="load-more">Send now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="contact-img"><img src="/images/Customer-Care.png" alt=""></div>
    </section>
    <!-- Contact section end -->

@endsection
