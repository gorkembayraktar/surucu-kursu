<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Slider;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Page;

use App\Models\ContactMail;

use App\Models\Team;

use App\Models\Comment;
use App\Models\FAQ;
use App\Models\Email;

use Illuminate\Support\Facades\Mail;

use App\Helpers\EmailsHelper;

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

    private function _channel_post(Request $request){
        $push = true;
        $reply = Email::where('type', \App\Enum\EmailEnum::REPLY_CONTACTS)->first()->reply_mail;
        try
        {
            //Set mail configuration
            EmailsHelper::setMailConfig();

            $title = \App\Models\Settings::where('key','title')->first()->value;

            $details = [
                'title' => "$request->konu | $title",
                'body' => $request->mesaj,
                'ip'   => $request->ip,
                'date' => $request->tarih,
                'mail' => $request->mail
            ];
            

            Mail::to( $reply )->send(
                new \App\Mail\ContactMail($details)
            );
        }
        catch(\Exception $e)
        {
            $push = false;
        }
        $client_ip = $request->ip();
        $data = [
            "type" => \App\Enum\EmailContactEnum::CONTACT,
            "name" => $request->isim,
            "mail" => $request->mail,
            "subject" => $request->konu,
            "message" => $request->mesaj,
            "ip_adress" => $request->ip,
            "ip_info_json" => file_get_contents("http://ipinfo.io/{$client_ip}/json"),
            "device_info"  => $request->header('User-Agent'),
            "is_mail_send" => $push,
            "send_mail_adress" => $reply,
            "page_created_at" => $request->tarih
        ];

        return ContactMail::create($data);

    }
    public function channel_post( Request $request ){
        $status = $this->_channel_post( $request );
       
        if($status){
            $request->session()->flash('alert-info', 'Mesajınız iletildi.');
        }else{
            $request->session()->flash('alert-danger', 'Bir sorunla karşılaşıldı, lütfen daha sonra tekrar deneyin.');
        }
        
        return $status ? redirect()->route('channel')->withSuccess('Başarılı şekilde gönderildi')  : 
        redirect()->route('channel')->withError('Bir sorun oluştu')->withInput();
    }

    public function channel_post_json( Request $request ){

        $status = $this->_channel_post( $request );

        $messages = [
            "success" => $status ? true : false,
            "message" => $status ? 'Mesajınız iletildi' : 'Bir sorun oluştu' 
        ];
        return \Response::json($messages, $status ? 200 : 500);
    }
}
