@extends('layouts.admin')

@section('title', 'Listings')

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
                        <th>ID</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($listings as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->name}}</td>
                            @foreach($item->images as $image)
                                <td class="w-25"><img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid img-thumbnail"></td>
                                @break
                            @endforeach
                            <td onclick="window.location='{{ url('admin/listings/'.$item->id) }}';" style="cursor: pointer">
                                {{ $item->car_make->name}} {{$item->car_model->name}} {{$item->car_body_type->name}} {{$item->year}}
                            </td>
                            <td>{{ $item->price}} EUR</td>
                            <td>
                                <a href="{{ url('admin/listings/'.$item->id) }}" class="btn btn-outline-secondary btn-sm" style="padding: 10px"><i class="fas fa-eye"></i> View</a>
                                <a href="{{ url('admin/listings/'.$item->id.'/edit') }}" class="btn btn-outline-primary btn-sm" style="padding: 10px"><i class="fas fa-edit"></i> Edit</a>
                                {!! Form::open(['method'=>'DELETE', 'url' => ['admin/listings', $item->id], 'style' => 'display:inline;']) !!}
                                {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', ['class' => 'btn btn-danger btn-sm', 'style' => 'padding: 10px', 'type' => 'submit', 'onclick'=>"return confirm('Are you sure?')"]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @empty
                            <div><p>There are no listings.</p></div>
                    @endforelse
                    </tbody>
                </table>
                {{ $listings->links() }}
            </div>
        </div>
    </div>
@endsection
