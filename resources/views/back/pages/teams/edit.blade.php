<x-back-layout>
    <x-slot:title>
        Bilgileri Güncelle
    </x-slot>
    <form action="{{ route('dashboard.teams.edit.post', $team->id) }}" method="POST" class="form__content" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('dashboard.teams.index') }}" class="btn btn-sm btn-default shadow-sm">
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
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Ad Soyad (*)</label>
                            <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" placeholder="title" value="{{ old('name', $team->full_name) }}" autocomplete="off" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Ünvan (*)</label>
                            <div class="col-sm-9">
                            <input type="text" name="subtitle" class="form-control" placeholder="title" value="{{ old('subtitle', $team->degree) }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>İnstagram</label>
                                        <input type="text" name="instagram" class="form-control" value="{{ old('instagram', $team->socials->get('instagram')) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $team->socials->get('facebook')) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Twitter/X</label>
                                        <input type="text" name="twitter" class="form-control" value="{{ old('twitter', $team->socials->get('twitter')) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Youtube</label>
                                        <input type="text" name="youtube" class="form-control" value="{{ old('youtube', $team->socials->get('youtube')) }}">
                                    </div>
                                </div>
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
                        @if( $team->image )
                        <img width="100%" id="preview" height="200" src="{{ asset( $team->image ) }}">
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
</x-back-layout>



