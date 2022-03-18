<!doctype html>
<html lang="en">
<head>
    <title>User Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>

        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            font-family: 'Poppins', sans-serif;
        }

        label.error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container pt-3">
    <form action="{{route('login-user')}}" method="POST" autocomplete="off" id="regForm">
        @csrf
        <div class="row">
            <div class="col-xl-8 m-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="text-center font-weight-bold"> User Login </h4>
                    </div>

                    <div class="card-body">

                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif


                            <div>
                                <div class="form-group">
                                    <label for="email"> Email </label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                                </div>
                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                <div class="form-group">
                                    <label for="password"> Password </label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                                </div>
                                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                <div class="container">
                                    <div class="row">
                                        <div>
                                            <button type="submit" class="btn btn-primary"> Login </button>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <a href="register">New user? Click here</a>
                                    </div>
                                </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#regForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Enter your email",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },
                password: {
                    required: "Enter your password"
                }
            }
        });
    });
</script>
</body>
</html>
