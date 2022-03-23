@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    @foreach($user as $item)
        {{$item}}
    @endforeach

@endsection
