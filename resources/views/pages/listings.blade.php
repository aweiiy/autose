@extends('layouts.app')

@section('title', 'Listings')

@section('content')
    <div class="container mt-5 mb-md-4 py-5">
        <div class="row py-md-1">
            <!-- Filers sidebar (Offcanvas on mobile)-->
            <div class="col-lg-3 pe-xl-4">

            </div>
            <!-- Catalog list view-->
            <div class="col-lg-9">
                <!-- Breadcrumb-->
                <nav class="mb-3 pt-md-2 pt-lg-4" aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="car-finder-home.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Used cars</li>
                    </ol>
                </nav>
                <!-- Page title-->
                <div class="d-flex align-items-center justify-content-between pb-4 mb-2">
                    <h1 class=" me-3 mb-0">Used cars</h1>
                    <div class=""><i class="fi-car fs-lg me-2"></i><span class="align-middle">249 offers</span></div>
                </div>
                <!-- Sorting + View-->
                <div class="d-sm-flex align-items-center justify-content-between pb-4 mb-2">
                    <div class="d-flex align-items-center me-sm-4">
                        <label class="fs-sm  me-2 pe-1 text-nowrap" for="sorting1"><i class="fi-arrows-sort mt-n1 me-2"></i>Sort by:</label>
                        <select class="form-select form-select-light form-select-sm me-sm-4" id="sorting1">
                            <option>Newest</option>
                            <option>Popular</option>
                            <option>Price: Low - High</option>
                            <option>Price: Hight - Low</option>
                        </select>
                        <div class="d-none d-md-block border-end border-light" style="height: 1.25rem;"></div>
                        <div class="d-none d-sm-block fw-bold  opacity-70 text-nowrap ps-md-4"><i class="fi-switch-horizontal me-2"></i><span class="align-middle">Compare (0)</span></div>
                    </div>
                    <div class="d-none d-sm-flex"><a class="nav-link nav-link-light px-2 active" href="car-finder-catalog-list.html" data-bs-toggle="tooltip" title="" data-bs-original-title="List view" aria-label="List view"><i class="fi-list"></i></a><a class="nav-link nav-link-light px-2" href="car-finder-catalog-grid.html" data-bs-toggle="tooltip" title="" data-bs-original-title="Grid view" aria-label="Grid view"><i class="fi-grid"></i></a></div>
                </div>
                <!-- Item-->
                <div class="card card-light card-hover card-horizontal mb-4">
                    <div class="card-img-top card-img-hover">
                        <img src="/images/errorCar.jpg">
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between pb-1"><span class="fs-sm  me-3">1995</span>
                            <div class="form-check form-check-light">
                                <input class="form-check-input" type="checkbox" id="compare1">
                                <label class="form-check-label fs-sm" for="compare1">Compare</label>
                            </div>
                        </div>
                        <h3 class="h6 mb-1"><a class="nav-link-light" href="car-finder-single.html">Ford Truck Lifted</a></h3>
                        <div class="text-primary fw-bold mb-1">$24,000</div>
                        <div class="fs-sm  opacity-70"><i class="fi-map-pin me-1"></i>Chicago</div>
                        <div class="border-top border-light mt-3 pt-3">
                            <div class="row g-2">
                                <div class="col me-sm-1">
                                    <div class="bg-black rounded text-center w-100 h-100 p-2"><i class="fi-dashboard d-block h4  mb-0 mx-center"></i><span class="fs-xs text-light ">278K mi</span></div>
                                </div>
                                <div class="col me-sm-1">
                                    <div class="bg-dark rounded text-center w-100 h-100 p-2"><i class="fi-gearbox d-block h4  mb-0 mx-center"></i><span class="fs-xs text-light">Manual</span></div>
                                </div>
                                <div class="col">
                                    <div class="bg-dark rounded text-center w-100 h-100 p-2"><i class="fi-petrol d-block h4  mb-0 mx-center"></i><span class="fs-xs text-light">Diesel</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sorting + Pagination-->
                    <nav aria-label="Pagination">
                        <ul class="pagination pagination-light mb-0">
                            <li class="page-item d-sm-none text-nowrap"><span class="page-link page-link-static">1 / 5</span></li>
                            <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                            <li class="page-item d-none d-sm-block">...</li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">8</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="fi-chevron-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
