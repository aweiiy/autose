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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Comparison</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                @if(\Illuminate\Support\Facades\Session::get('list1') && \Illuminate\Support\Facades\Session::get('list2'))
                    <div class="row" id="btn_compare">
                        <div class="col-sm-12" style="margin-top: 50px;">
                            <button id="sendComparison" class="btn btn-success" style="float:right;"> Compare listings</button>
                        </div>
                    </div>
                @else
                    <div class="row" id="btn_compare" style="display:none; ">
                        <div class="col-sm-12" style="margin-top: 50px;">
                            <button id="sendComparison" class="btn btn-success" style="float:right;"> Compare listings</button>
                        </div>
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
                        <tr>
                            @foreach($item->car_listing->images as $image)
                                <td class="w-25"><img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid img-thumbnail"></td>
                                @break
                            @endforeach
                            <td onclick="window.location='{{ url('listings/'.$item->car_listing->id) }}';" style="cursor: pointer">{{ $item->car_listing->car_make->name}} {{$item->car_listing->car_model->name}} {{$item->car_listing->car_body_type->name}} {{$item->car_listing->year}}</td>
                            @if($item->car_listing->price - $item->price < 0)
                                    <td><span style="color: green;"><strong>{{ $item->car_listing->price}} EUR</strong> </span><br><span>(Old price: {{ $item->price}} EUR)</span></td>
                            @elseif($item->car_listing->price - $item->price > 0)
                                    <td><span style="color: red;"><strong>{{ $item->car_listing->price}} EUR</strong> </span><br><span>(Old price: {{ $item->price}} EUR)</span></td>
                            @else
                                    <td><span><strong>{{ $item->car_listing->price}} EUR</strong></span></td>
                                @endif
                            <td>
                                @if(\Illuminate\Support\Facades\Session::get('list1') == $item->car_listing->id || \Illuminate\Support\Facades\Session::get('list2') == $item->car_listing->id)
                                    <a href="javascript:void(0);" class="add_to_comparison btn btn-outline-danger btn-md comparing" data-id="{{$item->car_listing->id}}" id="compare_{{$item->car_listing->id}}" style="padding: 10px">
                                        <i class="fa-solid fa-times"></i> Remove from comparison
                                    </a>
                                @else
                                    <a href="javascript:void(0);" class="add_to_comparison btn btn-outline-primary btn-md" data-id="{{$item->car_listing->id}}" id="compare_{{$item->car_listing->id}}" style="padding: 10px">
                                        <i class="fa-solid fa-scale-balanced"></i> Compare
                                    </a>
                                @endif
                                <a href="{{ url('listings/'.$item->car_listing->id) }}" class="btn btn-outline-secondary btn-md" style="padding: 10px"><i class="fas fa-eye"></i> View</a>
                                {!! Form::open(['method'=>'DELETE', 'url' => ['wishlist', $item->id], 'style' => 'display:inline;']) !!}
                                {!! Form::button('<i class="fas fa-heart-broken fa-2x"></i>', ['style' => 'color: red; border-style: none', 'type' => 'submit', 'onclick'=>"return confirm('Are you sure you want to delete?')"]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    {{ $wishlist->links() }}
                @else
                    <h4>There are no products in your wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <script>
        $(document).ready(function () {
            $(document).on('click','.add_to_comparison', function(e){
                e.preventDefault();
                var listing_id = $(this).data('id');
                var comparingNow = $('#compNum').text();
                if(comparingNow > 1){
                    if($('#compare_'+listing_id).hasClass('comparing')){
                        $('#compare_'+listing_id).removeClass('comparing');
                        $('#compare_'+listing_id).removeClass('btn-outline-danger');
                        $('#compare_'+listing_id).addClass('btn-outline-primary');
                        $('#compare_'+listing_id).html('<i class="fa-solid fa-scale-balanced"></i> Compare');
                        $.ajax({
                            url: '/ajax/remove_compare',
                            type: 'POST',
                            data: {
                                listing_id: listing_id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (data) {
                                if(data.count > 1){
                                    $('#btn_compare').show();
                                }else{
                                    $('#btn_compare').hide();
                                }
                                if(data.err){
                                    alert(data['err']);

                                }
                            }
                        });
                }else{
                        alert('You can only compare two listings at a time');
                    }
                }
                else {
                    if ($('#compare_' + listing_id).hasClass('comparing')) {
                        $('#compare_' + listing_id).removeClass('comparing');
                        $('#compare_' + listing_id).removeClass('btn-outline-danger');
                        $('#compare_' + listing_id).addClass('btn-outline-primary');
                        $('#compare_' + listing_id).html('<i class="fa-solid fa-scale-balanced"></i> Compare');
                        $.ajax({
                            url: '/ajax/remove_compare',
                            type: 'POST',
                            data: {
                                listing_id: listing_id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (data) {
                                console.log(data);
                                if(data.count > 1){
                                    $('#btn_compare').show();
                                }
                                else{
                                    $('#btn_compare').hide();
                                }
                                if(data.err){
                                    alert(data['err']);
                                }
                            }
                        });
                    } else {
                        $('#compare_' + listing_id).addClass('comparing');
                    $.ajax({
                        url: '/ajax/add_compare',
                        type: 'POST',
                        data: {
                            'listing_id': listing_id,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            if(data.err){
                                $('#compare_' + listing_id).removeClass('comparing');
                                alert(data['err']);
                            }else{
                            $('#compare_' + listing_id).removeClass('btn-outline-primary');
                            $('#compare_' + listing_id).addClass('btn-outline-danger');
                            $('#compare_' + listing_id).html('<i class="fa-solid fa-times"></i> Remove from comparison');
                            if(data.count > 1){
                                $('#btn_compare').show();
                            }
                            }
                        }
                    });
                    }
                }

            });
            $(document).on('click','#sendComparison', function(e){
                e.preventDefault();
                var token="{{csrf_token()}}";
                $.ajax({
                    url: "{{route('sendComparison')}}",
                    type: "POST",
                    data: {
                        _token: token
                    },
                    success: function (data) {
                        console.log(data);
                        if(data.status == 'success'){
                            $("#exampleModal .modal-body").html(data.html);
                            $("#exampleModal").modal('show');
                        }
                    }
                });
            });
        });
    </script>
@endpush
