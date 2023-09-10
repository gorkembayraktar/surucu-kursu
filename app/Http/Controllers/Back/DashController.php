<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\Team;
use App\Models\BlogCategory;
use App\Models\Service;

class DashController extends Controller
{
    public function index(){

        $blogs = Blog::orderBy('id', 'desc')->with('user')->limit(3)->get();

        $teams = Team::orderBy('id', 'desc')->limit(5)->get();

        $categories = BlogCategory::with('blog_count')->limit(5)->get();

        $services = Service::orderBy('id','desc')->limit(5)->get();

        return view('back.pages.index', compact('blogs', 'teams', 'categories', 'services'));
    }

}
