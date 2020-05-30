@extends('main')

@section('title', '| Search')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Search Page</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                <a href=""> Search</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <div class="search-area">
        <div class="container">
            <h1>Search results</h1>
            <p>{{ $products->total() }} result(s) for '{{ request()->input('query') }}'</p>

            <div class="col-lg-12 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row">

                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <figure class="image">
                                        <a href="{{ route('show', $product->slug) }}">
                                            <img src="{{ asset('/images/products/'.$product->image) }}" alt="" class="img-fluid">
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
            </div>
            <br>

            <div class="offset-6 text-center">
                {{ $products->appends(request()->input())->links() }}
            </div>

            <br>
        </div>
    </div>
@endsection
