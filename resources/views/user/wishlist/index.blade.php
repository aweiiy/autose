@extends('layouts.profile')

@section('content-profile')
    <h1>Wishlist</h1>
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
    <div class="modal fade" id="listingModal" tabindex="-1" aria-labelledby="listingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="listingModalLabel">Comparison</h5>
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
            <div class="col-sm-12">
                <button id="sendComparison" class="btn btn-success" style="float:left"> Compare listings</button>
            </div>
        </div>
    @else
        <div class="row" id="btn_compare" style="display:none; ">
            <div class="col-sm-12">
                <button id="sendComparison" class="btn btn-success" style="float:left"> Compare listings</button>
            </div>
        </div>
    @endif
    @forelse($wishlist as $item)
        @if(is_null($item->car_listing))
            <div class="mt-20" style="border-bottom: 1px solid black">
                <div class="row p-lg-3 p-sm-5 p-4">
                    <div class="col-lg-4 align-self-center">
                        <img src="{{ asset('images/no-image.png') }}" class="fitToSize img-fluid img-thumbnail rounded">
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <div class="ad-listing-content">
                                    <div>{{$item->year}}</div>
                                    <div class="h3">
                                        <strong>{{ $item->name }}</strong>
                                    </div>
                                    <h2 class="pr-5">{{ $item->price}} EUR</h2>
                                    <br>
                                    <p>(Listing deleted)</p>
                                </div>
                            </div>
                            <div class="col-lg-1 align-self-center">
                            </div>
                            <div class="border-top border-light mt-3 pt-3">
                                <div class="row g-2">
                                    <div class="col me-sm-1">
                                        <div class=" rounded text-center w-100 h-100 p-2">
                                    <span>
                                        {!! Form::open(['method'=>'DELETE', 'url' => ['wishlist', $item->id], 'style' => 'display:inline;']) !!}
                                        {!! Form::button('<i class="fas fa-heart-broken fa-2x"></i>', ['style' => 'color: red; border-style: none', 'type' => 'submit', 'onclick'=>"return confirm('Are you sure you want to delete?')"]) !!}
                                        {!! Form::close() !!}
                                    </span>
                                        </div>
                                    </div>
                                    <div class="col me-sm-1">
                                        <div class=" rounded text-center w-100 h-100 p-2">
                                    <span>
                                       @if(\Illuminate\Support\Facades\Session::get('list1') == $item->car_listing_id || \Illuminate\Support\Facades\Session::get('list2') == $item->car_listing_id)
                                            <a href="javascript:void(0);" class="add_to_comparison btn btn-outline-danger btn-md comparing" data-id="{{$item->car_listing_id}}" id="compare_{{$item->car_listing_id}}">
                                        <i class="fa-solid fa-times"></i> Remove from comparison
                                            </a>
                                        @endif
                                    </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class=" rounded text-center w-100 h-100 p-2">
                                    <span>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @continue
        @endif
        <div class="mt-20" style="border-bottom: 1px solid black">
            <div class="row p-lg-3 p-sm-5 p-4">
                <div class="col-lg-4 align-self-center">
                    <a href="{{ url('listings/'.$item->car_listing->id) }}">
                        @foreach($item->car_listing->images as $image)
                            <img src="{{url('listing_images/'.$image->name)}}" class="fitToSize img-fluid rounded">
                            @break
                        @endforeach
                    </a>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-10 col-md-10">
                            <div class="ad-listing-content">
                                <div>{{$item->car_listing->year}}</div>
                                <div class="h3">
                                    <strong>{{ $item->car_listing->car_make->name }} {{ $item->car_listing->car_model->name }} </strong>
                                </div>
                                @if($item->car_listing->price - $item->price < 0)
                                    <h2 style="color: green;">{{ $item->car_listing->price}} EUR </h2><p>(Old price: {{ $item->price}} EUR)</p>
                                @elseif($item->car_listing->price - $item->price > 0)
                                    <h2 style="color: red;">{{ $item->car_listing->price}} EUR </h2><p>(Old price: {{ $item->price}} EUR)</p>
                                @else
                                    <h2>{{ $item->car_listing->price}} EUR</h2>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-1 align-self-center">
                        </div>
                        <div class="border-top border-light mt-3 pt-3">
                            <div class="row g-2">
                                <div class="col me-sm-1">
                                    <div class=" rounded text-center w-100 h-100 p-2">
                                    <span>
                                         @if(\Illuminate\Support\Facades\Session::get('list1') == $item->car_listing->id || \Illuminate\Support\Facades\Session::get('list2') == $item->car_listing->id)
                                            <a href="javascript:void(0);" class="add_to_comparison btn btn-outline-danger btn-md comparing" data-id="{{$item->car_listing->id}}" id="compare_{{$item->car_listing->id}}">
                                        <i class="fa-solid fa-times"></i> Remove from comparison
                                    </a>
                                        @else
                                            <a href="javascript:void(0);" class="add_to_comparison btn btn-outline-primary btn-md" data-id="{{$item->car_listing->id}}" id="compare_{{$item->car_listing->id}}">
                                        <i class="fa-solid fa-scale-balanced"></i> Compare
                                    </a>
                                        @endif
                                    </span>
                                    </div>
                                </div>
                                <div class="col me-sm-1">
                                    <div class=" rounded text-center w-100 h-100 p-2">
                                    <span>
                                        <a href="{{ url('listings/'.$item->car_listing->id) }}" class="btn btn-outline-secondary btn-md"><i class="fas fa-eye"></i> View</a>
                                    </span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class=" rounded text-center w-100 h-100 p-2">
                                    <span>
                                        {!! Form::open(['method'=>'DELETE', 'url' => ['wishlist', $item->id], 'style' => 'display:inline;']) !!}
                                        {!! Form::button('<i class="fas fa-heart-broken fa-2x"></i>', ['style' => 'color: red; border-style: none', 'type' => 'submit', 'onclick'=>"return confirm('Are you sure you want to delete?')"]) !!}
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
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info">
                    <strong>No items in your wishlist.</strong>
                </div>
            </div>
        </div>
    @endforelse
    {{ $wishlist->links() }}

