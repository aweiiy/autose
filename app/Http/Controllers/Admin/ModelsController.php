<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\car_make;
use App\Models\car_model;
use Illuminate\Http\Request;

class ModelsController extends Controller
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
    public function create($id)
    {
        $car_make = car_make::findOrFail($id);

        return view('admin.models.form', compact('car_make'));
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
            'make'=>'required',
            'name'=>'required'
        ]);
        $car_model = new car_model();
        $car_model->name = $request->name;
        print_r($request->all());
        $car_model->car_make_id = $request->make;
        $res = $car_model->save();
        if($res)
        {
            return redirect('admin/makes/models/'.$request->make)->with('success', 'Model added successfully.');
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
        $car_model = car_model::findOrFail($id);
        $car_make = car_make::where('id', '=', $car_model->car_make_id)->first();
        return view('admin.models.form', compact('car_model','car_make'));
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
            'make'=>'required',
            'name'=>'required'
        ]);
        $car_model = car_model::findOrFail($id);
        $res = $car_model->update($request->all());
        if($res)
        {
            return redirect('admin/makes/models/'.$request->make)->with('success', 'Model updated successfully.');
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
        $car_model = car_model::findOrFail($id);
        $link = $car_model->car_make->id;
        $res = $car_model->delete();
        if($res)
        {
            return redirect('admin/makes/models/'.$link)->with('success', 'Model deleted successfully.');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function car_models($id)
    {
        $car_make = car_make::findOrFail($id);

        $car_models = car_model::where('car_make_id',$id)->paginate(10);


        return view('admin.makes.models', compact('car_models','car_make'));
    }
}
