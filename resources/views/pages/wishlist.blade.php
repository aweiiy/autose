@extends('layouts.app')

@section('title', 'Wishlist')

@section('content')
    <style>
        .fitToSize{
            height: 200px;
            position: relative;
            width: 300px;
            object-fit: cover;
        }
    </style>
    <div class="card">
        <div class="card-body">
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

            <div class="table-responsive">
                @if($wishlist->count() > 0)
                    <h1>Wishlist</h1>
                <table class="table table-bordered table-striped align-middle table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wishlist as $item)
                        <tr onclick="window.location='{{ url('listings/'.$item->car_listing->id) }}';" style="cursor: pointer">
                            @foreach($item->car_listing->images as $image)
                                <td class="w-25"><img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid img-thumbnail"></td>
                                @break
                            @endforeach
                            <td>{{ $item->car_listing->car_make->name}} {{$item->car_listing->car_model->name}} {{$item->car_listing->car_body_type->name}} {{$item->car_listing->year}}</td>
                            <td>{{ $item->car_listing->price}} EUR</td>
                            <td>
                                <a href="{{ url('listings/'.$item->car_listing->id) }}" class="btn btn-outline-secondary btn-sm" style="padding: 10px"><i class="fas fa-eye"></i> View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <h4>There are no products in your wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
