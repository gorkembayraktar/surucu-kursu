<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(){
        return view('front.homepage');
    }

    public function about_us(){
        return view('front.about_us');
    }
    
    public function team(){
        return view('front.team');
    }

    public function fqa(){
        return view('front.fqa');
    }

    public function channel(){
        return view('front.channel');
    }
}
