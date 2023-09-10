<x-back-layout>
    <x-slot:title>
        Sayfa Düzenle
    </x-slot>
    <form action="{{route('dashboard.page.edit.post', $page->id)}}" method="POST" class="form__content" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('dashboard.page.index') }}" class="btn btn-sm btn-default shadow-sm">
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
                            <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Slug</label>
                            <div class="col-sm-9">
                            <input type="text" name="slug" class="form-control" value="{{ old('slug', $page->slug) }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Alt Başlık</label>
                            <div class="col-sm-9">
                            <input type="text" name="sub_title" class="form-control" value="{{ old('sub_title', $page->sub_title) }}" autocomplete="off">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">İçerik</label>
                            <div class="col-sm-9">
                                <textarea name="content" class="form-control" id="summernote">{{ old('content',  $page->content) }}</textarea>
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
                    <label for="inputEmail3" class="col-form-label px-2">Resim Seçimi</label>
                    <div class="position-relative">
                        @if($page->image != null)
                            <img width="100%" id="preview" height="200" src="{{ asset($page->image) }}">
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
    </x-slot>
</x-back-layout>



