<x-back-layout>
    <x-slot:title>
        Müşteri Yorumu Oluştur
    </x-slot>
    <form action="{{route('dashboard.customer-comments.insert.post')}}" method="POST" class="form__content">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('dashboard.customer-comments.index') }}" class="btn btn-sm btn-default shadow-sm">
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
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Adı Soyadı(*)</label>
                            <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" placeholder="title" value="" autocomplete="off" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Ünvan</label>
                            <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" placeholder="title" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Derecelendirme (Yıldız Sayısı)</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="star">
                                    <option value="1">✰</option>
                                    <option value="2">✰✰</option>
                                    <option value="3">✰✰✰</option>
                                    <option value="4">✰✰✰✰</option>
                                    <option value="5" selected="">✰✰✰✰✰</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Yorumu</label>
                            <div class="col-sm-9">
                                <textarea name="comment" class="form-control"></textarea>
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
</x-back-layout>



