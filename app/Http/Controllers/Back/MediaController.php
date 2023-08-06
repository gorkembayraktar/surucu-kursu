<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\MediaPhotoPostRequest;

class MediaController extends Controller
{
    public function photo(){
        return view('back.pages.media.photo');
    }

    public function photo_post(MediaPhotoPostRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
}
