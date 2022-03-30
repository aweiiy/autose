<div class="container pb-5 mb-2">
    <div class="comparison-table">
        <table class="table table-bordered">
            <thead class="bg-secondary">
            <tr>
                <td class="align-bottom">
                    <select class="form-control custom-select" id="compare-criteria" data-filter="trigger">
                        <option value="all">Comparison criteria *</option>
                        <option value="general">General</option>
                        <option value="engine">Engine</option>
                        <option value="other">Other</option>
                        <option value="contacts">Contacts</option>
                    </select><small class="form-text text-muted">* Choose criteria to filter table below.</small>
                </td>
                <td>
                    <!-- Start carousel -->
                    <div id="listing1Controls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($listing1->images as $slider)
                                <div class="carousel-item {{$loop->first ? 'active' : '' }}">
                                    <img src="{{url('listing_images', $slider->name)}}" class="d-block w-100"  alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#listing1Controls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#listing1Controls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- End carousel -->
                    <div class="comparison-item">
                        <a class="comparison-item-title" href="listings/{{$listing1->id}}">{{$listing1->car_make->name}} {{$listing1->car_model->name}} {{$listing1->year}}</a>
                        <p>Phone number: <strong>{{$listing1->phone_number}}</strong></p>
                        <button class="btn btn-pill btn-outline-primary btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">Email owner</button>
                    </div>
                </td>
                <td>
                    <!-- Start carousel -->
                    <div id="listing2Controls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($listing2->images as $slider)
                                <div class="carousel-item {{$loop->first ? 'active' : '' }}">
                                    <img src="{{url('listing_images', $slider->name)}}" class="d-block w-100"  alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#listing2Controls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#listing2Controls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- End carousel -->
                    <div class="comparison-item">
                        <a class="comparison-item-title" href="listings/{{$listing2->id}}">{{$listing2->car_make->name}} {{$listing2->car_model->name}} {{$listing2->year}}</a>
                        <p>Phone number: <strong>{{$listing2->phone_number}}</strong></p>
                        <button class="btn btn-pill btn-outline-primary btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">Email owner</button>
                    </div>
                </td>
            </tr>
            </thead>
            <tbody id="general" data-filter="target">
            <tr class="bg-secondary">
                <th class="text-uppercase">Summary</th>
                <td><span class="text-dark"><strong>{{$listing1->car_make->name}} {{$listing1->car_model->name}} {{$listing1->year}}</strong></span></td>
                <td><span class="text-dark"><strong>{{$listing2->car_make->name}} {{$listing2->car_model->name}} {{$listing2->year}}</strong></span></td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{$listing1->price}} EUR</td>
                <td>{{$listing2->price}} EUR</td>
            </tr>
            <tr>
                <th>Manufacturing Year</th>
                <td>{{$listing1->year}}</td>
                <td>{{$listing2->year}}</td>
            </tr>
            <tr>
                <th>Mileage</th>
                <td>{{$listing1->mileage}} km</td>
                <td>{{$listing2->mileage}} km</td>
            </tr>
            <tr>
                <th>Body Type</th>
                <td>{{$listing1->car_body_type->name}}</td>
                <td>{{$listing2->car_body_type->name}}</td>
            </tr>
            <tr>
                <th>Transmission</th>
                <td>{{$listing1->transmission->name}}</td>
                <td>{{$listing2->transmission->name}}</td>
            </tr>
            <tr>
                <th>VIN</th>
                <td>{{$listing1->vin}}</td>
                <td>{{$listing2->vin}}</td>
            </tr>
            </tbody>
            <tbody id="engine" data-filter="target">
            <tr class="bg-secondary">
                <th class="text-uppercase">Engine</th>
                <td><span class="text-dark"><strong>{{$listing1->car_make->name}} {{$listing1->car_model->name}} {{$listing1->year}}</strong></span></td>
                <td><span class="text-dark"><strong>{{$listing2->car_make->name}} {{$listing2->car_model->name}} {{$listing2->year}}</strong></span></td>
            </tr>
            <tr>
                <th>Fuel type</th>
                <td>{{$listing1->fuel_type->name}}</td>
                <td>{{$listing2->fuel_type->name}}</td>
            </tr>
            <tr>
                <th>Engine cubic capacity</th>
                <td>{{$listing1->engine_capacity}} cm<sup>3</sup></td>
                <td>{{$listing2->engine_capacity}} cm<sup>3</sup></td>
            </tr>
            <tr>
                <th>Engine power</th>
                <td>{{$listing1->engine_power}} kW</td>
                <td>{{$listing2->engine_power}} kW</td>
            </tr>
            <tr>
                <th>Battery capacity</th>
                <td>{{$listing1->battery_capacity}} kWh</td>
                <td>{{$listing2->battery_capacity}} kWh</td>
            </tr>
            </tbody>
            <tbody id="other" data-filter="target">
            <tr class="bg-secondary">
                <th class="text-uppercase">Other</th>
                <td><span class="text-dark"><strong>{{$listing1->car_make->name}} {{$listing1->car_model->name}} {{$listing1->year}}</strong></span></td>
                <td><span class="text-dark"><strong>{{$listing2->car_make->name}} {{$listing2->car_model->name}} {{$listing2->year}}</strong></span></td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$listing1->description}}</td>
                <td>{{$listing2->description}}</td>
            </tr>
            <tr>
                <th>Listing created:</th>
                <td>{{$listing1->created_at}}</td>
                <td>{{$listing2->created_at}}</td>
            </tr>

            </tbody>
            <tbody id="contacts" data-filter="target">
            <tr class="bg-secondary">
                <th class="text-uppercase">Contacts</th>
                <td><span class="text-dark"><strong>{{$listing1->car_make->name}} {{$listing1->car_model->name}} {{$listing1->year}}</strong></span></td>
                <td><span class="text-dark"><strong>{{$listing2->car_make->name}} {{$listing2->car_model->name}} {{$listing2->year}}</strong></span></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{$listing1->phone_number}}</td>
                <td>{{$listing2->phone_number}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$listing1->email}}</td>
                <td>{{$listing2->email}}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{$listing1->city->name}}</td>
                <td>{{$listing2->city->name}}</td>
            </tr>
            </tbody>
            <tr>
                <th></th>
                <td>
                    <button class="btn btn-outline-primary btn-block" type="button">Email owner</button>
                </td>
                <td>
                    <button class="btn btn-outline-primary btn-block" type="button">Email owner</button>
                </td>
            </tr>
        </table>
    </div>
