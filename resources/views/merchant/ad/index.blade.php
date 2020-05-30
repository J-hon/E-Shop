@extends('main')

@section('title', '| ads')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Ad</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                <a href="{{ route('merchant') }}">Merchant</a> /
                Ads
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <br><br>

    <section class="home-page-area">
        <div class="container">

            <div class="row justify-content-end">
                <a href="{{ route('ad.create') }}" target="_blank" class="btn btn-outline-success">
                    <i class="fas fa-cart-plus"></i>
                    Create ad
                </a>
            </div>

            <br><br>

            <div class="row">
                <div class="col-md-12">
                    <table id="cart" class="container table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:20%">Product</th>
                                <th style="width:50%">Name</th>
                                <th style="width:20%">Price</th>
                                <th style="width:5%">Edit</th>
                                <th style="width:5%">Delete</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($ads as $ad)
                                <tr>
                                    <td>
                                        <img src="{{ asset('/images/products/'.$ad->image) }}" style="border-radius: 50%" width="100" height="100" class="img-responsive"/>
                                    </td>

                                    <td>
                                        <h4>{{ $ad->name }}</h4>
                                    </td>

                                    <td>
                                        <h4>&#8358; {{ $ad->price }}</h4>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('ad.edit', $ad->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <form action="{{ route('ad.delete', $ad->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                    <div class="offset-5 text-center">
                        {!! $ads->links() !!}
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection
