<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\BlogPostRequest;
use App\Http\Requests\BlogCategoryPostRequest;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\RSBlogCategory;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\DB;

class BlogController extends DashboardController
{
    public function index(Request $request){

        $blog = Blog::orderBy('blog.id', 'desc');

        if($request->category){
            $blog->whereHas('blog_category', function ($query) use ($request) {
                $query->where('category_id', $request->category);
            });
        }
        $counter = (object)[
            "total" => Blog::whereNot('publish', \App\Enum\BlogEnum::TRASH)->count(),
            "publish" => Blog::where("publish", \App\Enum\BlogEnum::PUBLISHED)->count(),
            "draft" => Blog::where("publish", \App\Enum\BlogEnum::DRAFT)->count(),
            "trash" => Blog::where("publish", \App\Enum\BlogEnum::TRASH)->count()
        ];

        $filter = [
            "publish" => \App\Enum\BlogEnum::PUBLISHED,
            "draft" => \App\Enum\BlogEnum::DRAFT,
            "trash" => \App\Enum\BlogEnum::TRASH
        ];
        
        if( $request->status && !empty($filter[ $request->status ]) ){
            $blog->where('publish', $filter[ $request->status ]);
        }else{
            $blog->whereNot('publish', \App\Enum\BlogEnum::TRASH);
        }


        $blog = $blog->paginate(10)->appends(request()->query());

        return view('back.pages.blog.index', compact('blog', 'counter'));
    }

    public function insert(){
        $categories = BlogCategory::orderBy('title', 'asc')->get();
        $users = User::orderBy('name', 'asc')->where('verified', true)->get();
        return view('back.pages.blog.insert', compact('categories', 'users'));
    }

    public function post(BlogPostRequest $request){

        $user_id = !$request->user_id || !User::find( $request->user_id  ) ? Auth::id() : $request->user_id;
        if($request->hasFile('image')){
            $filenameSlug = Str::slug($request->title);
            $filename =  $filenameSlug . "." . $request->image->extension();
            
            $filenameWithUpload = 'uploads/blog/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->image->extension();
                $filenameWithUpload = 'uploads/blog/'.$filename;
            }
            $request->image->move(public_path('uploads/blog/'), $filename);
            $request->merge(['image_path' => $filenameWithUpload]);
        }

        $publishAllowed =  \App\Enum\BlogEnum::cases();

        $publish = \App\Enum\BlogEnum::PUBLISHED;
        $search = array_search($request->publish, array_column($publishAllowed, "value"));
        if( $search > -1){
            $publish = $publishAllowed[ $search ];
        }
        $data = [
            "user_id" => $user_id,
            "slug" => Str::slug( $request->title ),
            "title" => $request->title,
            "content" => $request->content,
            "publish" =>  $publish
        ];

        if($request->image_path){
            $data['image'] = $request->image_path;
        }

        DB::beginTransaction();

        $result = null;
        try{
            $result = Blog::create($data);
            
            if($result):
                /** Eğer kategori oluşturulmadıysa varsayılan kategoriyi ata */
                
                if(!$request->kategori):
                    $request->merge([
                        "kategori" => [1]
                    ]);
                elseif(count($request->kategori) == 0):
                    $request->kategori[0] = 1;
                endif;



                foreach($request->kategori as $kategori):
                    RSBlogCategory::create([
                        "blog_id" => $result->id,
                        "category_id" => $kategori
                    ]);
                endforeach;
            
            endif;

            DB::commit();

        }catch(Exception $e){
            if($request->image_path){
                file_exists( public_path( $request->image_path ) ) && unlink( public_path( $request->image_path ) );
            }
            DB::rollBack();
        }

