<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\MediaPhotoPostRequest;
use App\Http\Requests\MediaVideoPostRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\MediaPhoto;
use App\Models\MediaVideo;

class MediaController extends Controller
{
    public function photo(){

        $photos = MediaPhoto::orderBy('id', 'desc');
        $photos = $photos->paginate(10);

        return view('back.pages.media.photo', compact('photos'));
    }

    public function photo_post(MediaPhotoPostRequest $request){
      
        if(!$request->hasFile('image'))
            return redirect()->route("dashboard.media.photo")->withError('Bir resim seçiniz');
      
        $filenameSlug = Str::slug(str_replace($request->image->extension(), "", $request->image->getClientOriginalName()));
        $filename =  $filenameSlug . "." . $request->image->extension();
        
        $filenameWithUpload = 'uploads/media_photo/'.$filename;
        if(file_exists( public_path($filenameWithUpload))){
            $filename = $filenameSlug . '-'.rand(1,999). "." . $request->image->extension();
            $filenameWithUpload = 'uploads/media_photo/'.$filename;
        }
        $request->image->move(public_path('uploads/media_photo/'), $filename);
        $request->merge(['image_path' => $filenameWithUpload]);



        $data = [
            "user_id" => Auth::id(),
            "image" => $request->image_path
        ];

        $result = MediaPhoto::create($data);

        return $result ? 
            redirect()->route("dashboard.media.photo")->withSuccess('Başarılı şekilde oluşturuldu')
            : redirect()->route("dashboard.media.photo")->withError('Bir sorun oluştu');

    }
    public function photo_delete(Request $request, int $id){
        $result = MediaPhoto::find($id);
        if(!$result)  return redirect()->route("dashboard.media.photo")->withError('Medya bulunamadı');

        if($result->image && file_exists( public_path( $result->image ) ))
            @unlink( public_path( $result->image ) );

        $result->delete();

        return redirect()->route("dashboard.media.photo")->withSuccess('Başarılı şekilde kaldırıldı.');
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
