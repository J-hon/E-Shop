@extends('main')

@section('title', '| Post ad')

@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Ad</h4>
            <div class="site-pagination">
                <a href="{{ route('welcome') }}">Home</a> /
                <a href="{{ route('merchant') }}">Merchant</a> /
                Post Ad
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <br><br>

    <section class="sell-area">
        <div class="container">
            <h3 class="text-center">Create Ad</h3>

            <form action="{{ route('ad.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-6">
                        <div class="sell-area-content">
                            <h5>Name of product</h5>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="sell-area-content">
                            <h5>Slug</h5>
                            <input type="text" class="form-control" name="slug">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="sell-area-content">
                            <h5>Description</h5>
                            <textarea name="description" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="sell-area-content">
                            <h5>Category</h5>
                            <select class="form-control" name="category_id">
                                <option selected>Choose a category for your item</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="sell-area-content col-md-12" style="padding-left: 13px;">
                        <h5>Photos for your ad</h5>
                        <p>Note: The first image will be the title image</p>
                    </div>

                    <div class="col-md-3">
                        <span id="preview"></span>
                        <label for="file-upload" class="custom-file-upload">
                            <input type="file" id="file-upload" name="image">
                            <i class="fa fa-cloud-upload-alt"></i> First Image
                        </label>
                    </div>

                    <div class="col-md-3">
                        <span id="preview"></span>
                        <label for="file-upload" class="custom-file-upload">
                            <input type="file" id="file-upload">
                            <i class="fa fa-cloud-upload-alt"></i> Second Image
                        </label>
                    </div>

                    <div class="col-md-3">
                        <span id="preview"></span>
                        <label for="file-upload" class="custom-file-upload">
                            <input type="file" id="file-upload">
                            <i class="fa fa-cloud-upload-alt"></i> Third Image
                        </label>
                    </div>

                    <div class="col-md-3">
                        <span id="preview"></span>
                        <label for="file-upload" class="custom-file-upload">
                            <input type="file" id="file-upload">
                            <i class="fa fa-cloud-upload-alt"></i> Fourth Image
                        </label>
                    </div>

                    <div class="col-lg-6">
                        <div class="sell-area-content">
                            <h5>Price</h5>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">&#8358;</div>
                                </div>
                                <input type="text" class="form-control" name="price" placeholder="Price">
                            </div>
                        </div>
                    </div>

                </div>
                <br>

                <h5 class="text-center"><b>Name:</b> {{ Auth::user()->name }}</h5>
                <h5 class="text-center"><b>Phone:</b> {{ Auth::user()->phone_number }}</h5>
                <h5 class="text-center"><b>Shop:</b> {{ Auth::user()->shop_name }}</h5>

                <br>

                <div class="text-center">
                    <button class="btn post-ad" type="submit">Create ad</button>
                    <br><br>
                </div>

            </form>
        </div>
    </section>

    <script type="text/javascript">

        let imagepreview = document.querySelector('#preview');
        let imageupload = document.querySelector('#file-upload');
        // let removeimg = document.querySelector('#remove');

        imageupload.addEventListener("change", function(e) {
            readURL(this, '#tempimage');
        });

        function readURL(input, element) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    imagepreview.innerHTML = "<img id='tempimage' src='' class='img-previewer'/>";
                    document.querySelector(element).setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection
