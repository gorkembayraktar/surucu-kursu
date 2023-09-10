<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    
    public function services(){
        $services = Service::orderBy('id', 'desc')->where('publish', \App\Enum\ServicesEnum::PUBLISHED);

        $services = $services->paginate(3);

        return view('front.services', compact('services'));
    }
    
    public function service_single(string $slug){

        $service = Service::where('slug', $slug)->first();

        if(!$service) return redirect()->route('hizmetler');

        $services = Service::orderBy('id', 'desc')->where('publish', \App\Enum\ServicesEnum::PUBLISHED)->get();

        return view('front.service_single', compact('services', 'service'));
    }
}
