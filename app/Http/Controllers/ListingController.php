<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\car_listing;
use App\Models\car_make;
use App\Models\car_model;
use App\Models\car_body_type;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        #$makes = car_make::all();

        #$listings = car_listing::join('car_make', 'id_car_make', '=', 'car_make.id')->get();

        #$listings = car_listing::with('users')->get();
        #$users = User::with('car_listing')->get();
        #$users = User::get();
        $listings = car_listing::latest()->paginate(25);
        #$users = User::all();


        return view('user.listings.index', compact('listings',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car_make = car_make::pluck('name', 'id');
        $car_make->prepend('---Please select---', 0);
        $car_make->all();

        $car_model = car_model::pluck('name', 'id');
        $car_model->prepend('---Please select---', 0);
        $car_model->all();

        $car_body_type = car_body_type::pluck('name', 'id');
        $car_body_type->prepend('---Please select---', 0);
        $car_body_type->all();

        $years = array_combine(range(date("Y"), 1900), range(date("Y"), 1900));
        $years = array('0' => '---Please select---') + $years;

        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $user = User::all();
        return view('user.listings.form', compact('car_make', 'car_model', 'car_body_type' , 'years','data', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_car_make' => 'required',
            'id_car_model' => 'required',
            'id_car_body_type' => 'required',
            'phone_number' => 'required|integer',
            'price' => 'required|integer|max:1000000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable',
            'email' => 'nullable'
        ]);


        $data = $request->all();
        $data['owner_id'] = Session::get('loginId');
        if ($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension(); // failo pavadinimas pvz. 1620283915.jpg
            $request->image->move(public_path('images'), $fileName);
            $data['image'] = $fileName;
        }

        car_listing::create($data);
        return redirect('listings')->with('success', 'Listing added successfully.');
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
        return view('user.listings.show', compact('car_listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car_make = car_make::pluck('name', 'id');
        $car_make->prepend('---Please select---', 0);
        $car_make->all();

        $car_model = car_model::pluck('name', 'id');
        $car_model->prepend('---Please select---', 0);
        $car_model->all();

        $car_body_type = car_body_type::pluck('name', 'id');
        $car_body_type->prepend('---Please select---', 0);
        $car_body_type->all();

        $years = array_combine(range(date("Y"), 1900), range(date("Y"), 1900));
        $years = array('0' => '---Please select---') + $years;

        $car_listing = car_listing::findOrFail($id);



        return view('user.listings.form', compact('car_listing','car_make','car_model','car_body_type','years'));
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
        $car_listing = car_listing::findOrFail($id);
        $car_listing->update($request->all());
        return redirect('listings')->with('success', 'Listing updated successfully.');
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
        $car_listing->delete();
        return redirect('listings')->with('success', 'Listing deleted successfully.');
    }
}
