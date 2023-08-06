<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\PagesPostRequest;

class PagesController extends Controller
{
    public function index(){
        return view('back.pages.page.index');
    }

    public function insert(){
        return view('back.pages.page.insert');
    }
    public function post(PagesPostRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
}
