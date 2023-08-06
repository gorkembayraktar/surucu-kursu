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
                         <tr>
                            <td class="text-center">
                                <i class="fas fa-arrows-alt fa-sm "></i>
                            </td>
                            <td></td>
                            <td>
                                Görkem
                            </td>
                            <td>Dev.</td>
                            <td>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" data-id="30" class="btn btn-outline-info btn-sm update-button" data-placement="bottom" title="Bu Kaydı Düzenle">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-id="30" class="btn btn-outline-danger btn-sm delete-button" data-placement="bottom" title="Bu Kaydı Sil">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                        
                            </td>
                         </tr>
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
</x-back-layout>



