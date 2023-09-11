<x-back-layout>
    <x-slot:title>
        Gönderilen İletiler
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Son Gönderiler
                    </div>
                    <span class="float-right">
                        {{ $emails->total()}} öğeden 
                        {{ $emails->firstItem() }} ile {{ $emails->lastItem() }} arasındaki öğeler gösteriliyor
                    </span>
                </div>
                <div class="card-body">
                   <table class="table table-hover ">
                      <thead>
                         <tr>
                            <th style="width: 10px">ID</th>
                            <th>Gönderen</th>
                            <th>Konu</th>
                            <th>Tarih</th>
                            <th>Aksiyon</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($emails as $email)
                        <tr  class="@if(!$email->is_read) bg-light @endif">
                            <td>
                                <div class="icheck-primary">
                                <input type="checkbox" value="" id="check1">
                                <label for="check1"></label>
                                </div>
                            </td>
                           
                            <td class="mailbox-name">{{ $email->name }}</td>
                            <td class="mailbox-subject"><b>{{ $email->subject }}</b> - {{ substr( $email->message,  0,75) }}
                            </td>
                            <td class="mailbox-date">{{ $email->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('dashboard.email.show', $email->id) }}"  class="btn btn-outline-info btn-sm update-button" data-placement="bottom" title="Bu Kaydı Düzenle">
                                        <i class="fa fa-eye"></i>
                                    </a>
                    
                                    <form action="{{route('dashboard.email.delete', $email->id) }}" method="POST" class="delete-form">
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
                    {{ $emails->links('vendor.pagination.default') }}
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
                    title: 'Silme işlemini onaylıyor musunuz?',
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
                    url:"{{ route('dashboard.page.toggle.post')  }}",
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



