@extends('layouts.app')

@section('title', 'Listings')

@section('content')
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                Filters go here
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="d-flex align-items-center justify-content-between pb-4 mb-2">
                        <h1 class="me-3 mb-0">Listings</h1>
                    </div>
                    <!-- ad listing list  -->
                    @foreach($car_listings as $item)
                        <div class="car-listing-list mt-20">
                            <div class="row p-lg-3 p-sm-5 p-4">
                                <div class="col-lg-4 align-self-center">
                                    <a href="{{ url('listings/'.$item->id) }}">
                                        @foreach($item->images as $image)
                                            <img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid img-thumbnail rounded">
                                            @break
                                        @endforeach
                                    </a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10" onclick="location.href='{{ url('listings/'.$item->id) }}';" style="cursor: pointer;">
                                            <div class="ad-listing-content">
                                                <div>{{$item->year}}</div>
                                                    <div class="h3">
                                                        <strong>{{ $item->car_make->name }} {{ $item->car_model->name }} </strong>
                                                    </div>
                                                <h2 class="pr-5">{{$item->price}} EUR</h2>
                                                <div><i class="fa-solid fa-location-dot"></i> {{$item->city->name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 align-self-center">
                                            <?php $key = 0 ?>
                                            @foreach($wishlist_items as $wish)
                                                @if($wish->car_listing_id == $item->id)
                                                        <?php ++$key ?>
                                                @endif
                                            @endforeach
                                                @if($key == 0)
                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-id="{{$item->id}}" id="add_to_wishlist_{{$item->id}}">
                                                        <i class="far fa-heart fa-2x"></i>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);" class="remove_from_wishlist" data-id="{{$item->id}}" id="remove_from_wishlist_{{$item->id}}">
                                                        <i class="fas fa-heart fa-2x"></i>
                                                    </a>
                                                @endif
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

@push('javascript')
    {{--Add to wishlist--}}

@endpush
