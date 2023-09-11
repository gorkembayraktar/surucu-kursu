<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;

use Illuminate\Support\Facades\Auth;

class LoginController extends DashboardController
{
    public function index(){
        return view('back.login');
    }
    public function post(LoginPostRequest $request){
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            toastr()->success('Sisteme Hoş Geldin : '.Auth::user()->name);
            return redirect()->route('dashboard.index');
        }
        toastr()->error('Email adresi veya şifre hatalı. ');
        // withinput request edilen datayı redirect ile geri göndermek için kullanılır.
        return redirect()->route('login')->withErrors('Email adresi veya şifre hatalı.')->withInput();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }


}
