<x-back-layout>
    <x-slot:title>
        Sayfalar
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
               
                    <form id="fileUpload"  method="post" action="{{ route('dashboard.media.photo.post')}}" enctype="multipart/form-data">
                        @csrf
                        Profil Resimleri
                        <button class="float-right btn-success bb-custom-file">
                            <i class="fas fa-file-upload"></i> Resim yükle
                            <input type="file" id="imgInp" name="image" class="form-control">
                        </button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="col-6 col-md-3 mb-3 image-container">
                        <img width="100%" height="200" class="rounded" src="https://guzellik.gorkembayraktar.com/public/images/gallery/1661861229_1779401d8fd1187d1b80.png" />
                        <div class="features">
                            <span class="pt-3 pl-4 text-sm">2022-08-30 15:07:09</span>
                            <a href="" class="btn btn-sm btn-danger remove-btn">&times;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot:script>
        <script>

            const imgInp = document.querySelector("#imgInp");
            imgInp.onchange = evt => {
             
                document.querySelector("#fileUpload").submit();
              
            }
            
        </script>
    </x-slot>
</x-back-layout>



