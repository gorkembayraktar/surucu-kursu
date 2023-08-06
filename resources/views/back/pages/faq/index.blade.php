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
                    <span class="float-right">{X} soru-cevap listelendi.</span>
                </div>
                <div class="card-body">
                    <div id="accordion">
                        <div class="card mb-0">
                           <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                 <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_5" aria-expanded="true" aria-controls="collapseOne">
                                 Sıkça Sorulan Sorusu Gelecek?                                        </button>
                              </h5>
                           </div>
                           <div id="collapse_5" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. .
                              </div>
                              <div class="card-footer">
                                 <div class="btn-group">
                                    <a href="" class="btn btn-sm btn-info text-light"><i class="fa fa-pen"></i></a>
                                    <!-- route http de tanımlı name ile gelir -->
                                    <a href="#" data-id="1" class="btn btn-sm btn-danger text-light btn-delete"><i class="fa fa-times"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card mb-0">
                           <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                 <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_6" aria-expanded="true" aria-controls="collapseOne">
                                 Sıkça Sorulan Sorusu Gelecek?                                        </button>
                              </h5>
                           </div>
                           <div id="collapse_6" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.
                              </div>
                              <div class="card-footer">
                                 <div class="btn-group">
                                    <a href="https://guzellik.gorkembayraktar.com/dashboard/kurumsal/sikca-sorulanlar/duzenle/6" class="btn btn-sm btn-info text-light"><i class="fa fa-pen"></i></a>
                                    <!-- route http de tanımlı name ile gelir -->
                                    <a href="#" onclick="youAreSure(6)" class="btn btn-sm btn-danger text-light"><i class="fa fa-times"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
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

            $(".btn-delete").click(areYouSure);

            function areYouSure(){
                const id = this.dataset.id;
                Swal.fire({
                    title: 'Bu işlemi yapmak istediğinize emin misiniz?',
                    showDenyButton: true,
                    confirmButtonText: 'Vazgeç',
                    denyButtonText: `Sil`,
                    }).then((result) => {
                        if (result.isDenied) {
                        
                        }
                });
            }
        </script>   
    </x-slot>


</x-back-layout>



