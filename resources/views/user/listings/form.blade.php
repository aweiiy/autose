@extends('layouts.app')

@section('title', 'Listings')

@section('content')

    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($car_listing))
                    Edit existing car listing
                @else
                    Create a new listing
                @endif
            </h6>
        </div>
        <div class="card-body">

            @if(isset($car_listing))
                {!! Form::model($car_listing, ['url' => ['listings', $car_listing->id], 'method' => 'patch']) !!}
            @else
                {!! Form::open(['url' => 'listings']) !!}
            @endif

            <div class="form-group">
                {!! Form::label('id_car_make', 'Make: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::select('id_car_make', $car_make, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <span class="text-danger">@error('id_car_make') {{$message}} @enderror</span>
            </div>
                <div class="form-group">
                    {!! Form::label('id_car_model', 'Genre: ', ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-6">
                        {!! Form::select('id_car_model', $car_model, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
            <div class="form-group">
                {!! Form::label('id_car_body_type', 'Body type: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::select('id_car_body_type', $car_body_type, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
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
