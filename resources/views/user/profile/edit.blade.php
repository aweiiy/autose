@extends('layouts.profile')

@section('content-profile')
    <div class="d-flex flex-column align-items-left text-left">
        <div class="mt-3">
            <h1>Edit Personal Information</h1>
        </div>
    </div>
    <hr class="my-4">
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
    <div class="row align-items-center">
        {!! Form::model($user, ['url' => ['profile'], 'method' => 'patch', 'enctype'=>'multipart/form-data','id'=>'editForm']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::email('email', null, ['class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
        <div class="form-group">
            {!! Form::label('phone_number', 'Phone number: ', ['class' => 'col-sm-3']) !!}
            <div class="col-sm-6">
                {!! Form::number('phone_number', null, ['class' => 'form-control', 'required' => 'required', 'type'=>'tel', 'placeholder'=>'+370 XXXXXXX']) !!}
                {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <span class="text-danger">@error('phone_number') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            {!! Form::label('city_id', 'City: ', ['class' => 'col-sm-3']) !!}
            <div class="col-sm-6">
                {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}
            </div>
            <span class="text-danger">@error('city_id') {{$message}} @enderror</span>
        </div>
        <span class="text-danger">@error('phone_number') {{$message}} @enderror</span>
            <div class="form-group">
                {!! Form::label('image', 'Image: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::file('image', ['class' => 'form-control'.($errors->has('image') ? ' is-invalid' : ''), 'id'=>'imageUpload']) !!}
                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <span class="text-danger">@error('image') {{$message}} @enderror</span>
            <div class="form-group">


                <div class="col-sm-offset-3 col-sm-3 mt-2">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
    </div>
@endsection
        @push('javascript')
            <script>
                document.getElementById('imageUpload').onchange = function (e) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('profile-container').innerHTML = '<img src="' + e.target.result + '" alt="' + '{{ $user->name }}' + '" class="rounded-circle" width="100" height="100">';
                    };
                    reader.readAsDataURL(e.target.files[0]);
                };
            </script>
            <script>
                $(document).ready(function () {
                    $("#editForm").validate({
                        rules: {
                            name: {
                                required: true,
                                minlength: 3
                            },
                            email: {
                                required: true,
                                email: true
                            },
                            phone_number: {
                                required: false,
                                minlength: 6,
                                maxlength: 15
                            },
                            city_id: {
                                required: false
                            },
                            image: {
                                required: false
                            }
                        },
                        messages: {
                            name: {
                                required: "Please enter your name",
                                minlength: "Your name must consist of at least 3 characters"
                            },
                            email: {
                                required: "Please enter your email",
                                email: "Please enter a valid email address"
                            },
                            phone_number: {
                                minlength: "Your phone number must consist of at least 6 characters",
                                maxlength: "Your phone number must consist of at most 15 characters"
                            },
                            city_id: {
                                required: "Please select your city"
                            },
                            image: {
                                required: "Please select your image"
                            }
                        }
                    });
                });
            </script>
        @endpush
        @push('css')
            <style>
                label.error {
                    color: #dc3545;
                    font-size: 14px;
                }
            </style>
    @endpush
