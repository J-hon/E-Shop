@extends('main')

@section('title', '| Edit ad')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Profile</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                <a href="{{ route('merchant') }}">Merchant</a> /
                <a href="{{ route('ad') }}">Ad</a> /
                Edit Ad
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <br><br>

    <section class="edit-profile-area">
        <div class="container">

            <h3 class="text-center">Edit {{ $ad->name }}</h3>

            <form action="{{ route('ad.update', $ad) }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Product name: </label>
                        <input type="text" class="form-control" name="name" value="{{ $ad->name }}" />
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Slug: </label>
                        <input type="text" class="form-control" name="slug" value="{{ $ad->slug }}" />
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="sell-area-content">
                            <h5>Category</h5>
                            <select class="form-control" name="category_id" id="category_id">
                                <option selected disabled>{{ $ad_category->name }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Image: </label>
                        <img src="{{ asset('/images/products/'.$ad->image) }}" alt="" style="border-radius: 5px">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Description: </label>
                        <textarea name="description" cols="30" rows="5" class="form-control">
                            {{ $ad->description }}
                        </textarea>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Price: </label>
                        <input type="text" class="form-control" value="&#8358;{{ $ad->price }}">
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
