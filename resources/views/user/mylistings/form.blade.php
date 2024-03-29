@extends('layouts.app')

@section('title', 'Listings')

@section('content')
<style>
    label.error {
        color: #dc3545;
        font-size: 14px;
    }
</style>
<div class="mb-4">
    <h1 class="h2 mb-0">
        @if(isset($car_listing))
            Edit existing listing
        @else
            Create new listing
        @endif
    </h1>
</div>
@if(isset($car_listing))
    {!! Form::model($car_listing, ['url' => ['mylistings', $car_listing->id], 'method' => 'patch', 'enctype'=>'multipart/form-data','id'=>'listEditForm']) !!}
@else
    {!! Form::open(['url' => 'mylistings', 'method' => 'store', 'enctype'=>'multipart/form-data', 'id'=>'listForm'])!!}
@endif
<section class="card card-light card-body border-0 shadow-sm p-4 mb-4" id="price">
    <h2 class="h4  mb-4">Price</h2>
    {!! Form::label('price', 'Price:', ['class' => 'col-sm-3']) !!}
    <div class="d-sm-flex mb-2">
        {!! Form::number('price', null, ['class' => 'form-control w-100 me-2 mb-2', 'required' => 'required','min'=>'200', 'step'=>'50']) !!}
    </div>
    <span class="text-danger">@error('price') {{$message}} @enderror</span>
</section>
<section class="card card-light card-body border-0 shadow-sm p-4 mb-4" id="vehicle-info">
    <h2 class="h4 mb-4">Vehicle information</h2>
    <div class="row pb-2">
        <div class="col-sm-6 mb-3">
            @if(isset($car_listing))
                <label for="car_make" class="form-label">Make <span class="text-danger">*</span></label>
                <h3>{{$car_listing->car_make->name}}</h3>
            </div>
             <div class="col-sm-6 mb-3">
            <label for="car_model_id" class="form-label">Model</label>
                 <h3>{{$car_listing->car_model->name}}</h3>
            </div>
            @else
            <label for="car_make" class="form-label">Make <span class="text-danger">*</span></label>
            <select class="form-control" name="car_make_id" id="car_make_id">
                <option hidden>Select car make</option>
                @foreach ($car_make as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('car_make_id') {{$message}} @enderror</span>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="car_model_id" class="form-label">Model</label>
            <select class="form-control" name="car_model_id" id="car_model_id" required></select>
            <span class="text-danger">@error('car_model_id') {{$message}} @enderror</span>
        </div>
        @endif
        <div class="col-md-3 col-sm-6 mb-3">
            {!! Form::label('year', 'Year: ', ['class' => 'col-sm-3']) !!}
            {!! Form::select('year', $years, isset($car_listing->year) ? $car_listing->year : null, ['class' => 'form-control', 'required' => 'required']) !!}
            <span class="text-danger">@error('year') {{$message}} @enderror</span>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            {!! Form::label('mileage', 'Mileage: ', ['class' => 'col-sm-3']) !!}
            {!! Form::number('mileage', null, ['class' => 'form-control', 'min'=>'100', 'step'=>'100' , 'type'=>'number', 'placeholder'=>'Enter mileage'] ) !!}
            <span class="text-danger">@error('mileage') {{$message}} @enderror</span>
        </div>
        <div class="col-md-6 mb-3">
            {!! Form::label('vin', 'VIN: ', ['class' => 'col-sm-3']) !!}
            {!! Form::text('vin', null, ['class' => 'form-control', 'placeholder'=>'Enter VIN code']) !!}
            <span class="text-danger">@error('vin') {{$message}} @enderror</span>
        </div>
    </div>
    <div class="border-top border-light mt-2 pt-4">
        <div class="row pb-2">
            <div class="col-md-6">
                {!! Form::label('car_body_type_id', 'Body type: ', ['class' => 'col-sm-3']) !!}
                {!! Form::select('car_body_type_id', $car_body_type, null, ['class' => 'form-control', 'required' => 'required']) !!}
                <span class="text-danger">@error('car_body_type_id') {{$message}} @enderror</span>
                {!! Form::label('fuel_type_id', 'Fuel Type: ', ['class' => 'col-sm-3']) !!}
                {!! Form::select('fuel_type_id', $fuel_types, null, ['class' => 'form-control','id'=>'fuel']) !!}
                <span class="text-danger">@error('fuel_type_id') {{$message}} @enderror</span>
                {!! Form::label('cubic_capacity', 'Cubic capacity, cm³: ', ['class' => 'col-sm-3']) !!}
                {!! Form::number('cubic_capacity', null, ['class' => 'form-control', 'min'=>'100', 'max'=>'10000' , 'type'=>'number','id'=>'engine'] ) !!}
                <span class="text-danger">@error('cubic_capacity') {{$message}} @enderror</span>
                {!! Form::label('battery_capacity', 'Battery capacity, kWh: ', ['class' => 'col-sm-3']) !!}
                {!! Form::number('battery_capacity', null, ['class' => 'form-control', 'min'=>'1', 'max'=>'200' , 'type'=>'number','id'=>'battery'] ) !!}
            </div>
            <div class="col-md-6">
                <span class="text-danger">@error('battery_capacity') {{$message}} @enderror</span>
                {!! Form::label('engine_power', 'Engine power, kW: ', ['class' => 'col-sm-3']) !!}
                {!! Form::number('engine_power', null, ['class' => 'form-control', 'min'=>'20', 'max'=>'500' , 'type'=>'number'] ) !!}
                <span class="text-danger">@error('engine_power') {{$message}} @enderror</span>
                {!! Form::label('transmission_id', 'Transmission: ', ['class' => 'col-sm-3']) !!}
                {!! Form::select('transmission_id', $transmission, isset($car_listing->transmission_id) ? $car_listing->transmission_id : null, ['class' => 'form-control', 'required' => 'required']) !!}
                <span class="text-danger">@error('transmission_io') {{$message}} @enderror</span>
            </div>
        </div>
    </div>
    <div class="border-top border-light mt-2 pt-4">
        {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'5', 'style'=>'height:100%', 'placeholder'=>'Describe your vehicle']) !!}
        <span class="text-danger">@error('description') {{$message}} @enderror</span>
    </div>
