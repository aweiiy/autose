<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Cars, ads, listings">
    <meta name="description" content="Autose is a digital marketplace for cars. Sell your car or find which one you like.">
    <meta name="author" content="Edvinas">
    <title>{{ config('app.name', 'Autose') }}</title>

<!-- Favicon -->
<link href="" rel="shortcut icon">
<!-- Bootstrap -->
<link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{ asset('bower_components/fontawesome/css/all.min.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/selector.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Owl Carousel -->
    <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">


</head>

<body class="body-wrapper">

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation" style="justify-content: space-between;">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        autose
                    </a>


                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

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
                                        <a class="nav-link login-button" href="{{ url('/mylistings') }}">My listings</a>
                            @endif
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="{{ url('/mylistings/create') }}"><svg class="svg-inline--fa fa-circle-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z"></path></svg><!-- <i class="fa fa-plus-circle"></i> Font Awesome fontawesome.com --> Add Listing</a>
                                </li>
                        </ul>

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
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('bower_components/fontawesome/js/all.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
</body>
@include('layouts.footer')
</html>
