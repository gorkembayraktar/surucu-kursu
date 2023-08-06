<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ServicesPostRequest;

class ServicesController extends Controller
{
    public function index(){
        return view('back.pages.services.index');
    }

    public function insert(){
        return view('back.pages.services.insert');
    }
    public function post(ServicesPostRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
}
