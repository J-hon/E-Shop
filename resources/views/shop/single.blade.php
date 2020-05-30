@extends('main')

@section('title', '| '. $product->name)

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>{{ $product->name }}</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                <a href="{{ route('shop') }}">Shop</a> /
                {{ $product->name }}
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <section class="product-content">
        <div class="container">
            <div class="back-link">
                <a href="{{ route('shop') }}"> &lt;&lt; Back to Shop</a>
            </div>

            <div class="row">
                <div class="col-lg-6 product-pic">
                    <img src="{{ asset('/images/products/'.$product->image) }}" alt="{{ $product->image }}">
                </div>

                <div class="col-lg-6 product-details">
                    <h1 class="p-title">{{ $product->name }}</h1>
                    <h2>&#8358;{{ $product->price }}</h2>
                    <br>
                    <div class="pi-links">
                        <a href="{{ url('/add-to-cart/'.$product->id) }}" class="btn btn-outline-primary">
                            <i class="flaticon-bag"></i>
                            <span>ADD TO BAG</span>
                        </a>

                        <form action="{{ route('favorites.store', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <button class="btn btn-outline-danger" type="submit">
                                <i class="flaticon-heart"></i>
                                <span>ADD TO FAVORITES</span>
                            </button>
                        </form>
                    </div>

                    <div id="accordion" class="accordion-area">
                        <div class="panel">
                            <div class="panel-header" id="headingOne">
                                <div class="panel-link active" data-toggle="collapse" data-target="#collapse1"
                                        aria-expanded="true" aria-controls="collapse1" style="padding-top: 30px">information
                                </div>
                            </div>
                            <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="panel-body">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-header" id="headingThree">
                                <div class="panel-link" data-toggle="collapse" data-target="#collapse3"
                                        aria-expanded="false" aria-controls="collapse3" style="padding-top: 30px">shipping & Returns
                                </div>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="panel-body">
                                    <h4>7 Days Returns</h4>
                                    <p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales.
                                        Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur
                                        lacus leo, non scelerisque nulla euismod nec.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="social-sharing">
                        <a href="" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="" class="google-plus"><i class="fab fa-google-plus-g"></i></a>
                        <a href="" class="facebook"><i class="fab fa-facebook"></i></a>
                        <a href="" class="twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

{{--            <div class="row">--}}
{{--                <div class="col-12 show-number text-center">--}}
{{--                    <h3 id="phone">08165544525</h3>--}}
{{--                    <button id="number" class="btn btn-outline-dark number">Show phone</button>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>

{{--    REVIEWS AND RATINGS--}}

{{--    <section class="review-product-section">--}}
{{--        <div class="container">--}}
{{--            <form action="#" method="POST">--}}

{{--                <div class="row" style="margin-bottom: 40px">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <input type="text" class="form-control review-input" placeholder="Name">--}}
{{--                    </div>--}}

{{--                    <div class="col-md-6">--}}
{{--                        <input type="text" class="form-control review-input" placeholder="E-mail">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <textarea name="" id="" cols="30" rows="10" class="form-control review-input" placeholder="Comment"></textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="col-md-12" style="margin-top: 20px">--}}
{{--                        <input type="submit" class="btn btn-outline-dark">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </form>--}}
{{--        </div>--}}
{{--    </section>--}}


    <!-- RELATED PRODUCTS section -->
    <section class="related-product-section">
        <div class="container">
            <div class="section-title">
                <h2>Related products</h2>
            </div>

            <div class="row">

{{--                @foreach($p as $ps)--}}

{{--                    {{ $ps->product_id }}--}}

{{--                @endforeach--}}

                @foreach($similarProducts as $similar)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <figure class="image">
                                    <a href="{{ route('show', $similar->category_id) }}">
                                        <img src="{{ asset('/images/products/'.$similar->image) }}" alt="" class="img-fluid">
                                    </a>
                                </figure>
                                <div class="pi-links">
                                    <a href="{{ url('/add-to-cart/'.$similar->id) }}" class="add-card">
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
                                <h6>&#8358;{{ $similar->price }}</h6>
                                <p>{{ $similar->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

{{--            <div class="text-center pt-5">--}}
{{--                <a href="{{ route('shop') }}" class="load-more">See More</a>--}}
{{--            </div>--}}
        </div>
    </section>
    <!-- Product filter section end -->

{{--    <script type="text/javascript">--}}
{{--        $("#number").click(function () {--}}
{{--            $("#phone").toggle();--}}
{{--            console.log(document.getElementById('number').innerText);--}}
{{--            document.getElementById('number').innerText = 'Hide Phone';--}}
{{--        });--}}
{{--    </script>--}}

@endsection