@endsection
@push('javascript')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.add_to_comparison', function (e) {
                e.preventDefault();
                var listing_id = $(this).data('id');
                if ($('#compare_' + listing_id).hasClass('comparing')) {
                    $('#compare_' + listing_id).removeClass('comparing');
                    $('#compare_' + listing_id).removeClass('btn-outline-danger');
                    $('#compare_' + listing_id).addClass('btn-outline-primary');
                    $('#compare_' + listing_id).html('<i class="fa-solid fa-scale-balanced"></i> Compare');
                    $.ajax({
                        url: '{{route('remove_compare')}}',
                        type: 'POST',
                        data: {
                            listing_id: listing_id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            console.log(data);
                            if (data.count > 1) {
                                $('#btn_compare').show();
                            } else {
                                $('#btn_compare').hide();
                            }
                            if (data.err) {
                                alert(data['err']);
                            }
                        }
                    });
                } else {
                    $('#compare_' + listing_id).addClass('comparing');
                    $.ajax({
                        url: '{{route('add_compare')}}',
                        type: 'POST',
                        data: {
                            'listing_id': listing_id,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            if (data.err) {
                                $('#compare_' + listing_id).removeClass('comparing');
                                alert(data['err']);
                            } else {
                                $('#compare_' + listing_id).removeClass('btn-outline-primary');
                                $('#compare_' + listing_id).addClass('btn-outline-danger');
                                $('#compare_' + listing_id).html('<i class="fa-solid fa-times"></i> Remove from comparison');
                                if (data.count > 1) {
                                    $('#btn_compare').show();
                                    $('html, body').animate({
                                        scrollTop: 0
                                    }, 'slow');
                                }
                            }
                        }
                    });
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
                            $("#listingModal .modal-body").html(data.html);
                            $("#listingModal").modal('show');
                        }
                    }
                });
            });
        });
    </script>
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
