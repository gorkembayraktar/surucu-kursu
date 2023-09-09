<x-back-layout>
    <x-slot:title>
        Blog Güncelle
    </x-slot>
    <form action="{{route('dashboard.blog.edit.post', $blog->id)}}" method="POST" class="form__content" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('dashboard.blog.index') }}" class="btn btn-sm btn-default shadow-sm">
                            <i class="fas fa-arrow-left fa-sm"></i> Geri
                    </a>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                            {{$errors->first()}}
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Başlık(*)</label>
                            <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" autocomplete="off">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">İçerik</label>
                            <div class="col-sm-9">
                                <textarea name="content" class="form-control" id="summernote">{{ old('content', $blog->content) }}</textarea>
                            </div>
                        </div>
            
                    </div>
                    <div class="card-footer clearfix ">
                        <button type="submit" class="btn btn-sm btn-success shadow-sm float-right">
                            <i class="fas fa-save fa-sm"></i>  Kaydet 
                    </button>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Kategoriler</label>
                            <div class="col-sm-8">
                                <select data-placeholder="Kategoriler" multiple class="chosen-select form-control" name="kategori[]">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected( $blog->has_category($category->id) )>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Yayınlayan</label>
                            <div class="col-sm-8">
                                <select data-placeholder="Kullanıcılar"  class="form-control-sm" name="user_id">
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" @selected( $user->id == $blog->user_id )>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Durum</label>
                            <div class="col-sm-8">
                                <select name="publish" class="form-control">
                                    <option value="{{ \App\Enum\ServicesEnum::PUBLISHED->value }}"  @selected(old('publish', $blog->publish->value) == \App\Enum\ServicesEnum::PUBLISHED->value) >Yayınla</option>
                                    <option value="{{ \App\Enum\ServicesEnum::DRAFT->value }}" @selected(old('publish',  $blog->publish->value) == \App\Enum\ServicesEnum::DRAFT->value) >Taslak Kaydet</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    
                </div>
                <div class="card">
                   
                    <label for="inputEmail3" class="col-form-label px-2">Resim Seçimi</label>
                    <div class="position-relative">
                        @if( $blog->image )
                        <img width="100%" id="preview" height="200" src="{{ asset( $blog->image ) }}">
                        @else
                        <img width="100%" id="preview" height="200" src="{{ asset('') }}default-image.png">
                        @endif
                        <input type="file" name="image" id="image" class="form-control" style="
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            opacity: 0;
                            top:0;
                            ">
                    </div>
                </div>
            </div>
        </div>
    </form>


    <x-slot:style>
        <!-- include summernote css/js -->
         <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
         <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
    </x-slot>

    <x-slot:script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                    'height':300
            });
        });
        </script>

        <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

        <script>
            $(".chosen-select").chosen({
                no_results_text: "Kategori bulunamadı."
            });
        </script>
    </x-slot>
    
</x-back-layout>



