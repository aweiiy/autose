@extends('layouts.app')

@section('title', 'Listings')

@section('content')
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div>
                        <div class="pb-2 mb-2 mt-1">
                            <h1>Filters</h1>
                        </div>
                        <div class="offcanvas-body py-lg-4">
                            <div class="pb-4 mb-2">
                                <h3 class="h6 ">Location</h3>
                                <select class="form-select form-select-light mb-2">
                                </select>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6  pt-1">Year</h3>
                                <div class="d-flex align-items-center">
                                    <select class="form-select form-select-light w-100">
                                        <option value="" disabled="" selected="">From</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                    </select>
                                    <div class="mx-2">—</div>
                                    <select class="form-select form-select-light w-100">
                                        <option value="" disabled="">To</option>
                                        <option value="2022" selected="">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6 ">Make &amp; Model</h3>
                                <select class="form-select form-select-light mb-2">
                                    <option value="" disabled="" selected="">Any make</option>
                                    <option value="Audi">Audi</option>
                                    <option value="Lexus">Lexus</option>
                                    <option value="Mazda">Mazda</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                    <option value="Toyota">Toyota</option>
                                </select>
                                <select class="form-select form-select-light mb-1">
                                    <option value="" disabled="" selected="">Any model</option>
                                    <option value="A4">A4</option>
                                    <option value="A5">A5</option>
                                </select>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6 ">Price</h3>
                                <div class="d-flex align-items-center">
                                    <input class="form-control form-control-light w-100" type="number" min="0" step="500" placeholder="From">
                                    <div class="mx-2">—</div>
                                    <input class="form-control form-control-light w-100" type="number" min="0" step="500" placeholder="To">
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6 ">Fuel Type</h3>
                                <div class="form-check form-check-light">
                                    <input class="form-check-input" type="checkbox" id="diesel">
                                    <label class="form-check-label fs-sm" for="diesel">Diesel</label>
                                </div>
                                <div class="form-check form-check-light">
                                    <input class="form-check-input" type="checkbox" id="petrol">
                                    <label class="form-check-label fs-sm" for="petrol">Gasoline</label>
                                </div>
                                <div class="form-check form-check-light">
                                    <input class="form-check-input" type="checkbox" id="electric">
                                    <label class="form-check-label fs-sm" for="electric">Electric</label>
                                </div>
                                <div class="form-check form-check-light">
                                    <input class="form-check-input" type="checkbox" id="hybrid">
                                    <label class="form-check-label fs-sm" for="hybrid">Hybrid</label>
                                </div>
                            </div>
                            <div class="pb-4 mb-1">
                                <h3 class="h6 ">Transmission</h3>
                                <div class="form-check form-check-light">
                                    <input class="form-check-input" type="checkbox" id="auto">
                                    <label class="form-check-label fs-sm" for="auto">Automatic</label>
                                </div>
                                <div class="form-check form-check-light">
                                    <input class="form-check-input" type="checkbox" id="manual">
                                    <label class="form-check-label fs-sm" for="manual">Manual</label>
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6  pt-1">Mileage</h3>
                                <div class="d-flex align-items-center">
                                    <input class="form-control form-control-light w-100" type="number" min="0" step="500" placeholder="From">
                                    <div class="mx-2">—</div>
                                    <input class="form-control form-control-light w-100" type="number" min="0" step="500" placeholder="To">
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            <a href="#" class="save_favourite">
                                                <i class="far fa-heart fa-2x"></i>
                                            </a>
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
<script>
    let my_id = {{\Illuminate\Support\Facades\Session::get('loginId')}};

        console.log(my_id);
        $(document).ready(function(){
            $('.save_favourite').click(function (){
                alert('clicked');
            });
        });
    </script>
@endpush
