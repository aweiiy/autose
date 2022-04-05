<?php

namespace App\Http\Controllers;

use App\Models\car_body_type;
use App\Models\car_listing;
use App\Models\car_make;
use App\Models\city;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $car_make = car_make::all();
        $car_body_types = car_body_type::all();
        $cities = city::all();
        $car_listings = car_listing::all()->sortByDesc('created_at')->take(4);
        return view('pages.home', compact('car_make', 'car_body_types', 'cities', 'car_listings'));
    }
}
