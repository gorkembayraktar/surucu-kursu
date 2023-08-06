<x-back-layout>
    <x-slot:title>
        Slider Oluştur
    </x-slot>
    <form action="{{route('dashboard.slider.edit.post', $slider->id)}}" method="POST" class="form__content" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('dashboard.slider.index') }}" class="btn btn-sm btn-default shadow-sm">
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
                            <input type="text" name="title" class="form-control" placeholder="title" value="{{ old('title', $slider->title) }}" autocomplete="off" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Alt Başlık</label>
                            <div class="col-sm-9">
                            <input type="text" name="subtitle" class="form-control" placeholder="title" value="{{ old('subtitle', $slider->sub_title) }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">İçerik</label>
                            <div class="col-sm-9">
                                <textarea name="content" class="form-control">{{ old('content', $slider->content) }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Düğme</label>
                                        <input type="text" name="buttonName" class="form-control" 
                                        value="{{ old('buttonName', $slider->button_name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Yönlendir</label>
                                        <input type="text" name="buttonRedirect" class="form-control" 
                                        value="{{ old('buttonRedirect', $slider->button_redirect) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer clearfix ">
                        <button type="submit" class="btn btn-sm btn-success shadow-sm float-right">
                            <i class="fas fa-save fa-sm"></i>  Güncelle 
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
                        @if($slider->image != null)
                            <img width="100%" id="preview" height="200" src="{{ asset($slider->image) }}">
                        @else 
                            <img width="100%" id="preview" height="200" src="{{ asset('') }}default-image.png">
                        @endif
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
</x-back-layout>



