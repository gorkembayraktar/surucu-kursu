<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\PagesPostRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Page;

class PagesController extends Controller
{
    public function index(){
        $pages = Page::orderBy('id', 'desc');

        $pages = $pages->paginate(10);
        
        return view('back.pages.page.index', compact('pages'));
    }

    public function insert(){
        return view('back.pages.page.insert');
    }
    public function post(PagesPostRequest $request){
      
        if($request->hasFile('image')){
            $filenameSlug = Str::slug($request->title);
            $filename =  $filenameSlug . "." . $request->image->extension();
            
            $filenameWithUpload = 'uploads/page/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->image->extension();
                $filenameWithUpload = 'uploads/page/'.$filename;
            }
            $request->image->move(public_path('uploads/page/'), $filename);
            $request->merge(['image_path' => $filenameWithUpload]);
        }

        $data = [
            "user_id" => Auth::id(),
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "content" => $request->content,
            "sub_title" => $request->sub_title
        ];

        if($request->image_path){
            $data['image'] = $request->image_path;
        }

        if( Page::create($data) ){
            return redirect()->route('dashboard.page.index')->withSuccess('Başarılı şekilde oluşturuldu.');
        }  

        return redirect()->route('dashboard.page.insert')->withError('Bir sorun oluştu.');
    }

    public function edit(int $id){
        $page = Page::find($id) ?? abort(404, 'Sayfa bulunamadı');

        if(!$page)
            return redirect()->back();

        return view('back.pages.page.edit', compact('page'));
    }

    public function edit_post(PagesPostRequest $request, int $id){

        $page = Page::find($id);

        if(!$page) return redirect()->back()->withInput("$id nolu kayıt bulunamadı");


        if($request->hasFile('image')){
            $filenameSlug = Str::slug($request->title);
            $filename =  $filenameSlug . "." . $request->image->extension();
            
            $filenameWithUpload = 'uploads/page/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->image->extension();
                $filenameWithUpload = 'uploads/page/'.$filename;
            }
            $request->image->move(public_path('uploads/page/'), $filename);
            $request->merge(['image_path' => $filenameWithUpload]);
        }

        $data = [
            "user_id" => Auth::id(),
            "title" => $request->title,
            "slug" => Str::slug($request->slug ? $request->slug : $request->title),
            "content" => $request->content,
            "sub_title" => $request->sub_title
        ];

        if($request->image_path){
            $data['image'] = $request->image_path;
        }

        if( Page::where('id',$page->id)->update($data) ){
            if($request->image_path && $page->image && file_exists( public_path($page->image) )){
                @unlink( public_path($page->image) );
            }
            return redirect()->route('dashboard.page.index')->withSuccess('Başarılı şekilde güncellendi.');
        }  

        return redirect()->route('dashboard.page.insert')->withError('Bir sorun oluştu.');
    }

    public function delete_post(int $id){
        $page = Page::find($id);

        $page->delete();

        return redirect()->route('dashboard.page.index')->withSuccess('Başarılı şekilde silindi.');
    }

    public function toggle_post(Request $request){

        $page = Page::find($request->id);

        if(!$page)
            return response('Not found', 404);

        $page->active = $request->status == "1";
        $page->save();

        return response('', 200);
    }
}
