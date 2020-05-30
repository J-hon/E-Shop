<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/animate.css-master/animate.css-master/animate.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/owlcarousel/assets/owl.carousel.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fonts/icomoon/style.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/aos.css') }}" type="text/css">

{{--Favicon--}}
<link rel="icon" href="{{ asset('/images/favicon.png') }}">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/aos.js') }}"></script>

<title>E-shop @yield('title')</title>
@yield('stylesheets')

<script type="text/javascript">
    $(function () {
        $(window).on('scroll', function () {
            if ( $(window).scrollTop() > 10 ) {
                $('.navbar').addClass('active');
            } else {
                $('.navbar').removeClass('active');
            }
        });
    });
</script>

<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand text-uppercase font-weight-bold">
                {{ __('UI E-shop') }}
            </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">
                <i class="fa fa-bars"></i>
            </button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form action="{{ route('search') }}" method="GET" class="header-search-form">
                            <input type="text" value="{{ request()->input('query') }}" name="query" placeholder="Search...">
                            <button>
                                <i class="flaticon-search"></i>
                            </button>
                        </form>
                    </li>

                    <li class="nav-item">
                        <div class="user-panel">
                            <div class="up-item">
                                <a href="{{ route('favorites') }}">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="user-panel">
                            <div class="up-item">
                                <div class="shopping-card">
                                    <a href="{{ route('cart') }}">
                                        <i class="flaticon-bag"></i>
                                    </a>
                                    <span>{{ count((array) session('cart')) }}</span>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="user-panel">
                            <div class="up-item">
                                <a href="{{ route('merchant') }}">Sell here on UI E-shops</a>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">

                            @if(Auth::guard('web')->check())

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="flaticon-profile"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('user-profile') }}" class="dropdown-item">
                                        <i class="fas fa-user"></i> Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            @elseif(Auth::guard('admin')->check())
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="flaticon-profile"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('profile') }}" class="dropdown-item">
                                        <i class="fas fa-user"></i> Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @endif
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
