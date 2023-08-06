<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\BlogPostRequest;
use App\Http\Requests\BlogCategoryPostRequest;

class BlogController extends Controller
{
    public function index(){
        return view('back.pages.blog.index');
    }

    public function insert(){
        return view('back.pages.blog.insert');
    }

    public function post(BlogPostRequest $request){
        toastr()->error('posted');
        return redirect()->back()->withInput();
    }

    public function category(){
        return view('back.pages.blog.category');
    }

    public function category_post(BlogCategoryPostRequest  $request){
        toastr()->error('posted 2');
        return redirect()->back()->withInput();
    }

}
