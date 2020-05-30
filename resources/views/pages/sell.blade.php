@extends('main')

@section('title', '| Sell')

@section('content')

    <header class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 text-center text-lg-left">
                    <!-- logo -->
                    <a href="" class="site-logo">
                        <img src="/images/cards.png" alt="logo">
                    </a>
                </div>
                <div class="col-lg-6">
                    <form class="header-search-form">
                        <input type="text" placeholder="Search...">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
                <div class="col-lg-1 text-right">
                    <div class="up-item">
                        <a href="{{ route('pages.sell') }}" class="btn btn-outline-dark">Sell</a>
                    </div>
                </div>
                <div class="col-lg-3 text-right">
                    <div class="user-panel">
                        <div class="up-item">
                            <a href=""><i class="flaticon-profile"></i></a>
                        </div>
                        <div class="up-item">
                            <div class="shopping-card">
                                <a href=""><i class="flaticon-bag"></i></a>
                                <span>0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Sell</h4>
            <div class="site-pagination">
                <a href="{{ route('pages.welcome') }}">Home</a> /
                Sell
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <br><br>

    <section class="sell-area">
        <div class="container">
            <h3>Post Ad</h3>

            <form action="#" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sell-area-content">
                            <h5>Category</h5>
                            <select class="form-control" name="category" id="category">
                                <option>Choose a category for your item</option>
                            </select>
                        </div>
                    </div>

                    <div class="sell-area-content" style="padding-left: 13px;">
                        <h5>Photos for your ad</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" multiple=multiple accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"><i class="far fa-edit"></i></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(/images/image-icon.jpg);">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"><i class="far fa-edit"></i></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(/images/image-icon.jpg);">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"><i class="far fa-edit"></i></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(/images/image-icon.jpg);">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"><i class="far fa-edit"></i></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(/images/image-icon.jpg);">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="sell-area-content">
                            <h5>Title</h5>
                            <input type="text" name="" id="" class="form-control" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="sell-area-content">
                            <h5>Description</h5>
                            <textarea name="" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="sell-area-content">
                            <h5>Price</h5>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">#</div>
                                </div>
                                <input type="text" class="form-control" placeholder="Price">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label" for="gridCheck1">
                                            Negotiable
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>

    <section class="contact-area">
        <div class="container">
            <h3>Contact Info</h3>

            <h5><b>Name:</b> John</h5>
            <h5><b>Phone:</b> 09012713618</h5>
            <h5><b>School Residence:</b> Independence hall</h5>
        </div>
    </section>

    <div class="text-center">
        <button class="btn post-ad">Post ad</button>
        <br><br>
    </div>

    <script type="text/javascript">
        $("#imageUpload").change(function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
