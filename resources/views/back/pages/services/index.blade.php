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
                            @if( $counter->trash > 0)
                            <li><a href="?status=trash">Çöp ({{ $counter->trash }})</a></li>
                            @endif
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
                                       <a href="" target="_blank">Görüntüle</a>
                                    
                                       @if($service->publish === \App\Enum\ServicesEnum::TRASH)
                                       <form action="{{route('dashboard.services.action', $service->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" name="action" value="save" class="btn btn-outline-info btn-sm shadow-sm text-sm">Kurtar</button>
                                            <button type="submit" name="action" value="delete" class="btn btn-outline-danger btn-sm shadow-sm text-sm"><i class="fa fa-trash"></i> Sil</button>
                                        </form
                                       @else
                                       <form action="{{route('dashboard.services.trash', $service->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm shadow-sm text-sm"><i class="fa fa-trash"></i> Çöp</button>
                                        </form
                                        @endif
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
                                        @case(\App\Enum\ServicesEnum::TRASH)
                                        <span class="badge badge-danger">Arşivlendi</span>
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



