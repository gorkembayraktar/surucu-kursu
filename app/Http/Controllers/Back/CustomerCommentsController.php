<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\CustomerCommentsPostRequest;

class CustomerCommentsController extends Controller
{
    public function index(){
        return view('back.pages.customer_comments.index');
    }
    public function insert(){
        return view('back.pages.customer_comments.insert');
    }
    public function post(CustomerCommentsPostRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
}
