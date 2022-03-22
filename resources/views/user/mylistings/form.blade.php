@extends('layouts.app')

@section('title', 'Listings')

@section('content')
<style>
    label.error {
        color: #dc3545;
        font-size: 14px;
    }
</style>

    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($car_listing))
                    Edit existing listing
                @else
                    Create new listing
                @endif
            </h6>
        </div>
        <div class="card-body">
            @if(isset($car_listing))
                {!! Form::model($car_listing, ['url' => ['mylistings', $car_listing->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}
            @else
                {!! Form::open(['url' => 'mylistings', 'method' => 'store', 'enctype'=>'multipart/form-data', 'id'=>'listForm'])!!}
            @endif
                @if(isset($car_listing))
                <div class="form-group">
                    <div class="col-sm-6">
                        <label class="form-label">Make</label>
                        <h3>{{$car_listing->car_make->name}}</h3>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label class="form-label">Model</label>
                        <h3>{{$car_listing->car_model->name}}</h3>
                    </div>
                </div>
                @else
            <div class="form-group">
                <div class="col-sm-6">
                <label for="car_make" class="form-label">Make</label>
                <select class="form-control" name="car_make_id" id="car_make_id">
                    <option hidden>Select car make</option>
                    @foreach ($car_make as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                </div>
                <span class="text-danger">@error('car_make_id') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="car_model_id" class="form-label">Model</label>
                    <select class="form-control" name="car_model_id" id="car_model_id" required></select>
                </div>
                <span class="text-danger">@error('car_model_id') {{$message}} @enderror</span>
            </div>
                @endif
            <div class="form-group">
                {!! Form::label('car_body_type_id', 'Body type: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::select('car_body_type_id', $car_body_type, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <span class="text-danger">@error('car_body_type_id') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'5', 'style'=>'height:100%']) !!}
                </div>
            </div>
            <span class="text-danger">@error('description') {{$message}} @enderror</span>
                <div class="form-group">
                    {!! Form::label('year', 'Year: ', ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-6">
                        {!! Form::select('year', $years, isset($car_listing->year) ? $car_listing->year : null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
            <span class="text-danger">@error('year') {{$message}} @enderror</span>
            <div class="form-group">
                {!! Form::label('price', 'Price: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <span class="text-danger">@error('price') {{$message}} @enderror</span>
            <div class="form-group">
                {!! Form::label('phone_number', 'Phone number: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('phone_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <span class="text-danger">@error('phone_number') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', \App\Models\User::data()->email, ['class' => 'form-control']) !!}
                </div>
            </div>
            <span class="text-danger">@error('description') {{$email}} @enderror</span>
                <br>
            <div class="form-group col-sm-6">
                <div class="custom-file">
                    <label for="files" class="form-label"> Upload images</label>
                    <input
                        type="file"
                        name="images[]"
                        class="form-control"
                        accept="image/*"
                        multiple
                    >
                </div>
                @if(isset($images))
                    @foreach($images as $image)
                    <img src="{{url('listing_images', $image->name)}}" height="100" class="mt-2">
                    @endforeach
                @endif
            </div>
            <span class="text-danger">@error('images.*') {{$message}} @enderror</span>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#listForm").validate({
                rules: {
                    car_make_id: {
                        required:true,
                        min: 1
                    },
                    car_model_id: {
                        required:true,
                        min: 1
                    },
                    car_body_type_id: {
                        required:true,
                        min: 1
                    },
                    description: {
                        required:false,
                    },
                    year: {
                        required:true,
                        min: 1
                    },
                    price: {
                        required:true,
                        number: true
                    },
                    phone_number: {
                        required:true,
                        number: true
                    },
                    email: {
                        email: true,
                        maxlength: 50
                    },
                    'images[]': {
                        required:true,
                    },

                },
                messages: {
                    email: {
                        required: "Enter your email",
                        email: "Email must be a valid email address",
                        maxlength: "Email cannot be more than 50 characters",
                    },
                    car_make_id: {
                        required: "Please select a car make",
                        min: "Please select a car make"
                    },
                    car_model_id: {
                        required:"Please select a model",
                        min: "Please select a model",
                    },
                    car_body_type_id: {
                        required:"Please select a body type",
                        min: "Please select a body type"
                    },
                    description: {
                        required:false,
                    },
                    year: {
                        required:"Please select a year",
                        min: "Please select a year"
                    },
                    price: {
                        required:"Please state the price",
                        number: "The price must be a number"
                    },
                    phone_number: {
                        required:"Please prove your phone number",
                        number: "The phone number must only contain numbers"
                    },
                    'images[]': {
                        required:"You must upload an image"
                    },
                }
            });
        });
    </script>
@endsection
