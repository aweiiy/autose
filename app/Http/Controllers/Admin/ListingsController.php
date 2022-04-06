<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\car_body_type;
use App\Models\car_listing;
use App\Models\car_make;
use App\Models\city;
use App\Models\fuel_type;
use App\Models\image;
use App\Models\transmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\QueryBuilder\QueryBuilder;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$listings = car_listing::paginate(5);

        $listings = car_listing::query()->when(request('id'),function ($query) {
            return $query->where('id',request('id'));
        })->when(request('make'),function ($query) {
            return $query->where('car_make_id',request('make'));
        })->when(request('car_model_id'),function ($query) {
            return $query->where('car_model_id',request('car_model_id'));
        })->when(request('body_type'),function ($query) {
            $checked = $_GET['body_type'];
            $body_type = car_body_type::whereIn('id',$checked)->get();
            $body_type_id = [];
            foreach ($body_type as $body_types){
                $body_type_id[] = $body_types->id;
            }
            return $query->whereIn('car_body_type_id',$body_type_id);
        })->when(request('transmission'),function ($query) {
            $checked = $_GET['transmission'];
            $transmission = transmission::whereIn('id',$checked)->get();
            $transmission_id = [];
            foreach ($transmission as $transmissions){
                $transmission_id[] = $transmissions->id;
            }
            return $query->whereIn('transmission_id',$transmission_id);
        })->when(request('fuel_type'),function ($query) {
            $checked = $_GET['fuel_type'];
            $fuel_type = fuel_type::whereIn('id',$checked)->get();
            $fuel_type_id = [];
            foreach ($fuel_type as $fuel_types){
                $fuel_type_id[] = $fuel_types->id;
            }
            return $query->whereIn('fuel_type_id',$fuel_type_id);
        })->when(request('city'),function ($query) {
            $checked = $_GET['city'];
            $city = city::whereIn('id',$checked)->get();
            $city_id = [];
            foreach ($city as $cities){
                $city_id[] = $cities->id;
            }
            return $query->whereIn('city_id',$city_id);
        })->when(request('min_price'),function ($query) {
            return $query->where('price', '>=' ,request('min_price'));
        })->when(request('max_price'),function ($query) {
            return $query->where('price', '<=' ,request('max_price'));
        })->when(request('min_year'),function ($query) {
            return $query->where('year', '>=' ,request('min_year'));
        })->when(request('max_year'),function ($query) {
            return $query->where('year', '<=' ,request('max_year'));
        })->when(request('min_mileage'),function ($query) {
            return $query->where('mileage', '>=' ,request('min_mileage'));
        })->when(request('max_mileage'),function ($query) {
            return $query->where('mileage', '<=' ,request('max_mileage'));
        })->when(request('min_engine'),function ($query) {
            return $query->where('cubic_capacity', '>=' ,request('min_engine'));
        })->when(request('max_engine'),function ($query) {
            return $query->where('cubic_capacity', '<=' ,request('min_engine'));
        })->when(request('min_power'),function ($query) {
            return $query->where('engine_power', '>=' ,request('min_power'));
        })->when(request('max_power'),function ($query) {
            return $query->where('engine_power', '<=' ,request('max_power'));
        })->when(request('min_battery'),function ($query) {
            return $query->where('battery_capacity', '>=' ,request('min_battery'));
        })->when(request('max_battery'),function ($query) {
            return $query->where('battery_capacity', '<=' ,request('max_battery'));
        })->when(request('owner'),function ($query) {
            return $query->with('user')->whereHas('user',function ($query) {
                return $query->where('name', 'LIKE', '%'.request('owner').'%');
            });
        })->paginate(10)->appends(request()->query());

        $cities = city::all();

        $car_body_types = car_body_type::all();
        $fuel_types = fuel_type::all();

        $transmissions = transmission::all();

        $years = array_combine(range(date("Y"), 1900), range(date("Y"), 1900));
        $years = array() + $years;

        $car_make = car_make::all();
        #print_r($mylistings);

        return view('admin.listings.index', compact('listings', 'car_make', 'cities', 'car_body_types', 'fuel_types', 'transmissions', 'years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car_listing = car_listing::findOrFail($id);

        if(!$car_listing) abort(404);
        $images = $car_listing->images;
        return view('admin.listings.show', compact('car_listing','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car_listing = car_listing::findOrFail($id);

        $car_make = car_make::all();
        $car_body_type = car_body_type::pluck('name', 'id');
        $car_body_type->prepend('Select body type', 0);
        $car_body_type->all();

        $cities = city::pluck('name', 'id');
        $cities->prepend('Select city', 0);
        $cities->all();

        $fuel_types = fuel_type::pluck('name', 'id');
        $fuel_types->prepend('Select fuel type', 0);
        $fuel_types->all();

        $transmission = transmission::pluck('name', 'id');
        $transmission->prepend('Select transmission', 0);
        $transmission->all();

        $years = array_combine(range(date("Y"), 1900), range(date("Y"), 1900));
        $years = array('0' => 'Select build year') + $years;


        $images = $car_listing->images;

        return view('admin.listings.form', compact('car_listing','car_make','car_body_type','years','images','fuel_types','cities', 'transmission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'car_body_type_id' => 'required|integer',
            'city_id' => 'nullable|integer|min:1',
            'fuel_type_id' => 'nullable|integer|min:1',
            'cubic_capacity' => 'nullable|integer|min:100|max:10000',
            'battery_capacity' => 'nullable|integer|min:1|max:1000',
            'transmission_id' => 'required|integer|min:1',
            'phone_number' => 'required|integer|min:1|digits_between:8,11',
            'price' => 'required|integer|max:1000000',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'mileage' => 'required|integer',
            'vin' => 'nullable|string|min:17|max:17',
            'description' => 'nullable',
            'email' => 'nullable',
            'images' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $car_listing = car_listing::findOrFail($id);

        if($request->has('images')){
            foreach($request->file('images')as $image){
                $imageName = $car_listing['id'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('listing_images'),$imageName);
                image::create([
                    'car_listing_id'=>$car_listing->id,
                    'name'=>$imageName
                ]);
            }
        }
        $car_listing->update($request->all());
        return redirect('admin/listings')->with('success', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car_listing = car_listing::findOrFail($id);

        foreach($car_listing->images as $image){
            $image_path = public_path().'/listing_images/'.$image->name;
            unlink($image_path);
        }
        $car_listing->delete();
        return redirect('admin/listings')->with('success', 'Listing deleted successfully.');
    }
}
