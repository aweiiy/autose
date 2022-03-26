@extends('layouts.admin')

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
                {!! Form::model($car_listing, ['url' => ['admin/listings', $car_listing->id], 'method' => 'patch', 'enctype'=>'multipart/form-data','id'=>'listEditForm']) !!}
            @else
                {!! Form::open(['url' => 'admin/listings', 'method' => 'store', 'enctype'=>'multipart/form-data', 'id'=>'listForm'])!!}
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
                <div class="col-md-6">
                    {!! Form::label('year', 'Year: ', ['class' => 'col-sm-3']) !!}
                    {!! Form::select('year', $years, isset($car_listing->year) ? $car_listing->year : null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <span class="text-danger">@error('year') {{$message}} @enderror</span>
                </div>
                <div class="col-md-6">
                    {!! Form::label('mileage', 'Mileage: ', ['class' => 'col-sm-3']) !!}
                    {!! Form::number('mileage', null, ['class' => 'form-control', 'min'=>'1', 'step'=>'100' , 'type'=>'number', 'placeholder'=>'Enter mileage'] ) !!}
                    <span class="text-danger">@error('mileage') {{$message}} @enderror</span>
                </div>
                <div class="col-md-6">
                    {!! Form::label('vin', 'VIN: ', ['class' => 'col-sm-3']) !!}
                    {!! Form::text('vin', null, ['class' => 'form-control', 'placeholder'=>'Enter VIN code']) !!}
                    <span class="text-danger">@error('vin') {{$message}} @enderror</span>
                </div>
                <div class="col-md-6">
                    {!! Form::label('car_body_type_id', 'Body type: ', ['class' => 'col-sm-3']) !!}
                    {!! Form::select('car_body_type_id', $car_body_type, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <span class="text-danger">@error('car_body_type_id') {{$message}} @enderror</span>
                    {!! Form::label('fuel_type_id', 'Fuel Type: ', ['class' => 'col-sm-3']) !!}
                    {!! Form::select('fuel_type_id', $fuel_types, null, ['class' => 'form-control','id'=>'fuel']) !!}
                    <span class="text-danger">@error('fuel_type_id') {{$message}} @enderror</span>
                    {!! Form::label('cubic_capacity', 'Cubic capacity, cm³: ', ['class' => 'col-sm-3']) !!}
                    {!! Form::number('cubic_capacity', null, ['class' => 'form-control', 'min'=>'100', 'type'=>'number','id'=>'engine'] ) !!}
                    <span class="text-danger">@error('cubic_capacity') {{$message}} @enderror</span>
                    {!! Form::label('battery_capacity', 'Battery capacity, kWh: ', ['class' => 'col-sm-3']) !!}
                    {!! Form::number('battery_capacity', null, ['class' => 'form-control', 'min'=>'1', 'type'=>'number','id'=>'battery'] ) !!}
                    <span class="text-danger">@error('battery_capacity') {{$message}} @enderror</span>
                    {!! Form::label('price', 'Price:', ['class' => 'col-sm-3']) !!}
                    {!! Form::number('price', null, ['class' => 'form-control w-100 me-2 mb-2', 'required' => 'required','min'=>'200', 'step'=>'50']) !!}
                    <span class="text-danger">@error('price') {{$message}} @enderror</span>
                    {!! Form::label('transmission_id', 'Transmission: ', ['class' => 'col-sm-3']) !!}
                    {!! Form::select('transmission_id', $transmission, isset($car_listing->transmission_id) ? $car_listing->transmission_id : null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <span class="text-danger">@error('transmission_io') {{$message}} @enderror</span>
                    {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'5', 'style'=>'height:100%', 'placeholder'=>'Describe your vehicle']) !!}
                    <span class="text-danger">@error('description') {{$message}} @enderror</span>
                </div>
                <br>
                <h2 class="h4 mb-4">Photos</h2>
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
                                <a href="../delete-image/{{$image->id}}" class="button p-2 mb-3 align-top">Delete</a>
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
                <br>
                <h2 class="h4 mb-4">Contacts</h2>
                    <div class="col-sm-6 mb-3">
                        {!! Form::label('city_id', 'City: ', ['class' => 'col-sm-3']) !!}
                        {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}
                        <span class="text-danger">@error('city_id') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-6 mb-3">
                        {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3']) !!}
                        {!! Form::text('email', \App\Models\User::data()->email, ['class' => 'form-control', 'placeholder'=>'Enter your email']) !!}
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="col-sm-6 mb-3">
                        {!! Form::label('phone_number', 'Phone number: ', ['class' => 'col-sm-3']) !!}
                        {!! Form::number('phone_number', null, ['class' => 'form-control', 'required' => 'required', 'type'=>'tel', 'placeholder'=>'+370 XXXXXXX']) !!}
                        <span class="text-danger">@error('phone_number') {{$message}} @enderror</span>
                    </div>
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
@endsection
@push('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script>
        var $fuel = $('#fuel'), $engine = $('#engine'), $battery = $('#battery');
        $fuel.change(function () {
            if ($fuel.val() == '0' || $fuel.val() == '1' || $fuel.val() == '2') {
                $battery.attr('disabled', 'disabled').val('');
                $engine.removeAttr('disabled');
            } else if ($fuel.val() == '5'){
                $engine.attr('disabled', 'disabled').val('');
                $battery.removeAttr('disabled');
            } else {
                $engine.prop("disabled", false);
                $battery.prop("disabled", false);
            }
        }).trigger('change');

        $('.fa-heart').click(function() {
            $(this).toggleClass('fas far');
        })
        lightbox.option({
            'resizeDuration': 0,
            'wrapAround': true,
            'imageFadeDuration': 0
        })
    </script>
@endpush
@push('css')
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <style>
        .thumbnail{
            border-right: 1px solid #fff;
            border-top: 1px solid #fff;
            display: block;
            float: left;
            height: 70px;
            overflow: hidden;
            position: relative;
            width: 25%;
            padding-left:0px;
            padding-right:0px;
        }
        .thumbnail img{
            width: 100%;
        }
        .mainPhoto{
            height: 500px; width: 200px; overflow: hidden;object-fit: cover;
        }
    </style>
@endpush
