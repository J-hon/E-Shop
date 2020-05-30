@extends('main')

@section('title', '| Edit user profile')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Profile</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                Edit profile
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <br><br>

    <section class="edit-profile-area">
        <div class="container">

            <h3 class="text-center">Edit Profile</h3>

            <form action="{{ route('user.update', $user) }}" method="post">

                {{ csrf_field() }}

                {{ method_field('patch') }}

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Name: </label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Address: </label>
                        <input type="text" class="form-control" name="address" value="{{ $user->address }}" />
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Email: </label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" />
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Phone number: </label>
                        <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" />
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary update" type="submit">
                            <i class="fas fa-recycle"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
