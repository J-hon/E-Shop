@extends('main')

@section('title', '| User Profile')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Profile</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                User Profile
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <br><br>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <section class="sell-area">
                <div class="container">
                    <h3 class="text-center">User Profile</h3>

                    <div class="sell-area-content">
                        <h5><strong>Name</strong>: {{ $user->name }}</h5>
                        <h5><strong>E-mail</strong>: {{ $user->email }}</h5>
                        <h5><strong>Address</strong>: {{ $user->address }}</h5>
                        <h5><strong>Contact</strong>: {{ $user->phone_number }}</h5>
                    </div>

                    <br>

                    <div class="text-center">

                        <form action="{{ route('delete-user-profile', $user->id) }}" method="POST">
                            @csrf

                            <a href="{{ route('user-edit-profile', $user->id) }}" class="btn btn-primary" style="margin-right: 20px">
                                <i class="fas fa-user"></i> Edit Profile
                            </a>

                            <button type="submit" class="btn btn-danger" style="margin-right: 20px">
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
                    <h3 class="text-center">Change password</h3>

                    <form action="{{ route('update-user-password', $user->id) }}" method="POST">
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
