@extends('layouts.app')

@section('title', 'Listings')

@section('content')
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    Search filters here
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="d-flex align-items-center justify-content-between pb-4 mb-2">
                        <h1 class="me-3 mb-0">Listings</h1>
                    </div>
                    <!-- ad listing list  -->
                    @foreach($car_listings as $item)
                        <div class="car-listing-list mt-20" onclick="location.href='#';" style="cursor: pointer;">
                            <div class="row p-lg-3 p-sm-5 p-4">
                                <div class="col-lg-4 align-self-center">
                                    <a href="#">
                                        @foreach($item->images as $image)
                                            <td class="w-25"><img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid img-thumbnail rounded"></td>
                                            @break
                                        @endforeach
                                    </a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10">
                                            <div class="ad-listing-content">
                                                <div>{{$item->year}}</div>
                                                    <div class="h3">
                                                        <strong>{{ $item->car_make->name }} {{ $item->car_model->name }}</strong>
                                                    </div>
                                                <h2 class="pr-5">{{$item->price}} EUR</h2>
                                                <div>{{$item->city->name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 align-self-center">
                                            <button class="btn" onclick="alert('saved')">
                                                <i class="far fa-heart fa-2x"></i>
                                            </button>
                                        </div>
                                        <div class="border-top border-light mt-3 pt-3">
                                            <div class="row g-2">
                                                <div class="col me-sm-1">
                                                    <div class=" rounded text-center w-100 h-100 p-2"><i class="fa-solid fa-gauge-high"></i><span> {{$item->mileage}} km</span></div>
                                                </div>
                                                <div class="col me-sm-1">
                                                    <div class=" rounded text-center w-100 h-100 p-2"><i class="fa-solid fa-gas-pump"></i><span> {{$item->fuel_type->name}}</span></div>
                                                </div>
                                                <div class="col">
                                                    <div class=" rounded text-center w-100 h-100 p-2"><i class="fa-solid fa-car-side"></i><span> {{$item->car_body_type->name}}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ad listing list  -->
                @endforeach

                <!-- pagination -->
                    <div class="pagination justify-content-center py-4">
                        {{ $car_listings->links() }}
                    </div>
                    <!-- pagination -->
                </div>
            </div>
        </div>
    </section>
@endsection
