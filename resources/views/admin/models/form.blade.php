@extends('layouts.admin')

@section('title', 'Models')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($car_model))
                    Edit existing model for {{$car_make->name}}
                @else
                    Create new model for {{$car_make->name}}
                @endif
            </h6>
        </div>
        <div class="card-body">
            @if(isset($car_model))
                {!! Form::model($car_model, ['url' => ['admin/models', $car_model->id], 'method' => 'patch', 'class' => 'needs-validation', 'id'=>'modelsForm']) !!}
            @else
                {!! Form::open(['url' => ['admin/models'], 'class' => 'needs-validation', 'id'=>'modelsForm']) !!}
            @endif

            <input hidden required="required" name="make" value="{{$car_make->id}}">
            <div class="form-group">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#modelsForm").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 20,
                    }
                },
                messages: {
                    name: {
                        required: "Name is required",
                        maxlength: "Name cannot be more than 20 characters"
                    }
                }
            });
        });
    </script>
@endsection
