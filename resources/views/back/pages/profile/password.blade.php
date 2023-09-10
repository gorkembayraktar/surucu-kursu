<x-back-layout>
    <x-slot:title>
        Profil Bilgileri
    </x-slot>
    <div class="row">
        <div class="col-md-6 col-12">
          
            <form method="post" action="{{ route('dashboard.profile.password.post') }}">

                @csrf
    
                <div class="card shadow mb-4">
    
                    <div class="card-header">
                        Şifre Ayarları
                    </div>     
                    <div class="card-body"> 

                        @if($errors->any())
                            <div class="alert alert-danger">
                            {{$errors->first()}}
                            </div>
                        @endif

                        <div class="row">
    
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mevcut Şifreniz</label>
                                    <input type="password" name="current" reqired class="form-control" value="">
                                </div>
                            </div>
        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Yeni Şifreniz</label>
                                    <input type="password" name="password" reqired class="form-control" value="">
                                </div>
                            </div>
        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Yeni Şifreniz</label>
                                    <input type="password" name="password2" reqired class="form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-info elequant-1 ">Bilgileri Güncelle</button>
                        </div>
                    </div>
    
                </div>
    
            </form>
                
        </div>
        <!-- /.col -->
    </div>

   

</x-back-layout>



