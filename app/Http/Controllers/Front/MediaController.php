<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MediaPhoto;
use App\Models\MediaVideo;

class MediaController extends Controller
{
    public function gallery_photo(){

        $photos = MediaPhoto::paginate(6);

        return view('front.gallery_photo', compact('photos'));
    }
    public function gallery_media(){
        $videos = MediaVideo::paginate(6);
        return view('front.gallery_media', compact('videos'));
    }
}
