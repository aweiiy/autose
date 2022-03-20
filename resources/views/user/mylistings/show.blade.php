@extends('layouts.app')

@section('title', 'Listings')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <!-- Gallery-->
                    <div>
                        <div><img src="{{url('images/listings/'.$car_listing->image)}}" class="rounded-3" style="width:100%;"></div>
                    </div>
                    <!-- Description-->
                    <div class="pb-4 mb-3">
                        <h2 class="h4  pt-4 mt-3">{{ $car_listing->user->name }}'s Description:</h2>
                        <p class=" opacity-70 mb-1">{{$car_listing->description}}</p>
                    </div>
                    <!-- Post meta-->
                    <div class="d-flex flex-wrap border-top border-light fs-sm  pt-4 pb-5 pb-md-2">
                        <div class="border-end border-light pe-3 me-3"><span class="opacity-70">Published: <strong>{{ $car_listing->created_at }}</strong></span></div>
                        <div class="border-end border-light pe-3 me-3"><span class="opacity-70">Listing ID: <strong>{{ $car_listing->id }}</strong></span></div>
                    </div>
                </div>
                <!-- Sidebar-->
                <div class="col-md-5 pt-5 pt-md-0" style="margin-top: -6rem;">
                    <div class="sticky-top pt-5">
                        <div class="d-none d-md-block pt-5">
                            <div class="h3 ">{{ $car_listing->car_make->name }} {{ $car_listing->car_model->name }} {{ $car_listing->year }}</div>
                            <div class="h3 ">{{$car_listing->price}} EUR</div>
                        </div>
                        <div class="card card-light card-body mb-4">
                            <div>
                                <div class="text-nowrap"><span class="">Contact info:</span></div>
                                <div class="text-nowrap"><span class="">Name: {{$car_listing->user->name}}</span></div>
                                <div class="text-nowrap"><span class="">Phone number: {{$car_listing->phone_number}}</span></div>
                                <br>
                                <a class="btn btn-primary btn-lg" href="mailto:{{$car_listing->email}}">Send email</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
