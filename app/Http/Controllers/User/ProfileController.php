<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', '=', Session::get('loginId'))->first();

        return view('user.profile.index', compact('user'));
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
    public function edit()
    {
        $user = User::where('id', '=', Session::get('loginId'))->first();

        $cities = city::pluck('name', 'id');
        $cities->prepend('Select city', 0);
        $cities->all();

        return view('user.profile.edit', compact('user', 'cities'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.Session::get('loginId'),
            'phone_number' => 'nullable|integer|digits_between:8,11',
            'city_id' => 'nullable|min:1',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);


        $user = User::findOrFail(Session::get('loginId'));

        if(Session::get('loginId') == $user->id){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->city_id = $request->city_id;
            if($request->hasFile('image')){
                if($user->image){
                    unlink(public_path('profile_images/'.$user->image));
                }
                $image = $request->file('image');
                $imageName = $user->name.'-'.time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('profile_images'), $imageName);
                $user->image = $imageName;
            }
            $user->save();
            return redirect()->back()->with('success', 'Profile updated successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    public function changePassword(){

        $user = User::where('id', '=', Session::get('loginId'))->first();

        return view('user.profile.password', compact('user'));
    }

    public function updatePassword(Request $request){

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);

        $user = User::findOrFail(Session::get('loginId'));

        if(Session::get('loginId') == $user->id){
            if(Hash::check($request->old_password, $user->password)){
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->back()->with('success', 'Password updated successfully');
            }
            return redirect()->back()->with('error', 'Old password is incorrect');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validate([
        'password' => 'required|min:8'
        ]);

        $user = User::findOrFail(Session::get('loginId'));

        if(Session::get('loginId') == $user->id){
            if(Hash::check($request->password, $user->password)){
                Session::flush();
                $user->delete();
                return redirect()->route('/')->with('success', 'Account deleted successfully');
            }
            return redirect()->back()->with('error', 'Password incorrect, account not deleted');
        }
    }
}
