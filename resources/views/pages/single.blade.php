@extends('layouts.app')

@section('title', 'Listings')

@section('content')
    <style>
        .img-size {
            width: 1200px;
            height: 500px;
            object-fit: fill;
        }
    </style>
    <div class="card">
        @if($car_listing->user->id == \Illuminate\Support\Facades\Session::get('loginId'))
            <div class="card-header">
                <a href="{{ url('mylistings/'.$car_listing->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit listing</a>
            </div>
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <!-- Gallery-->
                    <div class="row">
                        <a href="{{url('listing_images', $images[0]->name)}}" data-lightbox="roadtrip"><img class="w-100 mainPhoto" src="{{url('listing_images', $images[0]->name)}}"></a>
                    </div>
                    <div class="row">
                        <div>
                            @foreach($images as $image)
                                @if($loop->index == 0)
                                    @continue
                                @endif
                                <a class="thumbnail" href="{{url('listing_images', $image->name)}}" data-lightbox="roadtrip"> <img src="{{url('listing_images', $image->name)}}" alt=""></a>
                                @if($loop->iteration == 5)
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Specs -->
                    <div class="py-3 mb-3">
                        <h2 class="h4 mb-4">Specifications</h2>
                        <div class="row">
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><strong>Manufacturing Year:</strong><span class="opacity-70 ms-1">{{$car_listing->year}}</span></li>
                                    <li class="mb-2"><strong>Mileage:</strong><span class="opacity-70 ms-1">{{$car_listing->mileage}} km</span></li>
                                    <li class="mb-2"><strong>Body Type:</strong><span class="opacity-70 ms-1">{{$car_listing->car_body_type->name}}</span></li>
                                    <li class="mb-2"><strong>Transmission:</strong><span class="opacity-70 ms-1">{{$car_listing->transmission->name}}</span></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><strong>Fuel Type:</strong><span class="opacity-70 ms-1">{{$car_listing->fuel_type->name}}</span></li>
                                    <!-- Engine and battery-->
                                    @if(!$car_listing->battery_capacity)
                                        <li class="mb-2"><strong>Engine cubic capacity:</strong>
                                            <span class="opacity-70 ms-1">
                                                {{number_format((float)$car_listing->cubic_capacity/1000, 1, '.', '')}} L.
                                    @elseif(!$car_listing->cubic_capacity)
                                        <li class="mb-2"><strong>Battery capacity:</strong>
                                            <span class="opacity-70 ms-1">
                                                {{$car_listing->battery_capacity}} KWh.
                                    @else
                                        <li class="mb-2"><strong>Engine cubic capacity:</strong>
                                            <span class="opacity-70 ms-1">
                                                {{number_format((float)$car_listing->cubic_capacity/1000, 1, '.', '')}} L.
                                            </span>
                                        <li class="mb-2"><strong>Battery capacity:</strong>
                                            {{$car_listing->battery_capacity}} kWh.
                                        @endif
                                        <!-- Engine and battery-->
                                            </span>
                                        </li>
                                        <li class="mb-2"><strong>VIN:</strong><span class="opacity-70 ms-1">{{$car_listing->vin}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Description-->
                    <div class="pb-4 mb-3">
                        <h2 class="h4  pt-4 mt-3">Description:</h2>
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
                            <div class="h3 ">
                            {{ $car_listing->car_make->name }} {{ $car_listing->car_model->name }}
                            <!-- Engine and battery-->
                                @if(!$car_listing->battery_capacity)
                                    {{number_format((float)$car_listing->cubic_capacity/1000, 1, '.', '')}} L.
                                @elseif(!$car_listing->cubic_capacity)
                                    {{$car_listing->battery_capacity}} KWh.
                                @else
                                    {{number_format((float)$car_listing->cubic_capacity/1000, 1, '.', '')}} L. , {{$car_listing->battery_capacity}} kWh.
                                @endif
                            <!-- Engine and battery-->
                                {{ $car_listing->year }}
                            </div>
                            <div class="h3 ">{{$car_listing->price}} EUR
                                @if($wishlist_item == $car_listing->id)
                                <a href="#" class="save_favourite">
                                    <i class="fas fa-heart"></i>
                                </a>
                                @else
                                    <a href="#" class="save_favourite">
                                        <i class="far fa-heart"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="card card-light card-body mb-4">
                            <div>
                                <div class="text-nowrap"><span class="">Contact info:</span></div>
                                <div class="text-nowrap"><span class="">Name: {{$car_listing->user->name}}</span></div>
                                <div class="text-nowrap"><span class="">Phone number: {{$car_listing->phone_number}}</span></div>
                                <div class="text-nowrap"><span class="">City: {{$car_listing->city->name}}</span></div>
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
@push('javascript')
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script>
        lightbox.option({
            'resizeDuration': 0,
            'wrapAround': true,
            'imageFadeDuration': 0
        })
    </script>
@endpush
@push('css')
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
@endpush
