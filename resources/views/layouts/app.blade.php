<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Cars, ads, listings">
    <meta name="description" content="Autose is a digital marketplace for cars. Sell your car or find which one you like.">
    <meta name="author" content="Edvinas">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Autose') }}</title>
<!-- Favicon -->
<link href="" rel="shortcut icon">
<!-- Bootstrap -->
<link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"

    <!-- Font Awesome -->
<link href="{{ asset('bower_components/fontawesome/css/all.min.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!-- Jquery -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

@stack('css')

</head>
<body>
<section>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">Autose</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/listings">Listings</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-top: 5px; margin-right: 5px">
                        <a href="{{route('wishlist')}}" class="wishlist-btn"><i class="fas fa-heart fa-2x" style="color:black"></i></a>
                    </li>
                    @if(!\App\Models\User::logged())
                        <li class="nav-item">
                            <a class="nav-link login-button" href="{{ url('/login') }}">Login</a>
                        </li>
                    @endif
                    @if( \App\Models\User::logged() )
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                User
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item align-bottom" href="{{ url('/profile') }}">
                                        @if( is_null(\App\Models\User::data()->image) )
                                            <img src="{{ asset('images/default-profile.jpg') }}" class="rounded-circle" width="50" height="50" alt="{{\App\Models\User::data()->name}}">
                                        @else
                                            <img src="{{ asset('profile_images/'.\App\Models\User::data()->image) }}" class="rounded-circle" width="50" height="50" alt="{{\App\Models\User::data()->name}}">
                                        @endif
                                        {{\App\Models\User::data()->name}}
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                @if(\App\Models\User::admin())
                                <li><a class="dropdown-item" href="{{ url('/admin') }}">Admin panel</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ url('/mylistings') }}">My listings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-white add-button btn btn-success" href="{{ url('/mylistings/create') }}"><i class="fa fa-plus-circle"></i> Add Listing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
@yield('banner')
@yield('search')

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>
</section>


<!-- JavaScripts -->
<script src="{{ asset('bower_components/fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-validation/dist/jquery.validate.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/selector.js') }}"></script>
<script>
    $(document).on('click','.add_to_wishlist', function(e){
        e.preventDefault();
        console.log($(this).data('id'));
        var listing_id = $(this).data('id');
        var token="{{csrf_token()}}";
        var path="/add-to-wishlist";

        $.ajax({
            url:path,
            type: "POST",
            dataType: "JSON",
            data:{
                listing_id: listing_id,
                _token:token,
            },
            success:function (data){
                if(data['err']){
                    alert(data['err']);
                    $('#wishlist_'+listing_id).html('<i class="far fa-heart fa-2x"></i>')
                }else{
                    $('#wishlist_'+listing_id).removeClass('add_to_wishlist');
                    $('#wishlist_'+listing_id).toggleClass('remove_from_wishlist');
                    $('#wishlist_'+listing_id).html('<i class="fas fa-heart fa-2x"></i>')
                }
                if (data['count']){
                    $('#wishCounter').html('<span>('+data['count']+')</span>');
                }
            }
        })

    });
    $(document).on('click','.remove_from_wishlist', function(e){
        e.preventDefault();
        console.log($(this).data('id'));
        var listing_id = $(this).data('id');
        var token="{{csrf_token()}}";
        var path="/remove-from-wishlist";

        $.ajax({
            url:path,
            type: "POST",
            dataType: "JSON",
            data:{
                listing_id: listing_id,
                _token:token,
            },
            beforeSend:function (){
                //$('#wishlist_'+listing_id).html('<i class="fa fa-spinner fa-spin"></i>')
            },
            complete:function (){

            },
            success:function (data){
                if(data['err']){
                    alert(data['err']);
                    $('#wishlist_'+listing_id).html('<i class="fas fa-heart fa-2x"></i>')
                }else{
                    $('#wishlist_'+listing_id).removeClass('remove_from_wishlist');
                    $('#wishlist_'+listing_id).toggleClass('add_to_wishlist');
                    $('#wishlist_'+listing_id).html('<i class="far fa-heart fa-2x"></i>')
                }
                if (data['count']){
                    $('#wishCounter').html('<span>('+data['count']+')</span>');
                }
            }
        })

    })
</script>
@stack('javascript')
</body>
@include('layouts.footer')
</html>
