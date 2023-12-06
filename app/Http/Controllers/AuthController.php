<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signup()
    {
        return view('signup');
    }
    public function signupPost(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return view('signin');
    }
    public function signin()
    {
        return view('signin');
    }
    public function signinPost(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $decrypt =Hash::check($request->password, $user->password);
      
        if ($user && $decrypt) {
            session()->put(['name'=>$user->name,'email' => $request->email, 'password' => $request->password]);
            return view('site_cost');
        }
        // $credetials = [
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ];

        // if(Auth::attempt($credetials )){
        //     return view('site');
        // }
        return back()->with('error', 'email or password is wrong');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('signin');
    }

    public function logoutcostum()
    {
        Session::flush();
        return redirect()->route('signin');
    }
}
