@extends('layouts.app')

@section('title', 'Listings')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $car_listing->id }}</td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td>{{ $car_listing->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Make</td>
                        <td>{{ $car_listing->car_make->name }}</td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td>{{ $car_listing->car_model->name}}</td>
                    </tr>
                    <tr>
                        <td>Body type</td>
                        <td>{{ $car_listing->car_body_type->name }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $car_listing->description }}</td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td>{{ $car_listing->year }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>{{ $car_listing->price }}</td>
                    </tr>
                    <tr>
                        <td>Phone number</td>
                        <td>{{ $car_listing->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $car_listing->email }}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><img src="{{url('images/listings/'.$car_listing->image)}}" class="img-fluid img-thumbnail" style="width:50%;"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
