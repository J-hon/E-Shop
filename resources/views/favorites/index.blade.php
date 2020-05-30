@extends('main')

@section('title', '| Favorites')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Favorites</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                <a href="{{ route('favorites') }}"> Favorites</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->
                    {{--Cart--}}
                    <div class="cart_section">
                        <div class="section_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="cart_container">
                                            <table id="cart" class="container table table-hover table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th style="width:50%">Product</th>
                                                        <th style="width:20%">Price</th>
                                                        <th style="width:15%">Move to cart</th>
                                                        <th style="width:15%">Remove</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                @if($favorites->isEmpty())
                                                    <h4>No products found!</h4>
                                                @else

                                                    @foreach($favorites as $favorite)

                                                        <tr>
                                                            <td data-th="Product">
                                                                <div class="row">
                                                                    <div class="col-sm-3 hidden-xs">
                                                                        <img src="{{ asset('/images/products/'.$favorite->product->image) }}" width="100" height="100" class="img-responsive"/>
                                                                    </div>

                                                                    <div class="col-sm-9">
                                                                        <h4 class="nomargin">{{ $favorite->product->name }}</h4>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td data-th="Price">&#8358;{{ $favorite->product->price }}</td>
                                                            <td class="actions">
                                                                <a style="color: black" href="{{ url('/add-to-cart/'.$favorite->product->id) }}" class="add-card text-center">
                                                                    <button class="move-to-cart">
                                                                        <span>MOVE TO BAG</span>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                            <td class="actions">
                                                                <form action="{{ route('favorites.delete', $favorite->id) }}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-outline-danger" type="submit">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--End cart--}}

@endsection
