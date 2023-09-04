<x-back-layout>
    <x-slot:title>
       Ekibimiz Ayarlar
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.teams.insert') }}" class="btn btn-sm btn-info shadow-sm">
                        <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Yeni Üye Ekle
                   </a>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                      <thead>
                         <tr>
                            <th style="width: 10px">Öncelik</th>
                            <th>Resim</th>
                            <th>Ad Soyad</th>
                            <th>Ünvan</th>
                            <th>Sosyal Medya</th>
                            <th>Aksiyon</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach($teams as $team)
                         <tr>
                            <td class="text-center">
                                <i class="fas fa-arrows-alt fa-sm "></i>
                            </td>
                            <td style="width:1px; white-space:nowrap;">
                                @if( $team->image )
                                <img src="{{ asset( $team->image) }} " width="50" height="50" />
                                @endif
                            </td>
                            <td>
                                {{ $team->full_name }}
                            </td>
                            <td> {{ $team->degree }}</td>
                            <td style="width:1px; white-space:nowrap;">
                                <a href="{{ $team->socials->get('instagram') }}" target="_blank"><i class="fab fa-instagram text-secondary"></i></a>
                                <a href="{{ $team->socials->get('facebook') }}" target="_blank"><i class="fab fa-facebook text-secondary"></i></a>
                                <a href="{{ $team->socials->get('twitter') }}" target="_blank"><i class="fab fa-twitter text-secondary"></i></a>
                                <a href="{{ $team->socials->get('youtube') }}" target="_blank"><i class="fab fa-youtube text-secondary"></i></a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('dashboard.teams.edit', $team->id) }}" class="btn btn-outline-info btn-sm update-button" data-placement="bottom" title="Bu Kaydı Düzenle">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('dashboard.teams.delete', $team->id) }}" method="POST" class="delete-form">
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
                   <ul class="pagination pagination-sm m-0 float-right">
                      <li class="page-item"><a class="page-link" href="#">«</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">»</a></li>
                   </ul>
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
                    title: 'İşlemi onaylıyor musunuz, bu işlem geri alınamaz!',
                    showDenyButton: true,
                    confirmButtonText: 'Vazgeç',
                    denyButtonText: `Sil`,
                }).then((result) => {
                    resolve( result.isDenied );
                });
            }

        </script>
    </x-slot>


</x-back-layout>



