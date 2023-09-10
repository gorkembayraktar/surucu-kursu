<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
class PageController extends Controller
{
    public function page(string $slug){

        $page = Page::where(['slug' => $slug])->where("active", true)->first();
        if(!$page)
            return redirect()->route('index');

    
        return view('front.page_single', compact('page'));
    }
}
