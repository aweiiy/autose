<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="library, books, writers">
    <meta name="description" content="In this library you can find many new and old books.">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Library') }}</title>

<!-- Favicon -->
<link href="" rel="shortcut icon">
<!-- Bootstrap -->
<link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{ asset('bower_components/fontawesome/css/all.min.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="body-wrapper">

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        autose
                    </a>

                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto main-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav float-right">

                            @if(!\App\Models\User::logged())
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="{{ url('/login') }}">Login</a>
                                </li>
                            @endif
                            @if( \App\Models\User::logged() )
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="{{ url('/logout') }}">Logout</a>
                                </li>
                                    <li class="nav-item">
                                        <a class="nav-link login-button" href="/listings">My listings</a>
                            @endif
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="/listings/create"><svg class="svg-inline--fa fa-circle-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z"></path></svg><!-- <i class="fa fa-plus-circle"></i> Font Awesome fontawesome.com --> Add Listing</a>
                                </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
@yield('banner')
@yield('search')

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(\App\Models\User::logged())
                <tbody>
                <tr>
                    <td>Name: {{\App\Models\User::data()->name}}</td>
                    <br>
                    <td>Email: {{\App\Models\User::data()->email}}</td>
                    <br>
                </tr>
                </tbody>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</section>


<!-- JavaScripts -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('bower_components/fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
