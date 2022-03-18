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
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <form class="form-group form-group-light d-block">
                        <div class="row g-0 ms-lg-n2">
                            <hr class="hr-light d-lg-none my-2">
                            <div class="col-lg-2 col-md-3 col-sm-6">
                                <div class="dropdown form-control" data-bs-toggle="select">
                                    <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown"><i class="fi-list me-2"></i><span class="dropdown-toggle-label">Make</span></button>
                                    <input type="hidden" name="make">
                                    <ul class="dropdown-menu">
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
                                <div class="dropdown form-control" data-bs-toggle="select">
                                    <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown"><i class="fi-list me-2"></i><span class="dropdown-toggle-label">Model</span></button>
                                    <input type="hidden" name="model">
                                    <ul class="dropdown-menu">
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
                                <div class="dropdown form-control" data-bs-toggle="select">
                                    <button class="btn btn-link dropdown-toggle ps-2 ps-sm-3" type="button" data-bs-toggle="dropdown"><i class="fi-car fs-lg me-2"></i><span class="dropdown-toggle-label">Body type</span></button>
                                    <input type="hidden" name="type">
                                    <ul class="dropdown-menu">
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
                            <hr class="hr-light d-lg-none my-2">
                            <div class="col-lg-2">
                                <button class="btn w-100" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
   Show cars here
@endsection
