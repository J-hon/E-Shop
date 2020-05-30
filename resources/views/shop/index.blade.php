@extends('main')

@section('title', '| shop')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Shop Page</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                <a href="{{ route('shop') }}"> Shop</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <!-- Category section -->
    <section class="category-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="filter-widget">
                        <h2 class="fw-title">Categories</h2>
                        <ul class="category-menu">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('category', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row">

                        @forelse ($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <figure class="image">
                                            <a href="{{ route('show', $product->slug) }}" target="_blank">
                                                <img src="{{ asset('/images/products/'.$product->image) }}" alt="" class="img-fluid">
                                            </a>
                                        </figure>

                                        <div class="pi-links">
                                            <a href="{{ url('/add-to-cart/'.$product->id) }}" class="add-card">
                                                <i class="flaticon-bag"></i>
                                                <span>
                                                    ADD TO BAG
                                                </span>
                                            </a>
                                            <a href="#" class="add-card">
                                                <i class="flaticon-heart"></i>
                                                <span>
                                                    ADD TO FAVORITES
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="pi-text">
                                        <h6>&#8358;{{ $product->price }}</h6>
                                        <p>{{ $product->name }}</p>
                                    </div>
                                </div>
                            </div>

                            @empty
                                <div>No items found</div>

                        @endforelse

                    </div>

                    <div class="offset-5 text-center">
                        {!! $products->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Category section end -->

@endsection
