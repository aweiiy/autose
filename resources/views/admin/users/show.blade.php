@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit user</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        @if(isset($user->image))
                            <td><img src="{{ asset('profile_images/'.$user->image) }}" alt="{{ $user->name }}" class="img-thumbnail" width="100"></td>
                        @else
                            <td><img src="{{ asset('images/default-profile.jpg') }}" alt="{{ $user->name }}" class="img-thumbnail" width="100"></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                    </tr>
                    <tr>
                        <td>Phone number</td>
                        @if($user->phone_number)
                            <td>{{ $user->phone_number }}</td>
                        @else
                            <td>Not set</td>
                        @endif
                    </tr>
                    <tr>
                        <td>City</td>
                        @if($user->city)
                            <td>{{ $user->city->name }}</td>
                        @else
                            <td>Not set</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>@if($user->role == 0) User @else Admin @endif</td>
                    </tr>
                    <tr>
                        <td>Created at</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
