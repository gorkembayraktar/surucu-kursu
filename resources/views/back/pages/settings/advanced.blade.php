<x-back-layout>
    <x-slot:title>
        Gelişmiş Ayarlar
    </x-slot>
    <form action="{{route('dashboard.settings.advanced.post')}}" method="POST" class="form__content">
        @csrf
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dikkat bu işlemin sonucunda web siteniz erişilemez duruma gelebilir. Program yöneticinize danışın.
                        
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                            {{$errors->first()}}
                            </div>
                        @endif
                      
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">CSS Kodlarınız  </label>
                            <div class="col-sm-8 align-self-center">
                                <textarea type="text" name="css" class="form-control" placeholder=".example {font-size:1rem;}">{{ old('css', $settings->get('html_css')) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Javascript Kodlarınız  </label>
                            <div class="col-sm-8 align-self-center">
                                <textarea type="text" name="js" class="form-control" placeholder="document.body.onclick = function(){};">{{ old('js', $settings->get('html_js')) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">
                               <small> &#60;head&#62;   &#60;/head&#62; 
                                tagları arasına dahil edebileceğiniz css/javascript referansları.
                                <p>(Google anlytics scriptini ekleyebilirsiniz.)</p>
                            </small>
                            </label>
                            <div class="col-sm-8 align-self-center">
                                <textarea type="text" name="head" class="form-control">{{ old('head', $settings->get('html_head')) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">
                                <small>
                                &#60;body&#62;   &#60;/body&#62; 
                                tagları arasına dahil edebileceğiniz komutlar
                                </small> 
                            </label>
                            <div class="col-sm-8 align-self-center">
                                <textarea type="text" name="body" class="form-control">{{ old('body', $settings->get('html_body')) }}</textarea>
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



