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
                   <table class="table table-bordered">
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
                         <tr>
                            <td class="text-center">
                                <i class="fas fa-arrows-alt fa-sm "></i>
                            </td>
                            <td></td>
                            <td>
                                Beyza Bayrak
                            </td>
                            <td>Veli</td>
                            <td>✰ ✰ ✰ ✰ ✰</td>
                            <td>
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success cursor-pointer text-center">
                                    <input type="checkbox" class="custom-control-input" id="row-editable-30" >
                                    <label class="custom-control-label" for="row-editable-30"></label>
                                </div>
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



