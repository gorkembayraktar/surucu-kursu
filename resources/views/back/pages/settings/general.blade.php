<x-back-layout>
    <x-slot:title>
        Genel Ayarlar
    </x-slot>
    <form action="{{route('dashboard.settings.general.post')}}" method="POST" class="form__content">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Ayarlar
                        <button type="submit" class="btn btn-sm btn-success shadow-sm float-right">
                            <i class="fas fa-save fa-sm"></i>  Kaydet 
                    </button>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                            {{$errors->first()}}
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Site Başlığı (*)</label>
                            <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" placeholder="title" value="" autocomplete="off" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Site Aktiflik Durumu</label>
                                    <div class="col-sm-6 align-self-center">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success cursor-pointer">
                                            <input type="checkbox" class="custom-control-input" id="row-editable-30" name="status">
                                            <label class="custom-control-label" for="row-editable-30"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-8 col-form-label">Yükleniyor Efekti/PreLoader </label>
                                    <div class="col-sm-4 align-self-center">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success cursor-pointer">
                                            <input type="checkbox" class="custom-control-input" id="row-editable-31" name="preloader">
                                            <label class="custom-control-label" for="row-editable-31"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Yardımcı Footer</label>
                            <div class="col-sm-9">
                            <input type="text" name="altfooter" class="form-control" placeholder="title" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Footer</label>
                            <div class="col-sm-9">
                            <input type="text" name="footer" class="form-control" placeholder="title" value="" autocomplete="off">
                            </div>
                        </div>

                        
                        
                  
                    </div>
                    <div class="card-footer clearfix ">
                       
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Görsel Düzenle
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label align-self-center">Logo</label>
                            <div class="col-sm-9">
                                <img width="100" id="preview" height="100" src="{{ asset('') }}default-image.png">
                                <input type="file" name="slider" id="slider" class="form-control" style="
                                    width: 100%;
                                    height: 100%;
                                    position: absolute;
                                    opacity: 0;
                                    top:0;
                                    ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label align-self-center">Favicon</label>
                            <div class="col-sm-9">
                                <img width="100" id="preview" height="100" src="{{ asset('') }}default-image.png">
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
            </div>

            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        Site Seo Ayarları [META]
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Keywords (Anahtar kelimeler)</label>
                            <div class="col-sm-9">
                            <input type="text" name="keywords" class="form-control" placeholder="anahtar kelimeler" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Author (Yazar)</label>
                            <div class="col-sm-9">
                            <input type="text" name="author" class="form-control" placeholder="yazar" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">Description (Açıklama/Hakkında)</label>
                            <div class="col-sm-12">
                            <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer clearfix ">
                        <button type="submit" class="btn btn-sm btn-success shadow-sm float-right">
                            <i class="fas fa-save fa-sm"></i>  Kaydet 
                    </button>
                    </div>
                </div>
            </div>
           
        </div>
    </form>
</x-back-layout>



