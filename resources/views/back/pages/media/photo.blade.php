<x-back-layout>
    <x-slot:title>
        Medya Fotoğraflar
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
               
                    <form id="fileUpload"  method="post" action="{{ route('dashboard.media.photo.post')}}" enctype="multipart/form-data">
                        @csrf
                        Medya Fotoğraflar
                        <button class="float-right btn-success bb-custom-file">
                            <i class="fas fa-file-upload"></i> Resim yükle
                            <input type="file" id="imgInp" name="image" class="form-control">
                        </button>
                    </form>
                </div>
                <div class="card-body">
                    @foreach ($photos as $photo)
                        <div class="col-6 col-md-3 mb-3 image-container">
                            <img width="100%" height="200" class="rounded" src="{{ asset( $photo->image ) }}" />
                            <div class="features">
                                <span class="pt-3 pl-4 text-sm">{{ $photo->created_at }}</span>
                                
                                <form method="post" action="{{ route('dashboard.media.photo.delete', $photo->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger remove-btn">&times;</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer clearfix">
                    {{ $photos->links('vendor.pagination.default') }}
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



