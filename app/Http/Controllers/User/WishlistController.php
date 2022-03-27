<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\car_listing;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlist = wishlist::where('user_id', '=', Session::get('loginId'))->paginate(10);


        return view('pages.wishlist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        if(Session()->has('loginId')){
            $listing_id = $request->input('listing_id');
            if(car_listing::find($listing_id) && wishlist::where('car_listing_id','=',$listing_id)->count() < 1  ){
                $wish = new wishlist();
                $wish->car_listing_id = $listing_id;
                $wish->user_id = Session::get('loginId');
                $wish->save();
                return response()->json(['status' => 'Listing added to wishlist']);
            }
            else{
                return response()->json(['status' => 'Fail']);
            }
        }
        else{
                return response()->json(['err' => 'Login to add']);
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
