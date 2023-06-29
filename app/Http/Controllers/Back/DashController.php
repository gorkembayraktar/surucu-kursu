<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index(){
        return view('back.pages.index');
    }

}
