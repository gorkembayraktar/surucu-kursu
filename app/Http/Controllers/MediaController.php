<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function gallery_photo(){
        return view('front.gallery_photo');
    }
    public function gallery_media(){
        return view('front.gallery_media');
    }
}
