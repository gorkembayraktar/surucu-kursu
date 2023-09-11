<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;

use App\Http\Requests\FAQPostRequest;

use App\Models\FAQ;

class FAQController extends DashboardController
{
    public function index(){
        $faq = FAQ::orderBy('id', 'desc')->get();

        return view('back.pages.faq.index', compact('faq'));
    }

    public function insert(){
        return view('back.pages.faq.insert');
    }

    public function edit(int $id){
        $faq = FAQ::find($id) ?? abort(404, 'SSS Bulunamadı');

        return view('back.pages.faq.edit', compact('faq'));
    }

    public function edit_post(FAQPostRequest $request, int $id){
        $faq = FAQ::find($id);
        if(!$faq) return redirect()->back()->withError("$id numaralı kayıt bulunamadı.");
        
        $faq->title = $request->question;
        $faq->content = $request->answer;

        $faq->save();
        return redirect()->route('dashboard.faq.index')->withSuccess('Başarılı şekilde güncellendi.');
    }


    public function post(FAQPostRequest $request){
        
        $data = [
            "title" => $request->question,
            "content" => $request->answer
        ];  

        if(FAQ::create($data))
            return redirect()->route('dashboard.faq.index')->withSuccess('Başarılı şekilde oluşturuldu.');

        return redirect()->route('dashboard.faq.insert')->withError('Bir sorun oluştu.');
    }

    public function delete_post(int $id){
        $faq = FAQ::find($id);
        if(!$faq) return redirect()->back()->withError("$id numaralı kayıt bulunamadı.");

        if($faq->delete()){
            return redirect()->route('dashboard.faq.index')->withSuccess('Başarılı şekilde silindi.');
        }
        return redirect()->route('dashboard.faq.insert')->withError('Bir sorun oluştu.');
    }
}
