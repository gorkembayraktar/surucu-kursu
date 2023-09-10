<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Page;



use App\Models\Team;

use App\Models\Comment;
use App\Models\FAQ;
class HomeController extends Controller
{
    public function main(){
        $sliders = Slider::orderBy('id', 'desc')->where('active', true)->limit(4)->get();
        $blogs = Blog::orderBy('id', 'desc')->where('publish', \App\Enum\BlogEnum::PUBLISHED)->limit(5)->get();
        $services = Service::orderBy('id', 'desc')->where('publish', \App\Enum\ServicesEnum::PUBLISHED)->limit(5)->get();
        $teams = Team::orderBy('id', 'desc')->limit(5)->get();
        $comments = Comment::orderBy('id', 'desc')->where('active', true)->limit(4)->get();
        $about = Page::where('slug', 'hakkimizda')->first();

        return view('front.homepage', compact('sliders', 'blogs', 'services', 'teams', 'comments', 'about'));
    }
    
    public function team(){
        $teams = Team::orderBy('id', 'desc');
        $teams = $teams->paginate(10);

        return view('front.team', compact('teams'));
    }

    public function fqa(){
        $faq = FAQ::all();
        return view('front.fqa', compact('faq'));
    }

    public function channel(){
        return view('front.channel');
    }
}
