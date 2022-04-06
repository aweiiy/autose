@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <div class="mt-3">
                            <div id="profile-container">
                                @if(is_null($user->image))
                                    <img src="{{ asset('images/default-profile.jpg') }}" alt="{{ $user->name }}" class="rounded-circle" style="width:100px; height:100px; object-fit:cover;" id="profile-image">
                                @else
                                <img src="{{url('profile_images', $user->image)}}" alt="{{ $user->name }}" class="rounded-circle" style="width:100px; height:100px; object-fit:cover;">
                                @endif
                            </div>
                            <h3 class="text-dark font-weight-normal">{{ $user->name }}</h3>
                            <p class="text-secondary mb-1"><i class="fa-solid fa-phone"></i> {{$user->phone_number}}</p>
                            <p class="text-muted font-size-sm"><i class="fa-solid fa-at"></i> {{$user->email}}</p>
                            <a class="btn btn-success btn-lg w-100 mb-3" href="{{ url('/mylistings/create') }}"><i class="fa fa-plus-circle"></i> Add listing</a>
                        </div>
                    </div>
                    <hr class="my-4">
                    <!--- Profile Menu -->
                    <ul id="profile_menu" class="list-group list-group-flush collapse dont-collapse-sm">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <a href="{{ url('/profile') }}" class="text-dark"><i class="fa-solid fa-user"></i> Personal info</a>
                            </h6>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <a href="{{ url('/profile/change-password') }}" class="text-dark"><i class="fa-solid fa-lock"></i> Account management</a>
                            </h6>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <a href="{{ url('/mylistings') }}" class="text-dark"><i class="fa-solid fa-car"></i> My Listings</a>
                            </h6>
                            <span>{{$user->car_listing->count()}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <a href="{{ url('/wishlist') }}" class="text-dark"><i class="fa-solid fa-heart"></i> Wishlist</a>
                            </h6>
                            <span>{{$user->wishlist->count()}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <a href="{{ url('/logout') }}" class="text-dark"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                            </h6>
                        </li>
                    </ul>
                    <div>
                        <button class="btn btn-outline-secondary d-md-none mt-1 menuToggle" type="button" data-bs-toggle="collapse" data-bs-target="#profile_menu" aria-expanded="false" aria-controls="multiCollapseExample2">Show menu</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    @yield('content-profile')
                </div>
            </div>
        </div>
    </div>

@endsection
@push('javascript')

@endpush
@push('css')
    <style>
        a:link { text-decoration: none; }


        a:visited { text-decoration: none; }


        a:hover { text-decoration: none; }


        a:active { text-decoration: none; }
    </style>
        <style>
            @media (min-width: 768px) {
                .collapse.dont-collapse-sm {
                    display: block;
                    height: auto !important;
                    visibility: visible;
                }
            }
        </style>
@endpush