</div>
<style>
    .comparison-table {
        width: 100%;
        font-size: .875rem;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar
    }

    .comparison-table table {
        min-width: 41rem;
        table-layout: fixed
    }

    .comparison-table table tbody+tbody {
        border-top-width: 1px
    }

    .comparison-table .table-bordered thead td {
        border-bottom-width: 1px
    }

    .comparison-table .comparison-item {
        position: relative;
        padding: .875rem .75rem 1.125rem;
        border: 1px solid #e7e7e7;
        background-color: #fff;
        text-align: center
    }

    .comparison-table .comparison-item .comparison-item-thumb {
        display: block;
        width: 5rem;
        margin-right: auto;
        margin-bottom: .75rem;
        margin-left: auto
    }

    .comparison-table .comparison-item .comparison-item-thumb>img {
        display: block;
        width: 100%
    }

    .comparison-table .comparison-item .comparison-item-title {
        display: block;
        width: 100%;
        margin-bottom: 14px;
        color: #222;
        font-weight: 600;
        text-decoration: none
    }

    .comparison-table .comparison-item .comparison-item-title:hover {
        text-decoration: underline
    }

    .comparison-table .comparison-item .btn {
        margin: 0
    }

    .comparison-table .comparison-item .remove-item {
        display: block;
        position: absolute;
        top: -.3125rem;
        right: -.3125rem;
        width: 1.375rem;
        height: 1.375rem;
        border-radius: 50%;
        background-color: #f44336;
        color: #fff;
        text-align: center;
        cursor: pointer
    }

    .comparison-table .comparison-item .remove-item .feather {
        width: .875rem;
        height: .875rem
    }
    .comparison-table .table-bordered th, .table-bordered td {
        border: 1px solid #e7e7e7;
    }
    .comparison-table .bg-secondary {
        background-color: #f7f7f7 !important;
    }
</style>
<script type="text/javascript">
    $(function(){
        $('[data-filter="trigger"]').on("change", function() {
            var t = $(this).find("option:selected").val().toLowerCase();

            $('[data-filter="target"]').css("display", "none");
            $("#" + t).css("display", "table-row-group");
            if(t == "all") {
                $('[data-filter="target"]').css("display", "table-row-group")
            }
            $(this).css("display", "block");
        });
    })
</script>
