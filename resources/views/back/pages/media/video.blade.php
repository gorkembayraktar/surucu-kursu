<x-back-layout>
    <x-slot:title>
        Medya Videolar
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.media.video.insert') }}" class="btn btn-sm btn-info shadow-sm">
                        <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Yeni Video Ekle
                   </a>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                      <thead>
                         <tr>
                            <th style="width: 10px">ID</th>
                            <th>Başlık</th>
                            <th>Aksiyon</th>
                         </tr>
                      </thead>
                      <tbody>
                         <tr>
                            <td class="text-center">1
                            </td>
                            <td>
                                Çocuklarınızın Hayatını Özel Kılın
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
                   
                </div>
             </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</x-back-layout>



