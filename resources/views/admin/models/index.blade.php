@extends('layouts.admin')

@section('title', 'Makes')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('admin/makes/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add make</a>
        </div>
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
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($car_models as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ url('admin/users/'.$item->id.'/edit') }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="{{ url('admin/users/'.$item->id) }}" class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i> View</a>
                                {!! Form::open(['method'=>'DELETE', 'url' => ['admin/users', $item->id], 'style' => 'display:inline']) !!}
                                {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit','onClick'=>'confirmReq()']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $car_models->links() }}
            </div>
        </div>
    </div>
    <script>
        function confirmReq() {
            if (confirm("Do you really want to delete?")) {
            } else {
                event.preventDefault();
            }
        }
    </script>
@endsection
