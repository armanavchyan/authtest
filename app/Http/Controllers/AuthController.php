<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return redirect()->route('signup');
    }
    public function signup()
    {
        return view('signup');
    }
    public function signupPost(UserRequest $request)
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

    public function signinPost(UserLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $decrypt = Hash::check($request->password, $user->password);
            if($decrypt){
                session()->put(['name' => $user->name, 'email' => $request->email, 'password' => $request->password]);
            return view('site_cost');
            }
            return back()->with('error', 'email or password is wrong');
            
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