</section>
<section class="card card-light card-body shadow-sm p-4 mb-4" id="photos">
    <h2 class="h4 mb-4">Photos</h2>
    <div class="alert alert-warning bg-faded-warning border-warning mb-4" role="alert">
        <div class="d-flex">
            <p class="fs-sm mb-1">The maximum photo size is 2 MB. Formats: jpeg, jpg, png. Put the main picture first.</p>
        </div>
    </div>
    <div class="custom-file">
        <label for="files" class="form-label"> Upload images</label>
        <input
            id="images"
            type="file"
            name="images[]"
            class="form-control"
            accept="image/*"
            multiple
        >
    </div>
            <div class="row mt-4" style="background-color: #e9ecef">
                    <label class="form-label"> Uploaded images:</label>
                @if(isset($images))
                    <?php $count = $images->count() ?>
                @foreach($images as $image)
                    <div class="col-lg-3 col-md-3 col-sm-5 thumbnail">
                        <a href="{{url('listing_images', $image->name)}}" data-lightbox="roadtrip"> <img class="w-50 mb-2" src="{{url('listing_images', $image->name)}}" alt=""></a>
                        @if($count == 1)
                    </div>
                            @break
                            @endif
                        <a href="../delete-image/{{$image->id}}" class="button p-2 mb-3 align-top" onclick="return confirm('Are you sure you want to delete?')">Delete</a>

                    </div>
                @endforeach
                <label class="form-label"> New images:</label>
                @endif
                <div class="row mt-2" id="thumbs">
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
            </div>
    <span class="text-danger">@error('images.*') {{$message}} @enderror</span>
</section>
<section class="card card-light card-body border-0 shadow-sm p-4 mb-4" id="contacts">
    <h2 class="h4 mb-4">Contacts</h2>
    <div class="row">
        <div class="col-sm-6 mb-3">
            {!! Form::label('city_id', 'City: ', ['class' => 'col-sm-3']) !!}
            {!! Form::select('city_id', $cities, isset(\App\Models\User::data()->city_id) ? \App\Models\User::data()->city_id : null, ['class' => 'form-control']) !!}
            <span class="text-danger">@error('city_id') {{$message}} @enderror</span>
        </div>
        <div class="col-sm-6 mb-3">
            {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3']) !!}
            {!! Form::text('email', \App\Models\User::data()->email, ['class' => 'form-control', 'placeholder'=>'Enter your email']) !!}
            <span class="text-danger">@error('email') {{$message}} @enderror</span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3">
            {!! Form::label('phone_number', 'Phone number: ', ['class' => 'col-sm-3']) !!}
            {!! Form::number('phone_number', isset(\App\Models\User::data()->phone_number) ? \App\Models\User::data()->phone_number : null , ['class' => 'form-control', 'required' => 'required', 'type'=>'tel', 'placeholder'=>'+370 XXXXXXX']) !!}
            <span class="text-danger">@error('phone_number') {{$message}} @enderror</span>
        </div>
    </div>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</section>
<div class="d-sm-flex justify-content-between pt-2">
    {!! Form::submit('Save and continue', ['class' => 'btn btn-primary btn-lg d-block mb-2 form-control']) !!}
    {!! Form::close() !!}
</div>
    <script>

    </script>
@endsection
@push('javascript')
    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="{{ asset('js/selector.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#images').change(function(){
                $("#thumbs").html('');
                for (var i = 0; i < $(this)[0].files.length; i++) {
                    $("#thumbs").append('<div class="col-lg-3 col-md-3 col-sm-5"><a href="'+window.URL.createObjectURL(this.files[i])+'" data-lightbox="roadtrip"><img src="'+window.URL.createObjectURL(this.files[i])+'" width="50%"/></a></div>');
                }
            });
        });
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
