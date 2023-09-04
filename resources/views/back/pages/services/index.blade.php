<x-back-layout>
    <x-slot:title>
        Hizmetler
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.services.insert') }}" class="btn btn-sm btn-info shadow-sm">
                        <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Yeni Hizmet Ekle
                   </a>
                   <span class="float-right">{{ $services->count() }} kayıt listelendi.</span>
                   <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <ul class="custom-items">
                            <li><a href="?status=all">Tümü ({{ $counter->total }})</a></li>
                            <li><a href="?status=publish">Yayımlanmış ({{ $counter->publish }})</a></li>
                            <li><a href="?status=draft">Taslak ({{ $counter->draft }})</a></li>
                        </ul>
                    </div>
                   <div class="clearfix"></div>
                   <table class="table table-bordered mt-2">
                      <thead>
                         <tr>
                            <th style="width: 10px">ID</th>
                            <th>Başlık</th>
                            <th>Yazar</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($services as $service)
                         <tr>
                            <td class="text-center">{{ $service->id }}
                            </td>
                            <td class="blog-title">
                                <a href="">
                                    {{ $service->title }}
                                </a>
                                <div class="blog-detail">
                                    {{ strip_tags($service->content) }}
                                    <div class="actions">
                                       <a href="{{ route('dashboard.services.edit', $service->id)}}">Düzenle</a>
                                       |
                                       <a href="" class="text-danger">Çöp</a>
                                       |
                                       <a href="" target="_blank">Görüntüle</a>
                                    </div>
                                 </div>

                            </td>
                            <td>
                                {{  $service->user->name }}
                            </td>
                            <td>
                                @switch($service->publish)
                                    @case(\App\Enum\ServicesEnum::PUBLISHED)
                                        <span class="badge badge-success">Yayınlandı</span>
                                        @break
                                        @case(\App\Enum\ServicesEnum::DRAFT)
                                            <span class="badge badge-info">Taslak</span>
                                        @break
                                        @case(\App\Enum\ServicesEnum::INEDITED)
                                            <span class="badge badge-secondary">Yayınlanmadı</span>
                                        @break
                                    @default
                                        
                                @endswitch
                               
                            </td>
                            <td>
                                {{ $service->created_at }}
                            </td>
                         </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $services->links('vendor.pagination.default') }}
                </div>
             </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</x-back-layout>



