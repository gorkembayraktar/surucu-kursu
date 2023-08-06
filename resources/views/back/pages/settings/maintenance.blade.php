<x-back-layout>
    <x-slot:title>
        Bakım Modu
    </x-slot>
    <form action="{{route('dashboard.settings.maintenance.post')}}" method="POST" class="form__content">
        @csrf
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Bakım Modu
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                            {{$errors->first()}}
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Site Aktiflik Durumu</label>
                            <div class="col-sm-9 align-self-center">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success cursor-pointer">
                                    <input type="checkbox" class="custom-control-input" id="row-editable-30" name="status">
                                    <label class="custom-control-label" for="row-editable-30"></label>
                                </div>
                            </div>
                        </div>
                      
                        <textarea name="content" class="form-control" id="summernote">{{ old('content') }}</textarea>
    
                        
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

    <x-slot:style>
        <!-- include summernote css/js -->
         <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    </x-slot>

    <x-slot:script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                    'height':300
            });
        });
        </script>
    </x-slot>
</x-back-layout>



