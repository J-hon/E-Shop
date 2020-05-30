@extends('homepagemain')

@section('title', '| Home')

@section('content')

    <div class="hero-image d-flex align-items-center justify-content-center">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hero-content">
                            <h1 class="animated zoomIn" style="animation-delay: 1s">Welcome to UI E-Shop</h1>
                            <p class="animated zoomIn" style="animation-delay: 2s">
                                Here, you can buy whatever you desire within the University of Ibadan within
                                the comfort of your environment no matter where you might be within the school environment.
                                Not only can you buy, you can also sell your wares and showcase your shop here.
                            </p>
                            <a href="{{ route('shop') }}" class="btn butt animated zoomIn" style="animation-delay: 3s">Shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="latest-products">
        <div class="container">
            <div class="section-title">
                <h2>Latest Products</h2>
            </div>

            <div class="product-slider owl-carousel">

                @foreach ($prods as $prod)
                    <div class="product-item">
                        <div class="pi-pic">
                            <figure class="image">
                                <a href="{{ route('show', $prod->slug) }}" target="_blank">
                                    <img src="{{ asset('images/products/'.$prod->image) }}" alt="" class="img-responsive">
                                </a>
                            </figure>
                            <div class="pi-links">
                                <a href="{{ url('/add-to-cart/'.$prod->id) }}" class="add-card">
                                    <i class="flaticon-bag"></i>
                                    <span>ADD TO BAG</span>
                                </a>
                                <a href="#" class="add-card">
                                    <i class="flaticon-heart"></i>
                                    <span>ADD TO FAVORITES</span>
                                </a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>&#8358;{{ $prod->price }}</h6>
                            <p>{{ $prod->name }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Product filter section -->
    <section class="product-filter-section">
        <div class="container">
            <div class="section-title">
                <h2>BROWSE TOP SELLING PRODUCTS</h2>
            </div>

            <ul class="product-filter-menu text-center">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('category', $category->id) }}" target="_blank">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="row">

                @foreach ($products as $product)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <figure class="image">
                                    <a href="{{ route('show', $product->slug) }}" target="_blank">
                                        <img src="{{ asset('images/products/'.$product->image) }}" alt="" class="img-fluid">
                                    </a>
                                </figure>
                                <div class="pi-links">
                                    <a href="{{ url('/add-to-cart/'.$product->id) }}" class="add-card">
                                        <i class="flaticon-bag"></i>
                                        <span>ADD TO BAG</span>
                                    </a>

                                    <a href="#" class="add-card">
                                        <i class="flaticon-heart"></i>
                                        <span>ADD TO FAVORITES</span>
                                    </a>

{{--                                    <form action="{{ route('favorites.store', $product->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" value="{{ $product->id }}" name="product_id">--}}
{{--                                        <button class="add-card" type="submit">--}}
{{--                                            <i class="flaticon-heart"></i>--}}
{{--                                            <span>ADD TO FAVORITES</span>--}}
{{--                                        </button>--}}
{{--                                    </form>--}}

{{--                                    <form action="{{ route('favorites.store', $product->id) }}" class="post">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" value="{{ $product->id }}" name="product_id">--}}
{{--                                        <button class="add-card" type="submit">--}}
{{--                                            <i class="flaticon-heart"></i>--}}
{{--                                            <span>ADD TO WISHLIST</span>--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
                                </div>
                            </div>
                            <div class="pi-text">
                                <h6>&#8358;{{ $product->price }}</h6>
                                <p>{{ $product->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center pt-5">
                <a href="{{ route('shop') }}" class="load-more">See More</a>
            </div>
        </div>
    </section>
    <!-- Product filter section end -->

    <div class="site-section site-section-sm site-blocks-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <i class="fas fa-truck fa-3x"></i>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Free Shipping</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <i class="fas fa-redo-alt fa-3x"></i>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Free Returns</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <i class="fas fa-question-circle fa-3x"></i>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Customer Support</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
