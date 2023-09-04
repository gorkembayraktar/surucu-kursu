<x-back-layout>
    <x-slot:title>
        Slider Ayarları
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.slider.insert') }}" class="btn btn-sm btn-info shadow-sm">
                        <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Yeni Slider Oluştur
                   </a>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                      <thead>
                         <tr>
                            <th style="width: 10px">Öncelik</th>
                            <th>Resim</th>
                            <th>Başlık</th>
                            <th>Alt Başlık</th>
                            <th>İçerik</th>
                            <th>Gösterilsin</th>
                            <th>Aksiyon</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach($sliders as $slider)
                         <tr>
                            <td class="text-center">
                                <i class="fas fa-arrows-alt fa-sm "></i>
                            </td>
                            <td style="width:1px; white-space:nowrap;">
                                @if( $slider->image != null )
                                <img src="{{ asset( $slider->image) }} " width="50" height="50" />
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                               {{ $slider->title }}
                            </td>
                            <td>{{ $slider->sub_title }}</td>
                            <td>{{ $slider->content }}
                            </td>
                            <td style="width:1px; white-space:nowrap;">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success cursor-pointer text-center">
                                    <input type="checkbox" class="custom-control-input" id="row-editable-{{ $slider->id }}" @checked( $slider->active ) data-id="{{ $slider->id }}">
                                    <label class="custom-control-label" for="row-editable-{{ $slider->id }}" ></label>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a type="button" data-id="30" class="btn btn-outline-info btn-sm update-button" data-placement="bottom" title="Bu Kaydı Düzenle" href="{{ route('dashboard.slider.edit', $slider->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('dashboard.slider.delete.post', $slider->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" data-id="30" class="btn btn-outline-danger btn-sm delete-button" data-placement="bottom" title="Bu Kaydı Sil">
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
                    <style>
                        svg{
                            width:20px;
                        }
                    </style>

                    {{ $sliders->links('vendor.pagination.default') }}

                  
                </div>
             </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>


    <x-slot:script>
        <script>
            $(".custom-control-input").change(function(){
                $(this).prop('disabled', true);
                const { section, id} = this.dataset;
                const status = this.checked;
                let item = $(this);
                const csrf = document.getElementById('csrf').getAttribute('data-value'); 
                ajax_api({
                    url:'{{ route('dashboard.slider.toggle.post')  }}',
                    method:'post',
                    data:{
                        _token:csrf,
                        id,
                        status: status ? 1 : 0
                    }
                }).then(function(result){

                    if(result.status != 200){
                        toastr.error(`Hata`, 'Bir sorun oluştu. Kod:' + result.status, []);
                    }

                    item.prop('disabled', false);
                }).catch(function(){
                    toastr.error(`Hata`, 'Bir sorun oluştu.', []);
                });

                
            });
        </script>
    </x-slot>

</x-back-layout>



