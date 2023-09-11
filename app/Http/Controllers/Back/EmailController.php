<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;

use App\Models\ContactMail;

class EmailController extends DashboardController
{
    public function index(){
        $emails = ContactMail::orderBy('id', 'desc')->where('is_deleted', false)->paginate(10);
   

        return view('back.pages.email.index', compact('emails'));
    }

    public function show(int $id){
        $email = ContactMail::find($id);
        
        if(!$email){
            return redirect()->route('dashboard.email.index');
        }
        $prev = ContactMail::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $next = ContactMail::where('id','>' , $id)->first();

        if(!$email->is_read){
            $email->is_read = true;
            $email->is_read_date = now();
            $email->save();
        }

        return view('back.pages.email.show', compact('email', 'prev', 'next'));
    }
    public function delete(Request $request, int $id){
        $email = ContactMail::where('is_deleted', false)->where('id', $id)->first();
        if(!$email){
            return redirect()->route('dashboard.email.index');
        }
        $email->is_deleted = true;
        $email->is_deleted_date = now();
        $email->save();
      
        return redirect()->route('dashboard.email.index')->withSuccess('Email listeden kaldırıldı');
    }

}
