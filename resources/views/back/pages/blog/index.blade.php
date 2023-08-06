<x-back-layout>
    <x-slot:title>
        Blog
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.blog.insert') }}" class="btn btn-sm btn-info shadow-sm">
                        <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Yeni Blog Ekle
                   </a>
                   <span class="float-right">{X} blog listelendi.</span>
                   <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <ul class="custom-items">
                            <li><a href="?status=all">Tümü (6)</a></li>
                            <li><a href="?status=publish">Yayımlanmış (6)</a></li>
                            <li><a href="?status=draft">Taslak (0)</a></li>
                        </ul>
                    </div>
                   <div class="clearfix"></div>
                   <table class="table table-bordered mt-2">
                      <thead>
                         <tr>
                            <th style="width: 10px">ID</th>
                            <th>Başlık</th>
                            <th>Yazar</th>
                            <th>Kategoriler</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                         </tr>
                      </thead>
                      <tbody>
                         <tr>
                            <td class="text-center">1
                            </td>
                            <td class="blog-title">
                                <a href="">
                                    Tırnak Sanatı
                                </a>
                                <div class="blog-detail">
                                    <p>Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled but also the leap into electronic typesetting. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of </p>
                                    <p>
                                    </p>
                                    <div class="actions">
                                       <a href="https://guzellik.gorkembayraktar.com/dashboard/hizmetler/duzenle/25">Düzenle</a>
                                       |
                                       <a href="https://guzellik.gorkembayraktar.com/dashboard/hizmetler/cop/25" class="text-danger">Çöp</a>
                                       |
                                       <a href="https://guzellik.gorkembayraktar.com/hizmetlerimiz/tirnak-sanati" target="_blank">Görüntüle</a>
                                    </div>
                                 </div>

                            </td>
                            <td>
                                Beyza Bayrak
                            </td>
                            <td>Kategoriler</td>
                            <td>
                                <span class="badge badge-success">Yayınlandı</span>
                            </td>
                            <td>
                               Tarih
                        
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



