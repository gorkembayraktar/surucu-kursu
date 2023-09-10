<x-back-layout>
    <x-slot:title>
        Medya Videolar
    </x-slot>
    <div class="row">
        <div class="col-md-6 col-12">
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
                        @foreach ($videos as $video)
                            
                      
                         <tr>
                            <td class="text-center">{{ $video->id }}
                            </td>
                            <td>
                                {{ $video->title }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('dashboard.media.video.edit', $video->id) }}" class="btn btn-outline-info btn-sm update-button" data-placement="bottom" title="Bu Kaydı Düzenle">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('dashboard.media.video.delete.post', $video->id)}}" method="POST" class="form__content">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm delete-button" data-placement="bottom" title="Bu Kaydı Sil">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                        
                            </td>
                         </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $videos->links('vendor.pagination.default') }}
                </div>
             </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</x-back-layout>



