@extends('layouts.app')

@section('title', 'Authors')

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
                <table class="table table-bordered table-striped align-middle table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($mylistings as $item)
                        <tr onclick="window.location='{{ url('mylistings/'.$item->id) }}';" style="cursor: pointer">
                            @foreach($item->images as $image)
                                <td class="w-25"><img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid img-thumbnail"></td>
                                @break
                            @endforeach
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->car_make->name}} {{$item->car_model->name}} {{$item->car_body_type->name}} {{$item->year}}</td>
                            <td>{{ $item->price}} EUR</td>
                            <td>
                                <a href="{{ url('mylistings/'.$item->id) }}" class="btn btn-outline-secondary btn-sm" style="padding: 10px"><i class="fas fa-eye"></i> View</a>
                            </td>
                        </tr>
                        @empty
                            <div><p>You have no listings. <a href="{{ url('/mylistings/create') }}">Add one!</a></p></div>
                    @endforelse
                    </tbody>
                </table>
                {{ $mylistings->links() }}
            </div>
        </div>
    </div>
@endsection
