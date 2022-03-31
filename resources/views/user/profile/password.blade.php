@extends('layouts.profile')

@section('content-profile')
    <div class="d-flex flex-column align-items-left text-left">
        <div class="mt-3">
            <h1>Account management</h1>
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
    @else
        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                @php
                    Session::forget('error');
                @endphp
            </div>
        @endif
    @endif
    <div class="row align-items-center">
        {!! Form::model($user, ['url' => ['profile/change-password'], 'method' => 'patch']) !!}

        <div class="form-group">
            {!! Form::label('old_password', 'Old password: ', ['class' => 'col-sm-3']) !!}
            <div class="col-sm-6">
                {!! Form::password('old_password', ['class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ''), 'required' => 'required']) !!}
            </div>
            <span class="text-danger">@error('old_password') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password: ', ['class' => 'col-sm-3']) !!}
            <div class="col-sm-6">
                {!! Form::password('password', ['class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ''), 'required' => 'required']) !!}
            </div>
            <span class="text-danger">@error('password') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm password: ', ['class' => 'col-sm-3']) !!}
            <div class="col-sm-6">
                {!! Form::password('password_confirmation', ['class' => 'form-control'.($errors->has('password_confirmation') ? ' is-invalid' : ''), 'required' => 'required']) !!}
            </div>
            <span class="text-danger">@error('password_confirmation') {{$message}} @enderror</span>
        </div>
        <div class="col-sm-offset-3 col-sm-3 mt-2">
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <hr class="my-4">
    <div class="d-flex flex-column align-items-left text-left">
        <div class="mt-1">
            <h2> Delete account</h2>
        </div>
    </div>
        <div class="form-group">
            <div class="col-sm-6">
                {!! Form::open(['method'=>'DELETE', 'url' => ['profile/delete'], 'style' => 'display:inline;']) !!}
                {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', ['class' => 'btn btn-outline-danger btn-xl', 'style' => 'padding: 10px', 'type' => 'submit', 'onclick'=>"return confirm('Are you sure you want to delete your profile?')"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
