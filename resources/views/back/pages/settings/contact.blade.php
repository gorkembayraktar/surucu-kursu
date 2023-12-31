<x-back-layout>
    <x-slot:title>
        İletişim Ayarları
    </x-slot>
    <form action="{{route('dashboard.settings.contact.post')}}" method="POST" class="form__content">
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
                            <label class="col-sm-3 col-form-label"><i class="fas fa-phone"></i> Telefon Numarası  </label>
                            <div class="col-sm-9 align-self-center">
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $settings->get('phone')) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><i class="fas fa-envelope"></i> Kurumsal Mail Adresi  </label>
                            <div class="col-sm-9 align-self-center">
                                <input type="text" name="email" class="form-control" value="{{ old('email', $settings->get('email')) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><i class="fas fa-map"></i> Kurumsal Adres Bilgileriniz  </label>
                            <div class="col-sm-9 align-self-center">
                                <textarea type="text" name="adress" class="form-control">{{ old('adress', $settings->get('adress')) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><i class="fas fa-map"></i> Google Map İframe  </label>
                            <div class="col-sm-9 align-self-center">
                                <textarea type="text" name="mapiframe" class="form-control">{{ old('mapiframe', $settings->get('mapiframe')) }}</textarea>
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
                        Sosyal Medya
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Facebook</label>
                            <div class="col-sm-9 align-self-center">
                                <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $settings->get('facebook')) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">İnstagram</label>
                            <div class="col-sm-9 align-self-center">
                                <input type="text" name="instagram" class="form-control" value="{{ old('instagram', $settings->get('instagram')) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Twitter</label>
                            <div class="col-sm-9 align-self-center">
                                <input type="text" name="twitter" class="form-control" value="{{ old('twitter', $settings->get('twitter')) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Youtube</label>
                            <div class="col-sm-9 align-self-center">
                                <input type="text" name="youtube" class="form-control" value="{{ old('youtube', $settings->get('youtube')) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </form>
</x-back-layout>



