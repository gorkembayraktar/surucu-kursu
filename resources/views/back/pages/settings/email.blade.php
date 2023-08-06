<x-back-layout>
    <x-slot:title>
        Email Ayarları
    </x-slot>
    <form action="{{route('dashboard.settings.email.post')}}" method="POST" class="form__content">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Ayarlar
                       
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                            {{$errors->first()}}
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Host</label>
                            <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Şifre</label>
                            <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Port</label>
                            <div class="col-sm-9">
                            <input type="number" name="title" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Secure</label>
                            <div class="col-sm-9">
                                <select name="secure" class="form-control" id="">
                                    <option value="tls">tls(ssl)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Reply</label>
                            <div class="col-sm-9">
                            <input type="text" name="replyMail" class="form-control" value="" autocomplete="off">
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
        
        </div>
    </form>
</x-back-layout>



