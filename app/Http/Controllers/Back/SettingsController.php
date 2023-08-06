<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SettingsGeneralPostRequest as SGRequest;
use App\Http\Requests\SettingsContactPostRequest as SCRequest;
use App\Http\Requests\SettingsAdvancedPostRequest as SARequest;

class SettingsController extends Controller
{
    public function general(){
        return view('back.pages.settings.general');
    }
    public function general_post(SGRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
    public function contact(){
        return view('back.pages.settings.contact');
    }
    public function contact_post(SCRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
    public function advanced(){
        return view('back.pages.settings.advanced');
    }
    public function advanced_post(SARequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
    public function email(){
        
    }
    public function maintenance(){
        
    }
}
