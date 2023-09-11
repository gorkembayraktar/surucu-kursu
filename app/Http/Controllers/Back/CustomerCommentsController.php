<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\CustomerCommentsPostRequest;

use App\Models\Comment;

class CustomerCommentsController extends DashboardController
{
    public function index(){
        $comments = Comment::orderBy('que', 'asc')->orderBy('id', 'asc');

        $comments = $comments->paginate(10);

        return view('back.pages.customer_comments.index', compact('comments'));
    }
    public function insert(){
        return view('back.pages.customer_comments.insert');
    }
    public function post(CustomerCommentsPostRequest $request){
        if($request->hasFile('profile_image')){
            $filenameSlug = Str::slug($request->title);
            $filename =  $filenameSlug . "." . $request->profile_image->extension();
            
            $filenameWithUpload = 'uploads/comment/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->profile_image->extension();
                $filenameWithUpload = 'uploads/comment/'.$filename;
            }
            $request->profile_image->move(public_path('uploads/comment/'), $filename);
            $request->merge(['image' => $filenameWithUpload]);
        }

        $data = [
            'name' => $request->post('name'),
            'subname' => $request->post('subname'),
            'star' => $request->post('star'),
            'active' => true,
            'que' => 9999,
            'comment' => $request->post('comment'),
            'image' => $request->image
        ];
        if(Comment::create($data))
            return redirect()->route('dashboard.customer-comments.index')->withSuccess('Yorum başarılı şekilde oluşturuldu.');

        return redirect()->route('dashboard.customer-comments.insert')->withError('Bir sorun oluştu.');

    }

    public function edit(int $id){
        $comment = Comment::find($id) ?? abort(404, 'Müşteri yorumu bulunamadı');

        return view('back.pages.customer_comments.edit', compact('comment'));
    }

    public function edit_post(CustomerCommentsPostRequest $request, int $id){
        $comment = Comment::find($id);
        if( !$comment )
            return redirect()->back()->withError('İlgili kayıt bulunamadı');

        if($request->hasFile('profile_image')){
            $filenameSlug = Str::slug($request->title);
            $filename =  $filenameSlug . "." . $request->profile_image->extension();
            
            $filenameWithUpload = 'uploads/comment/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->profile_image->extension();
                $filenameWithUpload = 'uploads/comment/'.$filename;
            }
            $request->profile_image->move(public_path('uploads/comment/'), $filename);
            $request->merge(['image' => $filenameWithUpload]);
        }

        $data = [
            'name' => $request->post('name'),
            'subname' => $request->post('subname'),
            'star' => $request->post('star'),
            'comment' => $request->post('comment'),
        ];
        if($request->image){
            $data['image'] = $request->image;
        }

        if( Comment::where('id', $comment->id)->update($data)){
            if(!empty($comment->image) && file_exists( public_path( $comment->image ) )){
                @unlink( public_path( $comment->image) );
            }
            
            return redirect()->route('dashboard.customer-comments.index')->withSuccess('Yorum başarılı şekilde güncellendi.');
        }
        return redirect()->route('dashboard.customer-comments.insert')->withError('Bir sorun oluştu.');
    }

    public function delete_post($id){
        $comment = Comment::find($id);

        if(!$comment) return redirect()->back();

        if($comment->delete()){
            if($comment->image != null && file_exists( public_path($comment->image) )){
                @unlink( public_path($comment->image) );
            }
            return redirect()->route('dashboard.customer-comments.index')->withSuccess('Başarılı şekilde silindi');
        }
        return redirect()->route('dashboard.customer-comments.index')->withError('Bir sorun oluştu.');
    }

    public function toggle_post(Request $request){
       

        $comment = Comment::find($request->id);

        if(!$comment)
            return response('Not found', 404);

        $comment->active = $request->status == "1";
        $comment->save();

        return response('', 200);
    }

}
