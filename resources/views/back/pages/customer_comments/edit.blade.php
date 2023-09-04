<x-back-layout>
    <x-slot:title>
        Müşteri Yorumu Düzenle
    </x-slot>
    <form action="{{route('dashboard.customer-comments.edit.post', $comment->id)}}" method="POST" class="form__content" enctype="multipart/form-data">
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
                            <input type="text" name="name" class="form-control" placeholder="title" value="{{ old('name', $comment->name) }}" autocomplete="off" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Ünvan</label>
                            <div class="col-sm-9">
                            <input type="text" name="subname" class="form-control" placeholder="title" value="{{ old('subname', $comment->subname) }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Derecelendirme (Yıldız Sayısı)</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="star">
                                    @for($i = 1; $i <=5;$i++)
                                    <option value="{{ $i }}" @selected($comment->star == $i)>{{ str_repeat('✰', $i) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Yorumu</label>
                            <div class="col-sm-9">
                                <textarea name="comment" class="form-control">{{ old('comment', $comment->comment) }}</textarea>
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
                        @if( $comment->image )
                        <img width="100%" id="preview" height="200" src="{{ asset( $comment->image ) }}">
                        @else
                        <img width="100%" id="preview" height="200" src="{{ asset('') }}default-image.png">
                        @endif
                        <input type="file" name="profile_image" id="profile_image" class="form-control" style="
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



