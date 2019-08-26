<?php

namespace App\Http\Controllers;
use App\User;
use Auth;

use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function showSignUp()
    {
        return view('signup');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $this->validation($request);
        $request['password'] = bcrypt($request->password);
        User::create($request->all());
        return redirect('/leadlist')->with('Status', 'You have signed up!');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:225',
            'password' => 'required|max:225'
        ]);
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
            
            return redirect('/leadlist')->with('Status', 'You have logged in!');
        }
        return 'Oops something went wrong';
    }

    public function validation($request)
    {
        return $this->validate($request, [
            'name' => 'required|max:225',
            'email' => 'required|email|unique:users|max:225',
            'password' => 'required|confirmed|max:225'
        ]);
    }
}
