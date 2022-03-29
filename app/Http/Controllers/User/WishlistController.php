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
        $wishlist = wishlist::where('user_id', '=', Session::get('loginId'))->paginate(2);


        return view('pages.wishlist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        if(Session()->has('loginId')){
            $listing_id = $request->input('listing_id');
            if(car_listing::find($listing_id) && wishlist::where('car_listing_id','=',$listing_id)->where('user_id','=',Session::get('loginId'))->count() == 0){
                $wish = new wishlist();
                $wish->car_listing_id = $listing_id;
                $wish->user_id = Session::get('loginId');
                $wish->price = car_listing::get()->where('id','=',$listing_id)->first()->price;
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

    public function remove(Request $request)
    {
        if(Session()->has('loginId')){
            $listing_id = $request->input('listing_id');
            if(car_listing::find($listing_id) && wishlist::where('car_listing_id','=',$listing_id)->where('user_id','=',Session::get('loginId'))){
                $wish = wishlist::where('car_listing_id','=',$listing_id)->where('user_id','=',Session::get('loginId'))->first();
                $wish->delete();
                return response()->json(['status' => 'Listing removed from wishlist']);
            }
            else{
                return response()->json(['status' => 'Fail']);
            }
        }
        else{
            return response()->json(['err' => 'Login to remove']);
        }

    }

    public function compare(Request $request){
        $listing1 = car_listing::where('id', '=', $request->input('list_one'))->first();
        $listing2 = car_listing::where('id', '=', $request->input('list_two'))->first();
        if($listing1 && $listing2){
            $returnHTML = view('pages.compare', compact('listing1','listing2'))->render();
            return response()->json(['html' => $returnHTML, 'status' => 'success']);
        }
       // else{
         //   return response()->json(['err' => 'fail']);
        //}
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
        $wish = wishlist::find($id);
        $wish->delete();
        return redirect('/wishlist');
    }
}
