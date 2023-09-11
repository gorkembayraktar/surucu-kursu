<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;

use App\Http\Requests\ServicesPostRequest;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Service;

class ServicesController extends DashboardController
{
    public function index(Request $request){

        $services = Service::orderBy('id', 'desc');

        $counter = (object)[
            "total" => Service::whereNot('publish', \App\Enum\ServicesEnum::TRASH)->count(),
            "publish" => Service::where("publish", \App\Enum\ServicesEnum::PUBLISHED)->count(),
            "draft" => Service::where("publish", \App\Enum\ServicesEnum::DRAFT)->count(),
            "trash" => Service::where("publish", \App\Enum\ServicesEnum::TRASH)->count()
        ];

        $filter = [
            "publish" => \App\Enum\ServicesEnum::PUBLISHED,
            "draft" => \App\Enum\ServicesEnum::DRAFT,
            "trash" => \App\Enum\ServicesEnum::TRASH
        ];
        
        if( $request->status && !empty($filter[ $request->status ]) ){
            $services->where('publish', $filter[ $request->status ]);
        }else{
            $services->whereNot('publish', \App\Enum\ServicesEnum::TRASH);
        }

        $services = $services->paginate(10);

        return view('back.pages.services.index', compact('services', 'counter'));
    }

    public function insert(){
        return view('back.pages.services.insert');
    }
    public function post(ServicesPostRequest $request){
        if($request->hasFile('image')){
            $filenameSlug = Str::slug($request->title);
            $filename =  $filenameSlug . "." . $request->image->extension();
            
            $filenameWithUpload = 'uploads/services/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->image->extension();
                $filenameWithUpload = 'uploads/services/'.$filename;
            }
            $request->image->move(public_path('uploads/services/'), $filename);
            $request->merge(['image_path' => $filenameWithUpload]);
        }

        $data = [
            "user_id" => Auth::id(),
            "title" => $request->post('title'),
            "content" => $request->post('content'),
            "slug" => Str::slug( $request->post('title') ),
            "publish" => \App\Enum\ServicesEnum::PUBLISHED
        ];

        if($request->image_path){
            $data['image']  = $request->image_path;
        }

        if(Service::create($data))  
            return redirect()->route('dashboard.services.index')->withSuccess('İşlem başarılı şekilde gerçekleşti.');

        return redirect()->route('dashboard.services.insert')->withError('Bir sorun oluştu.');
    }

    public function edit(int $id){
        $service = Service::find($id);
        if(!$service) return redirect()->back();

        return view('back.pages.services.edit', compact('service'));
    }

    public function edit_post(ServicesPostRequest $request, int $id){
        $service = Service::find($id);
        if(!$service)
            return redirect()->back()->withError('Kayıt bulunamadı');

        if($request->hasFile('image')){
            $filenameSlug = Str::slug($request->name);
            $filename =  $filenameSlug . "." . $request->image->extension();
            
            $filenameWithUpload = 'uploads/services/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->image->extension();
                $filenameWithUpload = 'uploads/services/'.$filename;
            }
            $request->image->move(public_path('uploads/services/'), $filename);
            $request->merge(['image_path' => $filenameWithUpload]);
        }

        $publish = [
            "publish" => \App\Enum\ServicesEnum::PUBLISHED,
            "draft" => \App\Enum\ServicesEnum::DRAFT,
            "inedited" => \App\Enum\ServicesEnum::INEDITED
        ];

        $data = [
            "user_id" => Auth::id(),
            "title" => $request->post('title'),
            "content" => $request->post('content'),
            "slug" => Str::slug( $request->post('title') ),
            "publish" => $publish[ $request->publish ] ?? \App\Enum\ServicesEnum::INEDITED
        ];

        if($request->image_path){
            $data['image']  = $request->image_path;
        }

        if(Service::where("id", $service->id)->update($data)){
            
            if( !empty($data['image']) && !empty($service->image) && file_exists( public_path( $service->image ) )){
                @unlink( public_path( $service->image) );
            }
            return redirect()->route('dashboard.services.index')->withSuccess('İşlem başarılı şekilde gerçekleşti.');
        }

        return redirect()->route('dashboard.services.insert')->withError('Bir sorun oluştu.');
    
    }

    public function trash_post(int $id){
        Service::where("id", $id)->update(['publish' => \App\Enum\ServicesEnum::TRASH]);
        return redirect()->route('dashboard.services.index')->withSuccess('İşlem başarılı şekilde gerçekleşti.');
    }

    public function action_post(Request $request, int $id){
        $service = Service::find($id);
        if($service):
            switch($request->action):
                case 'save':
                    $service->publish = \App\Enum\ServicesEnum::DRAFT;
                    $service->save();
                break;

                case 'delete':
                    if( !empty($service->image) && file_exists( public_path( $service->image ) )){
                        @unlink( public_path( $service->image) );
                    }
                    $service->delete();
                break;
            endswitch;
        endif;
        return redirect()->back();
    }
}
