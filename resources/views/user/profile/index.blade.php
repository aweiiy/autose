@extends('layouts.profile')

@section('content-profile')
                    <div class="d-flex flex-column align-items-left text-left">
                        <div class="mt-3">
                            <h1>Personal Information</h1>
                        </div>
                    </div>
                    <a class="btn btn-primary" href="{{ url('profile/edit') }}"><i class="fa-solid fa-pencil-alt"></i> Edit</a>
                    <hr class="my-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fa-solid fa-user"></i> Name</h6>
                            <span class="text-secondary">{{$user->name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fa-solid fa-phone"></i> Phone Number</h6>
                            @if($user->phone_number)
                            <span class="text-secondary">{{$user->phone_number}}</span>
                            @else
                            <span class="text-secondary">Not set</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fa-solid fa-at"></i> Email</h6>
                            <span class="text-secondary">{{$user->email}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fa-solid fa-city"></i> City</h6>
                            @if($user->city)
                            <span class="text-secondary">{{$user->city->name}}</span>
                            @else
                            <span class="text-secondary">Not set</span>
                            @endif
                        </li>
                    </ul>
@endsection
