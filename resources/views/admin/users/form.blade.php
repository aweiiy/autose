@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($user))
                    Edit exist user
                @else
                    Create new user
                @endif
            </h6>
        </div>
        <div class="card-body">
            @if(isset($user))
                {!! Form::model($user, ['url' => ['admin/users', $user->id], 'method' => 'patch', 'class' => 'needs-validation', 'id'=>'userForm']) !!}
            @else
                {!! Form::open(['url' => 'admin/users', 'class' => 'needs-validation', 'id'=>'userForm']) !!}
            @endif

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
            @if(!isset($user))
                <div class="form-group">
                    {!! Form::label('password', 'Password: ', ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-6">
                        {!! Form::password('password', ['class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirm password: ', ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-6">
                        {!! Form::password('password_confirmation', ['class' => 'form-control'.($errors->has('password_confirmation') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                        {!! $errors->first('password_confirmation', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <span class="text-danger">@error('password_confirmation') {{$message}} @enderror</span>
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('role', 'Role: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!!Form::select('role', $roles, isset($user) ? $user->role : null, ['class' => 'form-control', 'name' => 'role', 'required' => 'required'])!!}
                    {!! $errors->first('role', '<div class="invalid-feedback">:message</div>') !!}
                    <span class="text-danger">@error('role') {{$message}} @enderror</span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#userForm").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 20,
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    password_confirm: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
                    }
                },
                messages: {
                    name: {
                        required: "Name is required",
                        maxlength: "Name cannot be more than 20 characters"
                    },
                    email: {
                        required: "Email is required",
                        email: "Email must be a valid email address",
                        maxlength: "Email cannot be more than 50 characters",
                    },
                    password: {
                        required: "Password is required",
                        minlength: "Password must be at least 8 characters"
                    }
                }
            });
        });
    </script>
@endsection
