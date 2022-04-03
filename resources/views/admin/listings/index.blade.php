@extends('layouts.admin')

@section('title', 'Listings')

@section('content')
    <style>
        .fitToSize{
            height: 200px;
            position: relative;
            width: 300px;
            object-fit: cover;
        }
    </style>
    <div class="card">
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif

                    <form action="{{ url('admin/listings') }}" method="GET" style="margin-top: 20px;" id="filters">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <input  class="form-control" name="id" placeholder="Enter listing id" @if(request()->id) value="{{request()->id}}" @endif>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <input class="form-control" name="owner" placeholder="Enter listing owner name" @if(request()->owner) value="{{request()->owner}}" @endif>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <select class="form-control" name="make" id="car_make_id">
                                        <option value="">Select Make</option>
                                        @foreach ($car_make as $make)
                                            <option value="{{$make->id}}" @if(request()->make == $make->id) selected @endif>{{$make->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <select class="form-control" name="car_model_id" id="car_model_id"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <input  class="form-control" type="number" name="min_price" id="min_price" placeholder="Enter min price" @if(request()->min_price) value="{{request()->min_price}}" @endif>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <input  class="form-control" type="number" name="max_price" placeholder="Enter max price" @if(request()->max_price) value="{{request()->max_price}}" @endif>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <select class="form-control" name="min_year" id="min_year">
                                        <option value="">Select min year</option>
                                        @foreach ($years as $year)
                                            <option value="{{$year}}" @if(request()->min_year == $year) selected @endif>{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <select class="form-control" name="max_year" id="max_year">
                                        <option value="">Select max year</option>
                                        @foreach ($years as $year)
                                            <option value="{{$year}}" @if(request()->max_year == $year) selected @endif>{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <input class="form-control" type="number" name="min_mileage" placeholder="Enter min mileage" @if(request()->min_mileage) value="{{request()->min_mileage}}" @endif>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <input class="form-control" type="number" name="max_mileage" placeholder="Enter max mileage" @if(request()->max_mileage) value="{{request()->max_mileage}}" @endif>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <input class="form-control" type="number" name="min_engine" placeholder="Enter min engine" @if(request()->min_engine) value="{{request()->min_engine}}" @endif>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <input class="form-control" type="number" name="max_engine" placeholder="Enter max engine" @if(request()->max_engine) value="{{request()->max_engine}}" @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
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
                                    <div class="col-sm-6 col-md-6">
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
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div id="coll-2" class="scroll-v-150px">
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
                                    <div class="col-sm-6 col-md-6">
                                        <select class="form-control" name="city">
                                            <option value="">Select city</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" @if(request()->city == $city->id) selected @endif>{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-sm mb-2 mt-2" value="Filter">
                        <button type="button" class="btn btn-danger btn-sm mb-2 mt-2" onclick="clearFilter()">Clear Filter</button>
                    </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($listings as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->name}}</td>
                            @foreach($item->images as $image)
                                <td class="w-25"><img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid img-thumbnail"></td>
                                @break
                            @endforeach
                            <td onclick="window.location='{{ url('admin/listings/'.$item->id) }}';" style="cursor: pointer">
                                {{ $item->car_make->name}} {{$item->car_model->name}} {{$item->car_body_type->name}} {{$item->year}}
                            </td>
                            <td>{{ $item->price}} EUR</td>
                            <td>
                                <a href="{{ url('admin/listings/'.$item->id) }}" class="btn btn-outline-secondary btn-sm" style="padding: 10px"><i class="fas fa-eye"></i> View</a>
                                <a href="{{ url('admin/listings/'.$item->id.'/edit') }}" class="btn btn-outline-primary btn-sm" style="padding: 10px"><i class="fas fa-edit"></i> Edit</a>
                                {!! Form::open(['method'=>'DELETE', 'url' => ['admin/listings', $item->id], 'style' => 'display:inline;']) !!}
                                {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', ['class' => 'btn btn-danger btn-sm', 'style' => 'padding: 10px', 'type' => 'submit', 'onclick'=>"return confirm('Are you sure?')"]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @empty
                            <div><p>There are no listings.</p></div>
                    @endforelse
                    </tbody>
                </table>
                {{ $listings->links() }}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#car_model_id').append('<option value="" hidden>Choose make first</option>');
            $('#car_make_id').on('change', function() {
                var car_make_id = $(this).val();
                if(car_make_id) {
                    $.ajax({
                        url: '/getModel/'+car_make_id,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data)
                        {
                            if(data){
                                $('#car_model_id').empty();
                                $('#car_model_id').append('<option value="" hidden>Select model</option>');
                                $.each(data, function(key, model){
                                    key++;
                                    $('select[name="car_model_id"]').append('<option value="'+ model.id +'">' + model.name+ '</option>');
                                });
                            }else{
                                $('#car_model_id').empty();
                            }
                        }
                    });
                }else{
                    $('#car_model_id').empty();
                    $('#car_model_id').append('<option value="" hidden>Choose make first</option>');
                }
            }).change();
        });
            function clearFilter() {
            window.location.href = "{{ url('admin/listings') }}";
        }
    </script>
@endsection
@push('css')
    <style>
        .scroll-v-150px {
            max-height: 150px;
            overflow-y: scroll;
        }
    </style>
@endpush
