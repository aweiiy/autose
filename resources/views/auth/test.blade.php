@extends('layouts.profile')

@section('content-profile')
@forelse($wishlist as $item)
    @if(is_null($item->car_listing))
        @continue
        @endif
    <div class="car-listing-list mt-20">
        <div class="row p-lg-3 p-sm-5 p-4">
            <div class="col-lg-4 align-self-center">
                <a href="{{ url('listings/'.$item->car_listing->id) }}">
                    @foreach($item->car_listing->images as $image)
                        <img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid img-thumbnail rounded">
                        @break
                    @endforeach
                </a>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-10 col-md-10" onclick="location.href='{{ url('listings/'.$item->car_listing->id) }}';" style="cursor: pointer;">
                        <div class="ad-listing-content">
                            <div>{{$item->car_listing->year}}</div>
                            <div class="h3">
                                <strong>{{ $item->car_listing->car_make->name }} {{ $item->car_listing->car_model->name }} </strong>
                            </div>
                            <h2 class="pr-5">{{$item->car_listing->price}} EUR</h2>
                            <div><i class="fa-solid fa-location-dot"></i> {{$item->car_listing->city->name}}</div>
                        </div>
                    </div>
                    <div class="col-lg-1 align-self-center">

                    </div>
                    <div class="border-top border-light mt-3 pt-3">
                        <div class="row g-2">
                            <div class="col me-sm-1">
                                <div class=" rounded text-center w-100 h-100 p-2"><i class="fa-solid fa-gauge-high"></i><span> {{$item->car_listing->mileage}} km</span></div>
                            </div>
                            <div class="col me-sm-1">
                                <div class=" rounded text-center w-100 h-100 p-2"><i class="fa-solid fa-gas-pump"></i><span> {{$item->car_listing->fuel_type->name}}</span></div>
                            </div>
                            <div class="col">
                                <div class=" rounded text-center w-100 h-100 p-2"><i class="fa-solid fa-car-side"></i><span> {{$item->car_listing->car_body_type->name}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ad listing list  -->
@empty
    wishlist empty
    @endforelse

    @endsection
