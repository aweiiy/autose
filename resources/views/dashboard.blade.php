<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
      referrerpolicy="no-referrer" />


<div class="container mt-5">
    <select class="selectpicker" multiple aria-label="size 3 select example">
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="4">Four</option>
    </select>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div>
    <div class="pb-2 mb-2 mt-1">
        <h1>Filters</h1>
    </div>
    <div class="offcanvas-body py-lg-4">
        <div class="pb-4 mb-2">
            <h3 class="h6 ">Location</h3>
            <select class="form-select form-select-light mb-2">
            </select>
        </div>
        <div class="pb-4 mb-2">
            <h3 class="h6  pt-1">Year</h3>
            <div class="d-flex align-items-center">
                <select class="form-select form-select-light w-100">
                    <option value="" disabled="" selected="">From</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                </select>
                <div class="mx-2">—</div>
                <select class="form-select form-select-light w-100">
                    <option value="" disabled="">To</option>
                    <option value="2022" selected="">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                </select>
            </div>
        </div>
        <div class="pb-4 mb-2">
            <h3 class="h6 ">Make &amp; Model</h3>
            <select class="form-select form-select-light mb-2">
                <option value="" disabled="" selected="">Any make</option>
                <option value="Audi">Audi</option>
                <option value="Lexus">Lexus</option>
                <option value="Mazda">Mazda</option>
                <option value="Mercedes-Benz">Mercedes-Benz</option>
                <option value="Toyota">Toyota</option>
            </select>
            <select class="form-select form-select-light mb-1">
                <option value="" disabled="" selected="">Any model</option>
                <option value="A4">A4</option>
                <option value="A5">A5</option>
            </select>
        </div>
        <div class="pb-4 mb-2">
            <h3 class="h6 ">Price</h3>
            <div class="d-flex align-items-center">
                <input class="form-control form-control-light w-100" type="number" min="0" step="500" placeholder="From">
                <div class="mx-2">—</div>
                <input class="form-control form-control-light w-100" type="number" min="0" step="500" placeholder="To">
            </div>
        </div>
        <div class="pb-4 mb-2">
            <h3 class="h6 ">Fuel Type</h3>
            <div class="form-check form-check-light">
                <input class="form-check-input" type="checkbox" id="diesel">
                <label class="form-check-label fs-sm" for="diesel">Diesel</label>
            </div>
            <div class="form-check form-check-light">
                <input class="form-check-input" type="checkbox" id="petrol">
                <label class="form-check-label fs-sm" for="petrol">Gasoline</label>
            </div>
            <div class="form-check form-check-light">
                <input class="form-check-input" type="checkbox" id="electric">
                <label class="form-check-label fs-sm" for="electric">Electric</label>
            </div>
            <div class="form-check form-check-light">
                <input class="form-check-input" type="checkbox" id="hybrid">
                <label class="form-check-label fs-sm" for="hybrid">Hybrid</label>
            </div>
        </div>
        <div class="pb-4 mb-1">
            <h3 class="h6 ">Transmission</h3>
            <div class="form-check form-check-light">
                <input class="form-check-input" type="checkbox" id="auto">
                <label class="form-check-label fs-sm" for="auto">Automatic</label>
            </div>
            <div class="form-check form-check-light">
                <input class="form-check-input" type="checkbox" id="manual">
                <label class="form-check-label fs-sm" for="manual">Manual</label>
            </div>
        </div>
        <div class="pb-4 mb-2">
            <h3 class="h6  pt-1">Mileage</h3>
            <div class="d-flex align-items-center">
                <input class="form-control form-control-light w-100" type="number" min="0" step="500" placeholder="From">
                <div class="mx-2">—</div>
                <input class="form-control form-control-light w-100" type="number" min="0" step="500" placeholder="To">
            </div>
        </div>
    </div>
</div>
