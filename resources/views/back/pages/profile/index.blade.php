<x-back-layout>
    <x-slot:title>
        Profil Bilgileri
    </x-slot>
    <div class="row">
        <div class="col-md-6 col-12">
          
            <form method="post" action="{{ route('dashboard.profile.post') }}" enctype="multipart/form-data">

                @csrf
    
                <div class="card shadow mb-4">
    
                    <div class="card-header">
                        Profil Ayarları
                    </div>     
                    <div class="card-body"> 
                        @if($errors->any())
                            <div class="alert alert-danger">
                            {{$errors->first()}}
                            </div>
                        @endif
                        <div class="row">
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adınız</label>
                                    <input type="text" name="name" reqired class="form-control" value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Adresiniz</label>
                                    <input type="email" name="email" required class="form-control" value="{{ $user->email }}">
                                    <div class="invalid"></div>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Şifreniz </label>
                                    <input disabled class="form-control" value="*************">
                                    <a href="{{ route('dashboard.profile.password') }}" style="float:right"><span style="font-size:14px">Şifre değiştir</span></a>
                                </div>
                            </div>
    
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Profil Fotoğrafı Seç</label>
                                    <input type="file" name="profil" class="form-control">
                                    @if( $user->profile_photo_path )
                                        <img src="{{ asset( $user->profile_photo_path ) }}" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-info elequant-1 ">Bilgileri Güncelle</button>
                                <button type="button" class="btn btn-sm btn-outline-danger elequant-1 float-right" data-toggle="modal" data-target="#logoutModal">Oturumu Kapat</button>
                        </div>
                    </div>
    
                </div>
    
            </form>
                
        </div>
        <!-- /.col -->
    </div>

   

</x-back-layout>



