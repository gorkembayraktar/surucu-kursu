<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

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
