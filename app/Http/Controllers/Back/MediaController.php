<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\MediaPhotoPostRequest;
use App\Http\Requests\MediaVideoPostRequest;

class MediaController extends Controller
{
    public function photo(){
        return view('back.pages.media.photo');
    }

    public function photo_post(MediaPhotoPostRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }


    public function video(){
        return view('back.pages.media.video');
    }

    public function video_insert(){
        return view('back.pages.media.video_insert');
    }
    public function video_insert_post(MediaVideoPostRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
}
