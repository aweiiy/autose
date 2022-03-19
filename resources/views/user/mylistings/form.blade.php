@extends('layouts.app')

@section('title', 'Listings')

@section('content')

    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                    Create a new listing
            </h6>
        </div>
        <div class="card-body">
                {!! Form::open(['url' => 'mylistings']) !!}
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
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="car_body_type_id" class="form-label">Model</label>
                    <select class="form-control" name="car_body_type_id" id="car_body_type_id" required></select>
                </div>
                <span class="text-danger">@error('car_body_type_id') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
            </div>
                <div class="form-group">
                    {!! Form::label('year', 'Year: ', ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-6">
                        {!! Form::select('year', $years, isset($car_listing->year) ? $car_listing->year : null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
            <div class="form-group">
                {!! Form::label('price', 'Price: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>

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
                <br>
                <div class="form-group col-sm-6">
                    <div class="custom-file">
                        {!! Form::file('image', ['class' => 'form-control']) !!}
                    </div>
                    @if(isset($car_listing->image))
                        <img src="{{url('images/'.$car_listing->image)}}" height="100" class="mt-2">
                    @endif
                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
