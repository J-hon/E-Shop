<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials._homepageheader')
</head>

<body>

    @include('partials._loader')

    @include('partials._back-to-top')

    @include('partials._messages')

    @yield('content')

    @include('partials._footer')

</body>

@include('partials._javascript')
