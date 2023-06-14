<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list(){
        return view('front.blog_list');
    }

    public function single(){
        return view('front.blog_single');
    }

}
