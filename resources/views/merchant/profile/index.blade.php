@extends('main')

@section('title', '| Merchant Profile')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Profile</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                <a href="{{ route('merchant') }}">Merchant</a> /
                Profile
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <br><br>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <section class="profile-page-area">
                <div class="container">
                    <h3 class="text-center">Profile</h3>

                    <div class="sell-area-content">
                        <h5><strong>Name</strong>: {{ $admin->name }}</h5>
                        <h5><strong>E-mail</strong>: {{ $admin->email }}</h5>
                        <h5><strong>Shop name</strong>: {{ $admin->shop_name }}</h5>
                        <h5><strong>Contact</strong>: {{ $admin->phone_number }}</h5>
                    </div>

                    <br>

                    <div class="text-center">

                        <form action="{{ route('delete-profile', $admin->id) }}" method="POST">
                            @csrf

                            <a href="{{ route('edit-profile', $admin->id) }}" class="btn btn-primary" style="margin-right: 20px">
                                <i class="fas fa-user"></i> Edit Profile
                            </a>

                            <button type="submit" class="btn btn-danger" style="margin-right: 15px">
                                <i class="fas fa-trash"></i> Deactivate account
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-md-6 col-sm-12">
            <section class="profile-page-area">
                <div class="container">

                    <form action="{{ route('update-admin-password', $admin->id) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <label for="old_password">{{ __('Current password') }}</label>
                                <input type="password" class="form-control" name="old_password" required/>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="new_password">{{ __('New password') }}</label>
                                <input type="password" class="form-control" name="new_password" required/>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="password_confirm">{{ __('Confirm password') }}</label>
                                <input type="password" class="form-control" name="password_confirmation" required/>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-unlock"></i> Change password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

@endsection
