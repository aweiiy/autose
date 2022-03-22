<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\User;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\car_listing;
use App\Models\car_make;
use App\Models\car_model;
use App\Models\car_body_type;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $mylistings = car_listing::where('user_id', '=', Session::get('loginId'))->paginate(10);

        #print_r($mylistings);

        return view('user.mylistings.index', compact('mylistings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car_make = car_make::all();
        $car_body_type = car_body_type::pluck('name', 'id');
        $car_body_type->prepend('Select body type', 0);
        $car_body_type->all();


        $years = array_combine(range(date("Y"), 1900), range(date("Y"), 1900));
        $years = array('0' => 'Select build year') + $years;
        $user = User::all();

        return view('user.mylistings.form', compact('car_make', 'car_body_type' , 'years', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'car_make_id' => 'required|integer',
            'car_model_id' => 'required|integer',
            'car_body_type_id' => 'required|integer',
            'phone_number' => 'required|integer',
            'price' => 'required|integer|max:1000000',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'description' => 'nullable',
            'email' => 'nullable',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data['user_id'] = Session::get('loginId');
       # print_r($data);

        $car_listing = car_listing::create($data);

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
        return redirect('mylistings')->with('success', 'Listing added successfully.');
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
        return view('user.mylistings.show', compact('car_listing','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car_make = car_make::all();
        $car_body_type = car_body_type::pluck('name', 'id');
        $car_body_type->prepend('Select body type', 0);
        $car_body_type->all();

        $years = array_combine(range(date("Y"), 1900), range(date("Y"), 1900));
        $years = array('0' => 'Select build year') + $years;

        $car_listing = car_listing::findOrFail($id);
        if(!$car_listing) abort(404);
        $images = $car_listing->images;


        return view('user.mylistings.form', compact('car_listing','car_make','car_body_type','years','images'));
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
            'car_make_id' => 'required|integer',
            'car_model_id' => 'required|integer',
            'car_body_type_id' => 'required|integer',
            'phone_number' => 'required|integer',
            'price' => 'required|integer|max:1000000',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'description' => 'nullable',
            'email' => 'nullable',
            'images' => 'required',
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
        return redirect('mylistings')->with('success', 'Listing updated successfully.');
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
        return redirect('mylistings')->with('success', 'Listing deleted successfully.');
    }
}
