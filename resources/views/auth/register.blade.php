@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>

        body {
            background: #f7f4e1;
            font-family: 'Poppins', sans-serif;
        }
        label.error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>

<div class="container pt-3">
    <form action="{{route('register-user')}}" method="POST" autocomplete="off" id="regForm">
        @csrf
        <div class="row">
            <div class="col-xl-8 m-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="text-center font-weight-bold"> User Registration </h4>
                    </div>

                    <div class="card-body">

                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            <script>
                                window.setTimeout(function() {
                                    window.location.href = '/login';
                                }, 5000);
                            </script>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif


                        <div class="">
                            <div class="form-group">
                                <label for="name"> Name <span class="text-danger">*</span> </label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                            </div>
                            <span class="text-danger">@error('name') {{$message}} @enderror</span>
                            <div class="form-group">
                                <label for="email"> Email <span class="text-danger">*</span> </label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                            </div>
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                            <div class="form-group">
                                <label for="password"> Password <span class="text-danger">*</span> </label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                            </div>
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                            <div class="form-group">
                                <label for="password_confirmation"> Password Confirmation <span class="text-danger">*</span> </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter password again">
                            </div>
                            <span class="text-danger">@error('password_confirmation') {{$message}} @enderror</span>
                            <div class="container">
                                <div class="row">
                                    <div>
                                        <button type="submit" class="btn btn-primary"> Create your account </button>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <a href="login">Already registered? Click here</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#regForm").validate({
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
                password_confirmation: {
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

