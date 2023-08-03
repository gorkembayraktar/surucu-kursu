<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SliderPostRequest;

class SliderController extends Controller
{
    public function index(){
        return view('back.pages.slider.index');
    }

    public function insert(){
        return view('back.pages.slider.insert');
    }
    public function post(SliderPostRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
}
