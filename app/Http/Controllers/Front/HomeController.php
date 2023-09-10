<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Blog;
use App\Models\Service;

use App\Models\Team;

use App\Models\Comment;
class HomeController extends Controller
{
    public function main(){

        $sliders = Slider::orderBy('id', 'desc')->where('active', true)->limit(4)->get();
        $blogs = Blog::orderBy('id', 'desc')->where('publish', \App\Enum\BlogEnum::PUBLISHED)->limit(5)->get();
        $services = Service::orderBy('id', 'desc')->where('publish', \App\Enum\ServicesEnum::PUBLISHED)->limit(5)->get();
        $teams = Team::orderBy('id', 'desc')->limit(5)->get();
        $comments = Comment::orderBy('id', 'desc')->where('active', true)->limit(4)->get();

        return view('front.homepage', compact('sliders', 'blogs', 'services', 'teams', 'comments'));
    }

    public function about_us(){
        return view('front.about_us');
    }
    
    public function team(){
        return view('front.team');
    }

    public function fqa(){
        return view('front.fqa');
    }

    public function channel(){
        return view('front.channel');
    }
}
