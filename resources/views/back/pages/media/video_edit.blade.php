<x-back-layout>
    <x-slot:title>
        Video Düzenle
    </x-slot>
    <form action="{{route('dashboard.media.video.edit.post', $video->id)}}" method="POST" class="form__content">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('dashboard.media.video') }}" class="btn btn-sm btn-default shadow-sm">
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
                            <input type="text" name="title" class="form-control"  value="{{ old('title', $video->title) }}" autocomplete="off" >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">İframe</label>
                            <div class="col-sm-9">
                                <textarea name="iframe" class="form-control">{{ old('iframe', $video->iframe) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-sm btn-success shadow-sm float-right">
                            <i class="fas fa-save fa-sm"></i>  Kaydet 
                    </button>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
           
        </div>
    </form>
</x-back-layout>



