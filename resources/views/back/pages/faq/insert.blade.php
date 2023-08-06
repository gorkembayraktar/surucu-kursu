<x-back-layout>
    <x-slot:title>
        Yeni Soru Cevap Ekle
    </x-slot>
    <form action="{{route('dashboard.faq.insert.post')}}" method="POST" class="form__content">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('dashboard.faq.index') }}" class="btn btn-sm btn-default shadow-sm">
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
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Soru (*)</label>
                            <div class="col-sm-9">
                            <input type="text" name="question" class="form-control" value="{{ old('question') }}" autocomplete="off" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Cevap</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" name="answer">{{ old('answer') }}</textarea>
                           
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



