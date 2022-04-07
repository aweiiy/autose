@extends('layouts.app')

@section('title', 'Listings')

@section('content')
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 collapse dont-collapse-sm" id="multiCollapseExample2">
                    <!-- Filters  -->
                    <form action="{{ url('/listings') }}" method="GET" id="filters">
                    <div>
                        <div class="pb-2 mb-2 mt-1">
                            <h1>Filters</h1>
                        </div>
                        <div class="offcanvas-body py-lg-4" style="background-color: white; box-shadow: 0px 0px 1px black">
                            <div class="mb-2">
                                <h3 class="h6 ">Make &amp; Model</h3>
                                <select class="form-control" name="make" id="car_make_id">
                                    <option value="">Select Make</option>
                                    @foreach ($car_make as $make)
                                        <option value="{{$make->id}}" @if(request()->make == $make->id) selected @endif>{{$make->name}}</option>
                                    @endforeach
                                </select>
                                <select class="form-control mt-1" name="car_model_id" id="car_model_id">
                                    <option value="">Select Model</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <h3 class="h6  pt-1">Year</h3>
                                <div class="d-flex align-items-center">
                                    <select class="form-select form-select-light w-100" name="min_year">
                                        <option value="" hidden>From</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year }}" @if(request()->min_year == $year) selected @endif>{{ $year }}</option>
                                        @endforeach
                                    </select>
                                    <div class="mx-2">—</div>
                                    <select class="form-select form-select-light w-100" name="max_year">
                                        <option value="" hidden>To</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year }}" @if(request()->max_year == $year) selected @endif>{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2">
                                <h3 class="h6 ">Location</h3>
                                <select class="selectpicker form-control" data-live-search="true" multiple data-actions-box="true" data-selected-text-format="count > 3" data-size="7" name="city[]" title="Select cities" style="border: 1px solid black;">
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
                            <div class="mb-2">
                                <h3 class="h6 ">Price, €</h3>
                                <div class="d-flex align-items-center">
                                    <select class="form-select form-select-light w-100" name="min_price">
                                        <option value="">From</option>
                                        @foreach($prices as $price)
                                            <option value="{{ $price }}" @if(request()->min_price == $price) selected @endif>{{ $price }} €</option>
                                        @endforeach
                                    </select>
                                    <div class="mx-2">—</div>
                                    <select class="form-select form-select-light w-100" name="max_price">
                                        <option value="">To</option>
                                        @foreach($prices as $price)
                                            <option value="{{ $price }}" @if(request()->max_price == $price) selected @endif>{{ $price }} €</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2">
                                <h3 class="h6">Cubic capacity, cm³</h3>
                                <div class="d-flex align-items-center">
                                    <select class="form-select form-select-light w-100" name="min_engine">
                                        <option value="">From</option>
                                        @foreach($cubic_capacities as $capacity)
                                            <option value="{{ $capacity }}" @if(request()->min_engine == $capacity) selected @endif>{{ $capacity }} cm³</option>
                                        @endforeach
                                    </select>
                                    <div class="mx-2">—</div>
                                    <select class="form-select form-select-light w-100" name="max_engine">
                                        <option value="">To</option>
                                        @foreach($cubic_capacities as $capacity)
                                            <option value="{{ $capacity }}" @if(request()->max_engine == $capacity) selected @endif>{{ $capacity }} cm³</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2">
                                <h3 class="h6">Engine power, kW</h3>
                                <div class="d-flex align-items-center">
                                    <select class="form-select form-select-light w-100" name="min_power">
                                        <option value="">From</option>
                                        @foreach($engine_powers as $power)
                                            <option value="{{ $power }}" @if(request()->min_power == $power) selected @endif>{{ $power }} kw ({{round($power*1.3596216173)}} hp)</option>
                                        @endforeach
                                    </select>
                                    <div class="mx-2">—</div>
                                    <select class="form-select form-select-light w-100" name="max_power">
                                        <option value="">To</option>
                                        @foreach($engine_powers as $power)
                                            <option value="{{ $power }}" @if(request()->max_power == $power) selected @endif>{{ $power }} kw ({{round($power*1.3596216173)}} hp)</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2">
                                <h3 class="h6">Mileage, km</h3>
                                <div class="d-flex align-items-center">
                                    <select class="form-select form-select-light w-100" name="min_mileage">
                                        <option value="">From</option>
                                        @foreach($mileages as $mileage)
                                            <option value="{{ $mileage }}" @if(request()->min_mileage == $mileage) selected @endif>{{ $mileage }} km</option>
                                        @endforeach
                                    </select>
                                    <div class="mx-2">—</div>
                                    <select class="form-select form-select-light w-100" name="max_mileage">
                                        <option value="">To</option>
                                        @foreach($mileages as $mileage)
                                            <option value="{{ $mileage }}" @if(request()->max_mileage == $mileage) selected @endif>{{ $mileage }} km</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2">
                                <h3 class="h6">Body type</h3>
                                <div class="scroll-v-150px">
                                    @foreach($car_body_types as $car_body_type)
                                        @php
                                            $checked = [];
                                            if(isset($_GET['body_type'])){
                                                $checked = $_GET['body_type'];
                                            }
                                        @endphp
                                        <div class="form-check ml-1">
                                            <input class="form-check-input" type="checkbox" name="body_type[]" value="{{$car_body_type->id}}" id="body_type_{{$car_body_type->id}}" @if(in_array($car_body_type->id, $checked)) checked @endif>
                                            <label class="form-check-label" for="body_type_{{$car_body_type->id}}">
                                                {{$car_body_type->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-2">
                                <h3 class="h6 ">Fuel Type</h3>
                                <div id="coll-2" class="scroll-v-150px">
                                    @foreach($fuel_types as $fuel_type)
                                        @php
                                            $checked = [];
                                            if(isset($_GET['fuel_type'])){
                                                $checked = $_GET['fuel_type'];
                                            }
                                        @endphp
                                        <div class="form-check ml-1">
                                            <input class="form-check-input" type="checkbox" name="fuel_type[]" value="{{$fuel_type->id}}" id="fuel_type_{{$fuel_type->id}}" @if(in_array($fuel_type->id, $checked)) checked @endif>
                                            <label class="form-check-label" for="fuel_type_{{$fuel_type->id}}">
                                                {{$fuel_type->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-1">
                                <h3 class="h6 ">Transmission</h3>
                                <div id="coll-2" class="scroll-v-150px">
                                    @foreach($transmissions as $transmission)
                                        @php
                                            $checked = [];
                                            if(isset($_GET['transmission'])){
                                                $checked = $_GET['transmission'];
                                            }
                                        @endphp
                                        <div class="form-check ml-1">
                                            <input class="form-check-input" type="checkbox" name="transmission[]" value="{{$transmission->id}}" id="transmission_{{$transmission->id}}" @if(in_array($transmission->id, $checked)) checked @endif>
                                            <label class="form-check-label" for="transmission_{{$transmission->id}}">
                                                {{$transmission->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-2">
                                <h3 class="h6  pt-1">Battery capacity, kWh</h3>
                                <div class="d-flex align-items-center">
                                    <div class="form-group mr-2">
                                        <input type="text" class="form-control" name="min_battery" placeholder="From" value="{{isset($_GET['min_battery']) ? $_GET['min_battery'] : ''}}">
                                    </div>
                                    <div class="mx-2">—</div>
                                    <div class="form-group mr-2">
                                        <input type="text" class="form-control" name="max_battery" placeholder="To" value="{{isset($_GET['max_battery']) ? $_GET['max_battery'] : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <h3 class="h6  pt-1">Keywords</h3>
                                <input class="form-control" name="keywords" placeholder="Enter keywords" @if(request()->keywords) value="{{request()->keywords}}" @endif>
                            </div>
                            <input type="submit" class="btn btn-primary mb-2 mt-2" value="Filter">
                            <button type="button" class="btn btn-danger mb-2 mt-2" onclick="clearFilter()">Clear Filters</button>
                        </div>
                    </div>
                    </form>
                    <!-- /Filters  -->
                </div>
                <button class="btn btn-primary d-md-none filtersToggle mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Show filters</button>
                <div class="col-lg-9 col-md-8">
                    <div class="d-flex align-items-center justify-content-between pb-4 mb-2">
                        <h1 class="me-3 mb-0">Listings</h1>
                    </div>
                    <div>
                        {{$_GET ? ' | Found listings: '.$car_listings->total() : ''}}
                    </div>
                    <!-- ad listing list  -->
                    @forelse($car_listings as $item)
                        <div class="car-listing-list mt-20">
                            <div class="row p-lg-3 p-sm-5 p-4">
                                <div class="col-lg-4 align-self-center">
                                    <a href="{{ url('listings/'.$item->id) }}">
                                        @foreach($item->images as $image)
                                            <img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid rounded">
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
                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-id="{{$item->id}}" id="wishlist_{{$item->id}}">
                                                        <i class="far fa-heart fa-2x"></i>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);" class="remove_from_wishlist" data-id="{{$item->id}}" id="wishlist_{{$item->id}}">
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
                @empty
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                            <h4 class="alert-heading">No results found!</h4>
                            <p>Please try again with different search criteria.</p>
                        </div>
                    </div>
                @endforelse

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    function clearFilter() {
        window.location.href = "{{ url('/listings') }}";
    }
</script>
@endpush
@push('css')
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
