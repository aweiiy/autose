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


                <div class="row" id="btn_compare" style="display:none; ">
                    <div class="col-sm-12" style="margin-top: 50px;">
                            <input type="hidden" value="" id="list_one" name="list_one"/>
                            <input type="hidden" value="" id="list_two" name="list_two"/>
                        <button id="sendComparison" class="btn btn-success" style="float:right;"> Compare listings</button>
                    </div>
                </div>

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
                                <a href="javascript:void(0);" class="add_to_comparison btn btn-outline-primary btn-md" data-id="{{$item->car_listing->id}}" id="compare_{{$item->car_listing->id}}" style="padding: 10px">
                                    <i class="fa-solid fa-scale-balanced"></i> Compare
                                </a>
                                <a href="{{ url('listings/'.$item->car_listing->id) }}" class="btn btn-outline-secondary btn-md" style="padding: 10px"><i class="fas fa-eye"></i> View</a>
                                {!! Form::open(['method'=>'DELETE', 'url' => ['wishlist', $item->id], 'style' => 'display:inline;']) !!}
                                {!! Form::button('<i class="fas fa-heart fa-2x"></i>', ['style' => 'color: red; border-style: none', 'type' => 'submit', 'onclick'=>"return confirm('Are you sure you want to delete?')"]) !!}
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
                console.log($(this).data('id'));
                var listing_id = $(this).data('id');
                var comparingNow = $('.comparing').length;

                if(comparingNow > 1){
                    if($('#compare_'+listing_id).hasClass('comparing')){
                        $('#compare_'+listing_id).removeClass('comparing');
                        $('#compare_'+listing_id).removeClass('btn-outline-danger');
                        $('#compare_'+listing_id).addClass('btn-outline-primary');
                        $('#compare_'+listing_id).html('<i class="fa-solid fa-scale-balanced"></i> Compare');
                        if($('#list_one').val() == listing_id){
                            $('#list_one').val('');
                        }else if($('#list_two').val() == listing_id){
                            $('#list_two').val('');
                        }
                        if ($('.comparing').length < 2) {
                            $('#btn_compare').hide();
                        }
                }else{
                        alert('You can only compare two listings at a time');
                    }
                }
                else {
                    if (comparingNow > 0) {
                        $('#btn_compare').show();
                    }
                    if ($('#compare_' + listing_id).hasClass('comparing')) {
                        $('#compare_' + listing_id).removeClass('comparing');
                        $('#compare_' + listing_id).removeClass('btn-outline-danger');
                        $('#compare_' + listing_id).addClass('btn-outline-primary');
                        $('#compare_' + listing_id).html('<i class="fa-solid fa-scale-balanced"></i> Compare');
                        if($('#list_one').val() == listing_id){
                            $('#list_one').val('');
                        }else if($('#list_two').val() == listing_id){
                            $('#list_two').val('');
                        }
                        if ($('.comparing').length < 2) {
                            $('#btn_compare').hide();
                        }
                    } else {
                        $('#compare_' + listing_id).addClass('comparing');

                        if ($('#list_one').val() == '') {
                            $('#list_one').val(listing_id);
                            $('#compare_' + listing_id).removeClass('btn-outline-primary');
                            $('#compare_' + listing_id).addClass('btn-outline-danger');
                            $('#compare_' + listing_id).html('<i class="fa-solid fa-times"></i> Remove from comparison');
                        } else if ($('#list_two').val() == '') {
                            $('#list_two').val(listing_id);
                            $('#compare_' + listing_id).removeClass('btn-outline-primary');
                            $('#compare_' + listing_id).addClass('btn-outline-danger');
                            $('#compare_' + listing_id).html('<i class="fa-solid fa-times"></i> Remove from comparison');
                        }
                    }
                }

            });
            $(document).on('click','#sendComparison', function(e){
                e.preventDefault();
                var list_one = $('#list_one').val();
                var list_two = $('#list_two').val();
                var token="{{csrf_token()}}";
                $.ajax({
                    url: "{{route('sendComparison')}}",
                    type: "POST",
                    data: {
                        list_one: list_one,
                        list_two: list_two,
                        _token: token
                    },
                    success: function (data) {
                        console.log(data);
                        if(data.status == 'success'){
                            $('#btn_compare').hide();
                            $('#list_one').val('');
                            $('#list_two').val('');
                            $('#compare_'+list_one).removeClass('comparing');
                            $('#compare_'+list_one).removeClass('btn-outline-danger');
                            $('#compare_'+list_one).addClass('btn-outline-primary');
                            $('#compare_'+list_one).html('<i class="fa-solid fa-scale-balanced"></i> Compare');
                            $('#compare_'+list_two).removeClass('comparing');
                            $('#compare_'+list_two).removeClass('btn-outline-danger');
                            $('#compare_'+list_two).addClass('btn-outline-primary');
                            $('#compare_'+list_two).html('<i class="fa-solid fa-scale-balanced"></i> Compare');
                            $('#list_one').val('');
                            $('#list_two').val('');
                            $("#exampleModal .modal-body").html(data.html);
                            $("#exampleModal").modal('show');
                        }
                    }
                });
            });
        });
    </script>
@endpush
