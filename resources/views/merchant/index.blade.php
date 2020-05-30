@extends('main')

@section('title', '| merchant')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Sell</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                Merchant
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <br><br>

    <section class="home-page-area">
        <div class="container">

{{--            <div class="row justify-content-end">--}}
{{--                <a href="{{ route('admin.logout') }}" class="btn btn-outline-danger">--}}
{{--                    <i class="fas fa-sign-out-alt"></i>--}}
{{--                    Logout--}}
{{--                </a>--}}
{{--            </div>--}}

            <br>

            <div class="text-center">
                <h1>Welcome back, {{ Auth::user()->name }}</h1>
            </div>

            <br><br>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header">Ads</h5>
                        <div class="card-body">
                            <h5 class="card-title">Post new ads</h5>
                            <p class="card-text">
                                Make several changes to your ad. Also, post new ones.
                                You may have run out of stock for a particular product so deleting is also allowed.
                            </p>
                            <a href="{{ route('ad') }}" class="btn btn-primary">Ads</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header">Profile</h5>
                        <div class="card-body">
                            <h5 class="card-title">Edit or deactivate your account</h5>
                            <p class="card-text">
                                Make several changes to your profile.
                                You might also wish to deactivate your account Why would anyone wanna do that though? LOL.
                            </p>
                            <a href="{{ route('profile') }}" class="btn btn-primary">
                                <i class="fas fa-user"></i> Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
