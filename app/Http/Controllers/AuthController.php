<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class AuthController extends Controller
{



    
    public function register()
    {
        return view('sign.signUp');
    }
 
    public function registerPost(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
    
      
        $user = new User();
    
     
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
    
      
        $user->save();
   
        return redirect('/login')->with('success', 'Signup Successful. Please login.');
    }
 
    public function login()
    {
        return view('sign.signIn');
    }
 
    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login Success');
        }
    
        return back()->with('error', 'Invalid Email or Password');
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect('/');
    }
}