<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\car_make;
use App\Models\User;
use Illuminate\Http\Request;


class MakesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car_makes = car_make::paginate(15);
        return view('admin.makes.index', compact('car_makes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.makes.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $car_make = new car_make();
        $car_make->name = $request->name;
        $res = $car_make->save();
        if($res)
        {
            return redirect('admin/makes')->with('success', 'Make added successfully.');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car_make = car_make::findOrFail($id);
        return view('admin.makes.form', compact('car_make'));
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
            'name'=>'required'
        ]);
        $car_make = car_make::findOrFail($id);
        $res = $car_make->update($request->all());
        if($res)
        {
            return redirect('admin/makes')->with('success', 'User updated successfully.');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car_make = car_make::findOrFail($id);
        $res = $car_make->delete();
        if($res)
        {
            return redirect('admin/makes')->with('success', 'Make deleted successfully.');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }
}
