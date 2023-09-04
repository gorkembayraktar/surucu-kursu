<?php

namespace App\Http\Controllers\Back;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\TeamsPostRequest;

use App\Models\Team;

class TeamsController extends Controller
{
    public function index(){
        $teams = Team::orderBy('id', 'desc');

        $teams = $teams->paginate(10);

        return view('back.pages.teams.index', compact('teams'));
    }

    public function insert(){
        return view('back.pages.teams.insert');
    }
    public function post(TeamsPostRequest $request){
       

        if($request->hasFile('image')){
            $filenameSlug = Str::slug($request->name);
            $filename =  $filenameSlug . "." . $request->image->extension();
            
            $filenameWithUpload = 'uploads/team/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->image->extension();
                $filenameWithUpload = 'uploads/team/'.$filename;
            }
            $request->image->move(public_path('uploads/team/'), $filename);
            $request->merge(['image_path' => $filenameWithUpload]);
        }

        $socials = [
            "instagram" => $request->post('instagram'),
            "facebook" => $request->post('facebook'),
            "youtube" => $request->post('youtube'),
            "twitter" => $request->post('twitter'),
        ];


        $data = [
            'full_name' => $request->post('name'),
            'degree' => $request->post('subtitle'),
            'socials' => json_encode( $socials ),
            "image" => $request->image_path
        ];

        if(Team::create($data))
            return redirect()->route('dashboard.teams.index')->withSuccess('İşlem başarılı şekilde gerçekleşti.');

        return redirect()->route('dashboard.team.insert')->withError('Bir sorun oluştu.');
    }

    public function edit(int $id){

        $team = Team::find($id) ?? abort('404', "Kayıt bulunamadı");

        return view('back.pages.teams.edit', compact('team'));
    }

    public function edit_post(TeamsPostRequest $request, int $id){
       
        $team = Team::find($id);
        if(!$team)
            return redirect()->back()->withError('Kayıt bulunamadı');

        if($request->hasFile('image')){
            $filenameSlug = Str::slug($request->name);
            $filename =  $filenameSlug . "." . $request->image->extension();
            
            $filenameWithUpload = 'uploads/team/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->image->extension();
                $filenameWithUpload = 'uploads/team/'.$filename;
            }
            $request->image->move(public_path('uploads/team/'), $filename);
            $request->merge(['image_path' => $filenameWithUpload]);
        }

        $socials = [
            "instagram" => $request->post('instagram'),
            "facebook" => $request->post('facebook'),
            "youtube" => $request->post('youtube'),
            "twitter" => $request->post('twitter'),
        ];


        $data = [
            'full_name' => $request->post('name'),
            'degree' => $request->post('subtitle'),
            'socials' => json_encode( $socials ),
        ];

        if( !empty( $request->image_path )  ){
            $data['image'] = $request->image_path;
        }

        if(Team::where('id', $team->id)->update($data)){

            if( !empty($data['image']) && !empty($team->image) && file_exists( public_path( $team->image ) )){
                @unlink( public_path( $team->image) );
            }

            return redirect()->route('dashboard.teams.index')->withSuccess('İşlem başarılı şekilde gerçekleşti.');
        }

        return redirect()->route('dashboard.team.edit', $team->id)->withError('Bir sorun oluştu.');

    }


    public function delete_post(int $id){
        $team = Team::find($id);

        if(!$team) return redirect()->back();

        if($team->delete()){
            if($team->image != null && file_exists( public_path($team->image) )){
                @unlink( public_path($team->image) );
            }
            return redirect()->route('dashboard.teams.index')->withSuccess('Başarılı şekilde silindi');
        }
        return redirect()->route('dashboard.teams.index')->withError('Bir sorun oluştu.');
    }
}
