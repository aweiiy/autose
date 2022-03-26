<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\car_listing;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function delete($image_id, Request $request)
    {
        $image = image::findOrFail($image_id);

        $imageParent = strtok($image->name, '-');
        $car_listing = car_listing::where('id', '=', $imageParent)->get();
        $images = image::where('car_listing_id', '=', $car_listing[0]->id)->get();
        $imageCount = $images->count();

        if($image->car_listing->user->id == Session::get('loginId') || Session::get('role') == 1){
            if($imageCount == 1) {return back()->with('fail', 'Can not delete last image, upload more images or delete listing');}
            $image_path = public_path().'/listing_images/'.$image->name;
            $res = $image->delete();
            unlink($image_path);
        } else{
            abort(401);
        }
        if($res)
        {
            return back()->with('success', 'Image deleted');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }
}
