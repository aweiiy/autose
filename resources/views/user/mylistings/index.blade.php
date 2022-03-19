@extends('layouts.app')

@section('title', 'Authors')

@section('content')
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
                    <?php $key = 0; ?>
                    @foreach($mylistings as $key=>$item)
                        @if($item->user->id===\App\Models\User::data()->id)
                        <tr onclick="window.location='{{ url('mylistings/'.$item->id) }}';" style="cursor: pointer">
                            <td class="w-25"><img src="{{url('images/listings/'.$item->image)}}" class="img-fluid img-thumbnail"></td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->car_make->name}} </td>
                            <td>{{ $item->price}}</td>
                            <td>
                                <a href="{{ url('mylistings/'.$item->id) }}" class="btn btn-outline-secondary btn-sm" style="padding: 10px"><i class="fas fa-eye"></i> View</a>
                            </td>
                        </tr>
                        <?php $key++ ?>
                        @endif
                    @endforeach
                    @if($key==0)
                        <div><p>You have no listings. <a href="{{ url('/mylistings/create') }}">Add one!</a></p></div>
                    @endif
                    </tbody>
                </table>
                {{ $mylistings->links() }}
            </div>
        </div>
    </div>
@endsection
