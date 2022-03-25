@extends('layouts.app')

@section('title', 'Search')

@section('banner')
    <section>
        <div class="container pt-5">
            <div class="row  pt-xl-5">
                <div class="col-lg-4  pt-lg-5">
                    <h1 class="display-4 text-black me-md-n5">Autose - Find your dream car</h1>
                    <p class="fs-lg text-black opacity-70">Autose is a digital marketplace for cars. Sell your car or find which one you like. </p>
                </div>
                <div class="col-lg-8"><img class="d-block mt-4 ms-auto" src="images/main-ca.png" width="800" alt="Car"></div>
            </div>
        </div>
    </section>
@endsection

@section('search')

    <div class="container mt-4 mt-sm-3 mt-lg-n3 pb-5 mb-md-4">
        <!-- Form group-->
        <form class="search-group d-block">
            <div class="row g-0 ms-lg-n2">
                <div class="col-lg-2">
                    <div class="input-group border-end-lg"><span class="input-group-text text-muted ps-2 ps-sm-3"><i class="fi-search"></i></span>
                        <input class="form-control" type="text" name="keywords" placeholder="Keywords...">
                    </div>
                </div>
                <hr class="hr-light d-lg-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown border-end-sm border-light" data-bs-toggle="select">
                        <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown"><i class="fi-list me-2"></i><span class="dropdown-toggle-label">Make</span></button>
                        <input type="hidden" name="make">
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Acura</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">BMW</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Citroen</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Lexus</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Mercedes-Benz</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Nissan</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Toyota</span></a></li>
                        </ul>
                    </div>
                </div>
                <hr class="hr-light d-sm-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown border-end-md border-light" data-bs-toggle="select">
                        <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown"><i class="fi-list me-2"></i><span class="dropdown-toggle-label">Model</span></button>
                        <input type="hidden" name="model">
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Altima</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Juke</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Leaf</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Maxima</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Micra</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Murano</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Note</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Patrol</span></a></li>
                        </ul>
                    </div>
                </div>
                <hr class="hr-light d-md-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown border-end-sm border-light" data-bs-toggle="select">
                        <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown"><i class="fi-car fs-lg me-2"></i><span class="dropdown-toggle-label">Body type</span></button>
                        <input type="hidden" name="type">
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Compact</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Crossover</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Coupe</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Family MPV</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Pickup</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Sedan</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">SUV</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Wagon</span></a></li>
                        </ul>
                    </div>
                </div>
                <hr class="hr-light d-sm-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown" data-bs-toggle="select">
                        <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown"><i class="fi-map-pin me-2"></i><span class="dropdown-toggle-label">Location</span></button>
                        <input type="hidden" name="location">
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Dallas</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Chicago</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Houston</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Las Vegas</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Los Angeles</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">New York</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">San Francisco</span></a></li>
                        </ul>
                    </div>
                </div>
                <hr class="hr-light d-lg-none my-2">
                <div class="col-lg-2">
                    <button class="btn btn-primary w-100" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')

@endsection
