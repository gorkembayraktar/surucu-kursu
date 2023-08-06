<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\SliderPostRequest;

use App\Models\Slider;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('que', 'asc')->orderBy('id', 'asc');

        $sliders = $sliders->paginate(3);

        return view('back.pages.slider.index', compact('sliders'));
    }
    public function edit($id){
        $slider = Slider::find($id) ?? abort(404, 'Slider Bulunamadı');
        return view('back.pages.slider.edit', compact('slider'));
    }

    public function edit_post(SliderPostRequest $request, $id){
        $slider = Slider::find($id) ?? abort(404, 'Slider Bulunamadı');

        $data = [
            'user_id' => Auth::id(),
            'title' => $request->post('title'),
            'sub_title' => $request->post('subtitle'),
            'content' => $request->post('content'),
            'active' => true,
            'button_name' => $request->post('buttonName'),
            'button_redirect' => $request->post('buttonRedirect')
        ];


        if($request->hasFile('slider')){
            $filenameSlug = Str::slug($request->title);
            $filename =  $filenameSlug . "." . $request->slider->extension();
            
            $filenameWithUpload = 'uploads/slider/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->slider->extension();
                $filenameWithUpload = 'uploads/slider/'.$filename;
            }
            $request->slider->move(public_path('uploads/slider/'), $filename);
            $request->merge(['image' => $filenameWithUpload]);

            if( $slider->image && file_exists( public_path( $slider->image ) ) ){
                @unlink( public_path($slider->image) );
            }
            $data['image'] = $request->image;
        }

        
        if($slider->update($data))
            return redirect()->route('dashboard.slider.index')->withSuccess('Slider başarılı şekilde güncellendi.');

        return redirect()->route('dashboard.slider.insert')->withError('Bir sorun oluştu.');
    }

    public function toggle_post(Request $request){
       
        $slider = Slider::find($request->id);

        if(!$slider)
            return response('Not found', 404);

        $slider->active = $request->status == "1";
        $slider->save();

        return response('', 200);
    }
    public function insert(){
        return view('back.pages.slider.insert');
    }
    public function post(SliderPostRequest $request){
 
        if($request->hasFile('slider')){
            $filenameSlug = Str::slug($request->title);
            $filename =  $filenameSlug . "." . $request->slider->extension();
            
            $filenameWithUpload = 'uploads/slider/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->slider->extension();
                $filenameWithUpload = 'uploads/slider/'.$filename;
            }
            $request->slider->move(public_path('uploads/slider/'), $filename);
            $request->merge(['image' => $filenameWithUpload]);
        }
        $data = [
            'user_id' => Auth::id(),
            'title' => $request->post('title'),
            'sub_title' => $request->post('subtitle'),
            'content' => $request->post('content'),
            'active' => true,
            'que' => 9999,
            'button_name' => $request->post('buttonName'),
            'button_redirect' => $request->post('buttonRedirect'),
            'image' => $request->image
        ];

        if(Slider::create($data))
            return redirect()->route('dashboard.slider.index')->withSuccess('Slider başarılı şekilde oluşturuldu.');

        return redirect()->route('dashboard.slider.insert')->withError('Bir sorun oluştu.');
    }

    public function delete_post($id){
        $slider = Slider::find($id);

        if(!$slider)
            return redirect()->back();

        if($slider->image != null && file_exists( public_path($slider->image) )){
            unlink( public_path($slider->image) );
        }
        if($slider->delete()){
            return redirect()->route('dashboard.slider.index')->withSuccess('Başarılı şekilde silindi');
        }

        return redirect()->route('dashboard.slider.index')->withError('Bir sorun oluştu.');
    }
}
