<x-back-layout>
    <x-slot:title>
        Blog Oluştur
    </x-slot>
    <form action="{{route('dashboard.blog.insert.post')}}" method="POST" class="form__content">
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
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" autocomplete="off">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">İçerik</label>
                            <div class="col-sm-9">
                                <textarea name="content" class="form-control" id="summernote">{{ old('content') }}</textarea>
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
                                    <option value=""></option>
                                    <option value="1">Genel</option>
                                    <option value="31">test</option>
                                    <option value="32">0000</option>
                                    <option value="33">yrdyrt</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Durum</label>
                            <div class="col-sm-8">
                                <select name="publish" class="form-control">
                                    <option value="0"  @selected(old('publish') == "0") >Taslak Kaydet</option>
                                    <option value="1" @selected(old('publish') == "1") >Yayınla</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    
                </div>
                <div class="card">
                   
                    <label for="inputEmail3" class="col-form-label px-2">Resim Seçimi</label>
                    <div class="position-relative">
                        <img width="100%" id="preview" height="200" src="{{ asset('') }}default-image.png">
                        <input type="file" name="slider" id="slider" class="form-control" style="
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



