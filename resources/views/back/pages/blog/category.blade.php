<x-back-layout>
    <x-slot:title>
        Kategorileri Düzenle
    </x-slot>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Kategori Oluştur
                </div>
                <div class="card-body">
                    <form action="{{route('dashboard.blog.category.post')}}" method="POST" class="form__content">
                        @csrf
                        @if($errors->any())
                                <div class="alert alert-danger">
                                {{$errors->first()}}
                                </div>
                        @endif
    
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-12 col-form-label">Başlık(*)</label>
                            <div class="col-sm-12">
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" autocomplete="off">
                            </div>
                        </div>

                        <button class="btn btn-success btn-block" type="submit">Kategori Oluştur</button>
                    </form>
                </div>
                
            </div> 
        </div>
        <div class="col-md-8">
            <div class="card">
                <table class="table table-bordered">
                    <thead>
                       <tr>
                          <th>ID</th>
                          <th style="width: 10px">Kategori Adı</th>
                          <th>Slug</th>
                          <th>Makale Sayısı</th>
                          <th>Durum</th>
                          <th>Aksiyon</th>
                       </tr>
                    </thead>
                    <tbody>
                       @foreach ($categories as $category)
                           
                       
                       <tr>
                          <td>{{ $category->id }}</td>
                          <td>{{ $category->title }}</td>
                          <td>{{ $category->slug }}</td>
                          <td style="width:1px; white-space:nowrap;"> {{ $category->blog_count->count() }} </td>
                          <td>
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success cursor-pointer text-center">
                                <input type="checkbox" class="custom-control-input" id="row-editable-{{ $category->id }}" data-id="{{ $category->id }}" @disabled( $category->id == 1 )  @checked( $category->status )>
                                <label class="custom-control-label" for="row-editable-{{ $category->id }}"></label>
                            </div>
                          </td>
                          <td>
                              <div class="btn-group">
                                  <button type="button" data-id="30" class="btn btn-outline-info btn-sm edit-btn" data-placement="bottom" title="Bu Kaydı Düzenle"
                                  data-category-id="{{ $category->id }}"
                                  data-category-name="{{ $category->title }}"
                                  data-category-slug="{{ $category->slug }}"
                                  >
                                      <i class="fa fa-edit"></i>
                                  </button>
                                  @if( $category->id !== 1 )
                                  <form action="{{route('dashboard.blog.category.delete.post', $category->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm delete-button" data-placement="bottom" title="Bu Kaydı Sil">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form
                                 @endif
                              </div>
                      
                          </td>
                       </tr>
                       @endforeach
                    </tbody>
                 </table>
                 <div class="card-footer clearfix">
                    {{ $categories->links('vendor.pagination.default') }}
                </div>
            </div> 
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form method="post" action="{{ route('dashboard.blog.category.edit') }}">
                @csrf
                
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kategoriyi Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                        @if(session()->has('modal.error'))
                            <div class="alert alert-danger">
                                {{ session()->get('modal.error') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input id="kategori" type="text" class="form-control" name="title"  value="{{ old('title') }}"/>
                            <input id="kategori_id" name="id" type="hidden" value="{{ old('id') }}" />
                        </div>
                        <div class="form-group">
                            <label>Kategori Slug</label>
                            <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" />
                        </div>
                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                <input type="submit" class="btn btn-success" value="Kaydet" />
                </div>
            </form>
          </div>
        </div>
      </div>

      <x-slot:style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.min.css"/>
        </x-slot>

      <x-slot:script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.26/sweetalert2.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <script>
            @if(session()->has('modal.error'))
                $("#editModal").modal('show');
            @endif
     

            $(".delete-form").submit(submit);

            async function submit(e){
                e.preventDefault();

                const isConfirmed =  await new Promise(promise);
                
                isConfirmed && e.target.submit();
            }

            function promise(resolve, reject){
                Swal.fire({
                    title: 'Silme işlemini onaylıyor musunuz?',
                    showDenyButton: true,
                    confirmButtonText: 'Vazgeç',
                    denyButtonText: `Sil`,
                }).then((result) => {
                    resolve( result.isDenied );
                });
            }
            $(".edit-btn").click(function(){
                    let id = $(this).data('category-id');
                    let name = $(this).data('category-name');
                    let slug = $(this).data('category-slug');
            
                    $("#kategori").val(name);
                    $("#slug").val(slug);
                    $("#kategori_id").val(id);
            
                    $("#editModal").modal();
                   
            });
            
            $(".delete-btn").click(function(){
            
                let id = this.dataset.id;
                Swal.fire({
                    title: 'Silmek istediğinize emin misiniz?',
                    showDenyButton: true,
                    confirmButtonText: 'Vazgeç',
                    denyButtonText: `Sil`,
                    }).then((result) => {
                    if (result.isDenied) {

                    }
                })
                   
            });

            $(".custom-control-input").change(function(){
                $(this).prop('disabled', true);
                const { section, id} = this.dataset;
                const status = this.checked;
                let item = $(this);
                const csrf = document.getElementById('csrf').getAttribute('data-value'); 
                ajax_api({
                    url:'{{ route('dashboard.blog.category.toggle.post')  }}',
                    method:'post',
                    data:{
                        _token:csrf,
                        id,
                        status: status ? 1 : 0
                    }
                }).then(function(result){

                    if(result.status != 200){
                        toastr.error(`Hata`, 'Bir sorun oluştu. Kod:' + result.status, []);
                    }

                    item.prop('disabled', false);
                }).catch(function(){
                    toastr.error(`Hata`, 'Bir sorun oluştu.', []);
                });

                
            });
            
        </script>
      </x-slot>
    
</x-back-layout>



