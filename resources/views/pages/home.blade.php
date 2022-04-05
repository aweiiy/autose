@extends('layouts.app')

@section('title', 'Search')

@section('banner')
    <section>
        <div class="container pt-5">
            <div class="row  pt-xl-5">
                <div class="col-lg-4  pt-lg-5">
                    <h1 class="display-4 text-black me-md-n5">Autose - Find your dream car</h1>
                    <p class="fs-lg text-black opacity-70">Autose is a digital marketplace for cars. Sell your car or find which one you like. </p>
                </div>
                <div class="col-lg-8"><img class="d-block mt-4 ms-auto" src="images/main-ca.png" width="800" alt="Car"></div>
            </div>
        </div>
    </section>
@endsection

@section('search')

    <div class="container mt-4 mt-sm-3 mt-lg-n3 pb-5 mb-md-4">
        <!-- Form group-->
        <form class="search-group d-block" action="{{ url('/listings') }}" method="GET" id="filters">
            <div class="row g-0 ms-lg-n2">
                <div class="col-lg-2">
                    <div class="input-group border-end-lg"><span class="input-group-text text-muted ps-2 ps-sm-3"><i class="fi-search"></i></span>
                        <input class="form-control" type="text" name="keywords" placeholder="Keywords...">
                    </div>
                </div>
                <hr class="hr-light d-lg-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown border-end-sm border-light" data-bs-toggle="select">
                        <select class="selectpicker" data-live-search="true" data-dropup-auto="false" data-size="7" name="make" id="car_make_id" title="Select make">
                            <option value="">Select make</option>
                            @foreach($car_make as $make)
                                <option value="{{ $make->id }}">{{ $make->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <hr class="hr-light d-sm-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown border-end-md border-light" data-bs-toggle="select" data-dropup-auto="false">
                        <select class="selectpicker" name="car_model_id" id="car_model_id" title="Select model first"></select>
                    </div>
                </div>
                <hr class="hr-light d-md-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown border-end-sm border-light" data-bs-toggle="select" data-dropup-auto="false">
                        <select class="selectpicker" name="body_type[]" multiple title="Select body type">
                            @foreach($car_body_types as $car_body_type)
                                <option value="{{ $car_body_type->id }}">{{ $car_body_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr class="hr-light d-sm-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown" data-bs-toggle="select">
                        <select class="selectpicker" data-live-search="true" multiple data-actions-box="true" data-dropup-auto="false" data-selected-text-format="count > 3" data-size="7" name="city[]" title="Select cities">
                            @foreach($cities as $city)
                                @php
                                    $checked = [];
                                    if(isset($_GET['city'])){
                                        $checked = $_GET['city'];
                                    }
                                @endphp
                                <option value="{{ $city->id }}" @if(in_array($city->id, $checked)) selected @endif>{{ $city->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <hr class="hr-light d-lg-none my-2">
                <div class="col-lg-2">
                    <button class="btn btn-primary w-100" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <h1>Latest listings</h1>
    <div class="row">
                @foreach($car_listings->split($car_listings->count()/2) as $row)
                <div class="col">
                    @foreach($row as $item)
                        <a href="{{ url('listings/'.$item->id) }}" style="text-decoration: none;">
                        <div class="row mb-2 car-listing-home">
                            <div class="col-md-6 imgContainer float-left">
                                @foreach($item->images as $image)

                                        <img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid" style="margin-left: -12px;">

                                    @break
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <h5 class="mt-2">{{$item->car_make->name}} {{$item->car_model->name}} {{$item->year}}</h5>
                                <h2 class="pr-5">{{$item->price}} EUR</h2>
                                <p>Mileage: {{$item->price}} km</p>
                            </div>
                        </div>
                        </a>
                    @endforeach
                </div>
                @endforeach
    </div>
    <a class="btn btn-outline-secondary mb-3" href="/listings">View all listings</a>
@endsection
