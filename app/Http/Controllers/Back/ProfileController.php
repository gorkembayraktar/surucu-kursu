<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;

use App\Http\Requests\ProfilePostRequest;
use App\Http\Requests\ProfilePasswordPostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class ProfileController extends DashboardController
{
    public function index(){
        $user = Auth::user();
        return view('back.pages.profile.index', compact('user'));
    }

    public function post(ProfilePostRequest $request){
        $user = Auth::user();
        $prev = $user->profile_photo_path;

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->hasFile('profil')){
            $filenameSlug =  Str::slug(str_replace($request->profil->extension(), "", $request->profil->getClientOriginalName()));
            $filename =  $filenameSlug . "." . $request->profil->extension();
            
            $filenameWithUpload = 'uploads/profil/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->profil->extension();
                $filenameWithUpload = 'uploads/profil/'.$filename;
            }
            $request->profil->move(public_path('uploads/profil/'), $filename);
            $user->profile_photo_path =  $filenameWithUpload;
        }

        if($user->update()){
           if( $prev  && file_exists( public_path( $prev) )){
                @unlink( public_path( $prev ) );
           }

           return redirect()->route("dashboard.profile.index", )->withSuccess('Başarılı şekilde güncellendi');
        }  
        
        return redirect()->route("dashboard.profile.index")->withError('Bir sorun oluştu');
    }

    public function password(){
        return view('back.pages.profile.password');
    }
    public function password_post(ProfilePasswordPostRequest $request){
        
        $validator = Validator::make($request->all(), []);

        $validator->after(function ($validator) use( $request ) {
            if( !Hash::check( $request->current,  $request->user()->password) ){
                $validator->errors()->add('password', 'Lütfen şifrenizi doğru giriniz.');
            }
        });
        if ($validator->fails()) {
            return redirect()->route("dashboard.profile.password")->withErrors($validator)
                        ->withInput();
        }

        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        return redirect()->route("dashboard.profile.index")->withSuccess("Başarılı şekilde güncellendi");
    }
}
