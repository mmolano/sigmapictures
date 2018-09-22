<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{


    public function index()
    {
        return view('admin.add_new_session_client');
    }



    public function getSignin(){
        return view('admin.add_new_session_client');
    }

    public function postSignin(Request $request){

        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return Redirect::to('/user_dashboard');
        }
        return redirect()->back();
    }


    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.user_login');
    }
}
