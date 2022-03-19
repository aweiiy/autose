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
        $mylistings = car_listing::where('user_id', '=', Session::get('loginId'))->paginate(2);
        #$mylistings = car_listing::paginate(2);

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


        $years = array_combine(range(date("Y"), 1900), range(date("Y"), 1900));
        $years = array('0' => '---Please select---') + $years;
        $user = User::all();

        return view('user.mylistings.form', compact('car_make' , 'years', 'user'));
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
            'car_make_id' => 'required|integer',
            'car_model_id' => 'required|integer',
            'car_body_type_id' => 'required|integer',
            'phone_number' => 'required|integer',
            'price' => 'required|integer|max:1000000',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable',
            'email' => 'nullable'
        ]);


        $data = $request->all();

        $data['user_id'] = Session::get('loginId');
        print_r($data);
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension(); // failo pavadinimas pvz. 1620283915.jpg
            $request->image->move(public_path('images/listings'), $imageName);
            $data['image'] = $imageName;
        }

        car_listing::create($data);
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
        return view('user.mylistings.show', compact('car_listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $car_listing->delete();
        return redirect('mylistings')->with('success', 'Listing deleted successfully.');
    }
}
