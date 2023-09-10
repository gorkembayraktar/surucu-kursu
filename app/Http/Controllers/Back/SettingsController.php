<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SettingsGeneralPostRequest as SGRequest;
use App\Http\Requests\SettingsContactPostRequest as SCRequest;
use App\Http\Requests\SettingsAdvancedPostRequest as SARequest;


use App\Http\Requests\SettingsMaintenancePostRequest as SMRequest;
use App\Http\Requests\SettingsEmailPostRequest as SERequest;

use App\Models\Settings;

class SettingsController extends Controller
{
    public function general(){
        return view('back.pages.settings.general');
    }
    public function general_post(SGRequest $request){


        if($request->hasFile('logo')){
            $filename = 'logo.'.$request->logo->extension();
            $filenameWithUpload = 'uploads/'.$filename;
            $request->logo->move(public_path('uploads/'), $filename);
            Settings::updateOrCreate(["key" => "logo"], ["value" => $filenameWithUpload]);
        }

        if($request->hasFile('favicon')){
            $filename = 'favicon.'.$request->favicon->extension();
            $filenameWithUpload = 'uploads/'.$filename;
            $request->favicon->move(public_path('uploads/'), $filename);
            Settings::updateOrCreate(["key" => "favicon"], ["value" => $filenameWithUpload]);
        }


        $data = [
            "title" => $request->title,
            "altfooter" => $request->altfooter,
            "footer" => $request->footer,
            "seo_keywords" => $request->keywords,
            "seo_author" => $request->author,
            "seo_description" => $request->description,
            "active" => $request->active == 'on' ? 1 : 0,
            "preloader" => $request->preloader == 'on' ? 1 : 0,
        ];

        foreach($data as $key => $value):
            Settings::updateOrCreate(["key" => $key], ["value" => $value]);
        endforeach;

        return redirect()->route('dashboard.settings.general')->withSuccess('Güncellendi.');;
    }
    public function contact(){
        return view('back.pages.settings.contact');
    }
    public function contact_post(SCRequest $request){
        $data = [
            "phone" => $request->phone,
            "email" => $request->email,
            "footer" => $request->footer,
            "adress" => $request->adress,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
            "twitter" => $request->twitter,
            "youtube" => $request->youtube,
            "mapiframe" => $request->mapiframe
        ];

        foreach($data as $key => $value):
            Settings::updateOrCreate(["key" => $key], ["value" => $value]);
        endforeach;

        return redirect()->route('dashboard.settings.contact')->withSuccess('Güncellendi.');

    }
    public function advanced(){
        return view('back.pages.settings.advanced');
    }
    public function advanced_post(SARequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
    public function email(){
        return view('back.pages.settings.email');
    }
    public function email_post(SERequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
    public function maintenance(){
        return view('back.pages.settings.maintenance');
    }
    public function maintenance_post(SMRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
}
