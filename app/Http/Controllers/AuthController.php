<?php

namespace App\Http\Controllers;

use App\Models\car_make;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function register(){
        return view("auth.register");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:24'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 0;
        $res = $user->save();
        if($res)
        {
           return redirect('login')->with('success', 'You have registered successfully. You can now login');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId', $user->id);
                $request->session()->put('role', $user->role);
                if($user->role == 1) return redirect('admin/');
                return redirect('home')->with('success', 'You have logged in successfully');
            }else{
                return back()->with('fail', 'Password incorrect');
            }
        }else{
            return back()->with('fail', 'Incorrect login');
        }
    }
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $make = car_make::all();
        return view('dashboard', compact('data','make'));
    }
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            Session::pull('role');
            return redirect('home');
    }
    }
}
