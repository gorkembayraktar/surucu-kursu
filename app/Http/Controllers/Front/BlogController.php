<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\Service;

class BlogController extends Controller
{
    public function list(){

        $blogs = Blog::orderBy('id', 'desc')->where('publish', \App\Enum\BlogEnum::PUBLISHED);

        $blogs = $blogs->paginate(4);

        if($blogs->count() == 0 )
            return redirect()->route('blog');


        return view('front.blog_list', compact('blogs'));
    }

    public function single(string $slug){

        $blog = Blog::where('slug', $slug)->first();

        if(!$blog) return redirect()->route('blog');

        $last = Blog::whereNot('id', $blog->id)->limit(3)->get();
        $services = Service::orderBy('id', 'desc')->where('publish', \App\Enum\ServicesEnum::PUBLISHED)->limit(5)->get();

        return view('front.blog_single', compact('blog', 'last', 'services'));
    }

}
