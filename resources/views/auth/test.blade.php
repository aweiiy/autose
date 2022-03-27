<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Autose</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/listings">Listings</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li style="margin-top: 5px; margin-right: 5px">
                    <a href="{{route('wishlist')}}" class="wishlist-btn"><i class="fas fa-heart fa-2x" style="color:black"></i></a>
                </li>
                @if(!\App\Models\User::logged())
                    <li class="nav-item">
                        <a class="nav-link login-button" href="{{ url('/login') }}">Login</a>
                    </li>
                @endif
                @if( \App\Models\User::logged() )
                    <li class="nav-item">
                        <a class="nav-link login-button" href="{{ url('/logout') }}">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link login-button" href="{{ url('/mylistings') }}">My listings</a>
                @endif
                <li class="nav-item">
                    <a class="nav-link text-white add-button" href="{{ url('/mylistings/create') }}"><svg class="svg-inline--fa fa-circle-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z"></path></svg><!-- <i class="fa fa-plus-circle"></i> Font Awesome fontawesome.com --> Add Listing</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