        return  $result ?
            redirect()->route('dashboard.blog.index')->withSuccess('Başarılı şekilde oluşturuldu.')
        : redirect()->route('dashboard.blog.insert')->withError('Bir sorun oluştu.');
    }

    public function edit(int $id){
        $blog = Blog::find($id) or abort(404, "Blog bulunamadı");
        $categories = BlogCategory::orderBy('title', 'asc')->get();
        $users = User::orderBy('name', 'asc')->where('verified', 1)->get();

        return view('back.pages.blog.edit', compact('categories', 'users', 'blog'));
    }
    public function edit_post(BlogPostRequest $request, int $id){


        $blog = Blog::find($id);

        if(!$blog) return redirect()->back()->withError('Blog bulunamadı');

        $user_id = !$request->user_id || !User::find( $request->user_id  ) ? Auth::id() : $request->user_id;

        if($request->hasFile('image')){
            $filenameSlug = Str::slug($request->title);
            $filename =  $filenameSlug . "." . $request->image->extension();
            
            $filenameWithUpload = 'uploads/blog/'.$filename;
            if(file_exists( public_path($filenameWithUpload))){
                $filename = $filenameSlug . '-'.rand(1,999). "." . $request->image->extension();
                $filenameWithUpload = 'uploads/blog/'.$filename;
            }
            $request->image->move(public_path('uploads/blog/'), $filename);
            $request->merge(['image_path' => $filenameWithUpload]);
        }

        $publishAllowed =  \App\Enum\BlogEnum::cases();

        $publish = \App\Enum\BlogEnum::PUBLISHED;
        $search = array_search($request->publish, array_column($publishAllowed, "value"));
        if( $search > -1){
            $publish = $publishAllowed[ $search ];
        }
        $data = [
            "user_id" => $user_id,
            "slug" => Str::slug( $request->title ),
            "title" => $request->title,
            "content" => $request->content,
            "publish" =>  $publish
        ];

        if($request->image_path){
            $data['image'] = $request->image_path;
        }

        DB::beginTransaction();

        $status = false;
        try{
            
            $temp_image = $blog->image;

            $status = $blog->update($data);
            
            if(!$status)
                throw new \Exception("Güncelleme başarısız oldu", 1);

            /** Eğer kategori oluşturulmadıysa varsayılan kategoriyi ata */
            if(!$request->kategori):
                $request->merge([
                    "kategori" => [1]
                ]);
            elseif(count($request->kategori) == 0):
                $request->kategori[0] = 1;
            endif;

            RSBlogCategory::where("blog_id", $blog->id)->delete();

            foreach($request->kategori as $kategori):
                RSBlogCategory::create([
                    "blog_id" => $blog->id,
                    "category_id" => $kategori
                ]);
            endforeach;

            if($request->image_path && $temp_image){
                file_exists( public_path( $temp_image ) ) && unlink( public_path( $temp_image ) );
            }
            DB::commit();

        }catch(\Exception $e){
            $status = false;
            if($request->image_path){
                file_exists( public_path( $request->image_path ) ) && unlink( public_path( $request->image_path ) );
            }
            DB::rollBack();
        }

        return  $status ?
            redirect()->route('dashboard.blog.index')->withSuccess('Başarılı şekilde güncellendi.')
        : redirect()->route('dashboard.blog.insert')->withError('Bir sorun oluştu.');
    }
    public function trash_post(int $id){
        Blog::where("id", $id)->update(['publish' => \App\Enum\BlogEnum::TRASH]);
        return redirect()->route('dashboard.blog.index')->withSuccess('İşlem başarılı şekilde gerçekleşti.');
    }
    public function action_post(Request $request, int $id){
        $blog = Blog::find($id);
        if($blog):
            switch($request->action):
                case 'save':
                    $blog->publish = \App\Enum\BlogEnum::DRAFT;
                    $blog->save();
                break;

                case 'delete':
                    if( !empty($blog->image) && file_exists( public_path( $blog->image ) )){
                        @unlink( public_path( $blog->image) );
                    }

                    RSBlogCategory::where('blog_id', $blog->id)->delete();

                    $blog->delete();
                break;
            endswitch;
        endif;
        return redirect()->back();
    }

    public function category(){
        $categories = BlogCategory::orderBy('id', 'desc');
        $categories = $categories->paginate(10);
        return view('back.pages.blog.category', compact('categories'));
    }

    public function category_post(BlogCategoryPostRequest  $request){
 
        $data = [
            "title" => $request->title,
            "slug"  => Str::slug( $request->title )
        ];
        
        $status = BlogCategory::create($data);

        return $status ?
          redirect()->route('dashboard.blog.category')->withSuccess('Başarılı şekilde oluşturuldu.')
        : redirect()->route('dashboard.blog.category')->withError('Bir sorun oluştu.');
    }

    public function category_delete_post(int $id){
        
        if($id == 1)
            return redirect()->route('dashboard.blog.category')->withError('Birincil Kategori silinemez!');
        
        $c = BlogCategory::find($id);

        if(!$c)  return redirect()->route('dashboard.blog.category')->withError('Kategori bulunamadı');

        RSBlogCategory::where('category_id', $id)->delete();
        
        $table = app(RSBlogCategory::class)->getTable();
        Blog::select( app(Blog::class)->getTable().".*" )
        ->leftJoin($table, "blog.id", $table.".blog_id")
        ->whereNull($table.".blog_id")
        ->each(function($data){
            RSBlogCategory::create(["blog_id" => $data->id, "category_id" => 1]);
        });
        BlogCategory::where('id', $id)->delete();

        return redirect()->route('dashboard.blog.category')->withSuccess('Başarılı şekilde kaldırıldı.');
    }

    public function category_toggle(Request $request){

        if($request->id == 1)
            return response('Bu işlemi yapamazsınız!', 400);

        $category = BlogCategory::find($request->id);

        if(!$category)
            return response('Not found', 404);

        $category->status = $request->status == "1";
        $category->save();

        return response('', 200);
    }

    public function category_edit(Request $request){
    
       
        $category = BlogCategory::find($request->id);
        if(!$category)  return redirect()->route('dashboard.blog.category')->withError('Kategori bulunamadı');

        $category->title = $request->title;
        $category->slug = Str::slug($request->slug);

        if(BlogCategory::where('slug', $category->slug)->whereNot('id', $category->id)->exists()){
            return redirect()->route('dashboard.blog.category')->with("modal.error", "Kategori Adı zaten kullanılıyor")->withInput();
        }

        $category->save();
        
        return redirect()->route('dashboard.blog.category')->withSuccess('Başarılı şekilde güncellendi.');
    }
}
