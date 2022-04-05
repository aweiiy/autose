@extends('layouts.profile')

@section('content-profile')
    <h1>My listings</h1>
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
    @forelse($mylistings as $item)
        <div class="mt-20" style="border-bottom: 1px solid black">
            <div class="row p-lg-3 p-sm-5 p-4">
                <div class="col-lg-4 align-self-center">
                    <a href="{{ url('listings/'.$item->id) }}">
                        @foreach($item->images as $image)
                            <img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid rounded">
                            @break
                        @endforeach
                    </a>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-10 col-md-10">
                            <div class="ad-listing-content">
                                <div>{{$item->year}}</div>
                                <div class="h3">
                                    <strong>{{ $item->car_make->name }} {{ $item->car_model->name }} </strong>
                                </div>
                                <h2 class="pr-5">{{$item->price}} EUR</h2>
                            </div>
                        </div>
                        <div class="col-lg-1 align-self-center">
                        </div>
                        <div class="border-top border-light mt-3 pt-3">
                            <div class="row g-2">
                                <div class="col me-sm-1">
                                    <div class=" rounded text-center w-100 h-100 p-2">
                                    <span>
                                        <a href="{{ url('listings/'.$item->id) }}" class="btn btn-outline-secondary btn-md"><i class="fas fa-eye"></i> View</a>
                                    </span>
                                    </div>
                                </div>
                                <div class="col me-sm-1">
                                    <div class=" rounded text-center w-100 h-100 p-2">
                                    <span>
                                        <a href="{{ url('mylistings/'.$item->id.'/edit') }}" class="btn btn-outline-primary btn-md"><i class="fas fa-edit"></i> Edit</a>
                                    </span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class=" rounded text-center w-100 h-100 p-2">
                                    <span>
                                        {!! Form::open(['method'=>'DELETE', 'url' => ['mylistings', $item->id], 'style' => 'display:inline;']) !!}
                                        {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', ['class' => 'btn btn-outline-danger btn-md', 'type' => 'submit', 'onclick'=>"return confirm('Are you sure you want to delete?')"]) !!}
                                        {!! Form::close() !!}
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ad listing list  -->
    @empty
        <div><p>You have no listings. <a href="{{ url('/mylistings/create') }}">Add one!</a></p></div>
    @endforelse
    {{ $mylistings->links() }}

@endsection
@push('javascript')

@endpush
@push('css')
    <style>
        .fitToSize{
            height: 200px;
            position: relative;
            width: 300px;
            object-fit: cover;
        }
    </style>
@endpush
