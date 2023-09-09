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
                   <span class="float-right">{{ $blog->count() }} blog listelendi.</span>
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
                            <th>Kategoriler</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach($blog as $item)
                         <tr>
                            <td class="text-center"> {{ $item->id }} </td>
                            <td class="blog-title">
                                <a href=""> {{ $item->title }} </a>
                                <div class="blog-detail">
                                    <p>
                                        {{ substr(strip_tags($item->content), 0, 150) }}
                                    </p>
                                    <div class="actions">
                                        <a href="{{ route('dashboard.blog.edit', $item->id)}}">Düzenle</a>
                                       |
                                       <a href="" target="_blank">Görüntüle</a>
                                       |
                                       @if($item->publish === \App\Enum\BlogEnum::TRASH)
                                       <form action="{{route('dashboard.blog.action', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" name="action" value="save" class="btn btn-outline-info btn-sm shadow-sm text-sm">Kurtar</button>
                                            <button type="submit" name="action" value="delete" class="btn btn-outline-danger btn-sm shadow-sm text-sm"><i class="fa fa-trash"></i> Sil</button>
                                        </form
                                       @else
                                       <form action="{{route('dashboard.blog.trash', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm shadow-sm text-sm"><i class="fa fa-trash"></i> Çöp</button>
                                        </form
                                        @endif
                                    
                                    </div>
                                 </div>

                            </td>
                            <td>
                                {{ $item->user->name }}
                            </td>
                            <td>
                                @foreach ($item->categories as $c)
                                    <a href="?publish={{ request()->status }}&category={{ $c->id }}" class="badge badge-secondary"> {{ $c->title }}</a>
                                @endforeach
                            </td>
                            <td>
                                @switch($item->publish)
                                        @case(\App\Enum\BlogEnum::PUBLISHED)
                                        <span class="badge badge-success">Yayınlandı</span>
                                        @break
                                        @case(\App\Enum\BlogEnum::DRAFT)
                                            <span class="badge badge-info">Taslak</span>
                                        @break
                                        @case(\App\Enum\BlogEnum::INEDITED)
                                            <span class="badge badge-secondary">Yayınlanmadı</span>
                                        @break
                                        @case(\App\Enum\BlogEnum::TRASH)
                                        <span class="badge badge-danger">Arşivlendi</span>
                                        @break
                                        @default
                                        <span class="badge badge-info">{{ $item->publish }}</span>
                                @endswitch
                            </td>
                            <td>
                                {{ $item->created_at }}
                                @if( $item->updated_at )
                                    <p class="text-sm">son güncelleme : {{ $item->updated_at }}</p>
                                @endif
                                
                            </td>
                         </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $blog->links('vendor.pagination.default') }}
                </div>
             </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</x-back-layout>



