{{--Default bootstrap navbar--}}

<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
    <a class="navbar-brand" href="/">E-Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : ''}}">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item {{ Request::is('about') ? 'active' : ''}}">
                <a class="nav-link" href="/about">About</a>
            </li>

            <li class="nav-item {{ Request::is('contact') ? 'active' : ''}}">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

            @if(Auth::check())

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{--<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>--}}
                        {{--<a class="dropdown-item" href="{{ route('personal.index') }}">Edit profile</a>--}}
                    </div>
                </li>

            @else

                {{--<a href="{{ route('login') }}" class="btn btn-light">Login</a>--}}
                {{--<a href="{{ route('register') }}" class="btn btn-light">Register</a>--}}

            @endif
        </ul>
    </div>
</nav>
