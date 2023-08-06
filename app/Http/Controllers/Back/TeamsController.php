<?php

namespace App\Http\Controllers\Back;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Http\Requests\TeamsPostRequest;


class TeamsController extends Controller
{
    public function index(){
        return view('back.pages.teams.index');
    }

    public function insert(){
        return view('back.pages.teams.insert');
    }
    public function post(TeamsPostRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }
}
