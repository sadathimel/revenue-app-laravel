<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    @include('partials._head')
</head>
<body>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a class="burger-btn d-block d-xl-none" href="#"><i class="bi bi-justify fs-3"></i></a>
            </header>
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>

@include('partials._foot')
    {!! Toastr::message() !!}
</body>
</html>
