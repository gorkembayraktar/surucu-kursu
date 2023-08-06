<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\FAQPostRequest;

class FAQController extends Controller
{
    public function index(){
        return view('back.pages.faq.index');
    }

    public function insert(){
        return view('back.pages.faq.insert');
    }
    public function post(FAQPostRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
}
