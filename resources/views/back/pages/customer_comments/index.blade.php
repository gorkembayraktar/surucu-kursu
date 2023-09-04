<x-back-layout>
    <x-slot:title>
        Müşteri Yorumları
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.customer-comments.insert') }}" class="btn btn-sm btn-info shadow-sm">
                        <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Yeni Yorum Oluştur
                   </a>
                </div>
                <div class="card-body">
                   <table class="table table-bordered table-fit">
                      <thead>
                         <tr>
                            <th style="width: 10px">Öncelik</th>
                            <th>Resim</th>
                            <th>Müşteri Adı</th>
                            <th>Müşteri Ünvanı</th>
                            <th>Yıldız</th>
                            <th>Gösterilsin</th>
                            <th>Aksiyon</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach($comments as $comment)
                         <tr>
                            <td class="text-center">
                                <i class="fas fa-arrows-alt fa-sm "></i>
                            </td>
                            <td style="width:1px; white-space:nowrap;">
                                @if($comment->image)
                                <img src="{{ asset($comment->image) }}" class="elevation-2" alt="Yorum Resim" width="70">
                                @endif
                            </td>
                            <td>
                                {{ $comment->name }}
                            </td>
                            <td> {{ $comment->subname }}</td>
                            <td> {{ str_repeat('✰', $comment->star) }}</td>
                            <td style="width:1px; white-space:nowrap;">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success cursor-pointer text-center">
                                    <input type="checkbox" class="custom-control-input" id="row-editable-{{ $comment->id }}" @checked( $comment->active ) data-id="{{ $comment->id }}">
                                    <label class="custom-control-label" for="row-editable-{{ $comment->id }}"></label>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('dashboard.customer-comments.edit', $comment->id) }}" data-id="{{ $comment->id }}" class="btn btn-outline-info btn-sm update-button" data-placement="bottom" title="Bu Kaydı Düzenle">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('dashboard.customer-comments.delete', $comment->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm delete-button" data-placement="bottom" title="Bu Kaydı Sil">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form
                                  
                                </div>
                        
                            </td>
                         </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $comments->links('vendor.pagination.default') }}
                </div>
             </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

    <x-slot:style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.26/sweetalert2.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </x-slot>

    <x-slot:script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.26/sweetalert2.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(".delete-form").submit(submit);

            async function submit(e){
                 e.preventDefault();

                 const isConfirmed =  await new Promise(promise);
                 
                 isConfirmed && e.target.submit();
            }

            function promise(resolve, reject){
                Swal.fire({
                    title: 'Müşteri yorumunu kaldırmak istediğinize emin misiniz?',
                    showDenyButton: true,
                    confirmButtonText: 'Vazgeç',
                    denyButtonText: `Sil`,
                }).then((result) => {
                    resolve( result.isDenied );
                });
            }

            $(".custom-control-input").change(function(){
                $(this).prop('disabled', true);
                const { section, id} = this.dataset;
                const status = this.checked;
                let item = $(this);
                const csrf = $("#csrf").attr('data-value'); 
                ajax_api({
                    url:"{{ route('dashboard.customer-comments.toggle.post')  }}",
                    method:'post',
                    data:{
                        _token: csrf,
                        id,
                        status: status ? 1 : 0
                    }
                }).then(function(result){

                    if(result.status == 200){
                        toastr.success("Başarılı şekilde güncellendi ");
                        return;
                    }

                    toastr.error(`Hata`, 'Bir sorun oluştu. Kod:' + result.status, []);
                }).catch(function(){
                    toastr.error(`Hata`, 'Bir sorun oluştu.', []);
                }).finally(function(){
                    item.prop('disabled', false);
                });

                
            });

        </script>
    </x-slot>
</x-back-layout>



