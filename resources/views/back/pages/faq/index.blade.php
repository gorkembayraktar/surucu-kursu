<x-back-layout>
    <x-slot:title>
       Sikca Sorulanlar
    </x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.faq.insert') }}" class="btn btn-sm btn-info shadow-sm">
                        <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Yeni Soru Cevap Ekle
                    </a>
                    <span class="float-right">{{ $faq->count() }} soru-cevap listelendi.</span>
                </div>
                <div class="card-body">
                    <div id="accordion">
                        @foreach ($faq as $card)
                           <div class="card mb-0">
                              <div class="card-header" id="headingOne">
                                 <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_{{ $card->id }}" aria-expanded="true" aria-controls="collapseOne">
                                       {{ $card->title }}
                                    </button>
                                 </h5>
                              </div>
                              <div id="collapse_{{ $card->id }}" class="collapse @if ($loop->first) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
                                 <div class="card-body">
                                    {{ $card->content }}
                                 </div>
                                 <div class="card-footer">
                                    <div class="btn-group">
                                       <a href="{{ route('dashboard.faq.edit', $card->id) }}" class="btn btn-sm btn-info text-light"><i class="fa fa-pen"></i></a>
                          
                                       <form action="{{route('dashboard.faq.delete', $card->id) }}" method="POST" class="delete-form">
                                          @csrf
                                          <button type="submit" class="btn btn-danger btn-sm delete-button" data-placement="bottom" title="Bu Kaydı Sil">
                                              <i class="fa fa-trash"></i>
                                          </button>
                                      </form
                                     
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     </div>
                </div>
                <div class="clearfix"></div>
             </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <x-slot:style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.min.css"/>
    </x-slot>

    <x-slot:script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script>
            $(".delete-form").submit(submit);

            async function submit(e){
               e.preventDefault();

               const isConfirmed =  await new Promise(promise);
               
               isConfirmed && e.target.submit();
            }

            function promise(resolve, reject){
               Swal.fire({
                  title: 'Silme işlemini onaylıyor musunuz, bu işlem geri alınamaz!',
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



