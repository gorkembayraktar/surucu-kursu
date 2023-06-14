<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function services(){
        return view('front.services');
    }
    
    public function service(){
        return view('front.service');
    }
}
