<x-back-layout>
    <x-slot:title>
        {{ $email->title }} - İleti
    </x-slot>
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                 
                    <div class="card-title">
                        <a href="{{ route('dashboard.email.index') }}" class="btn btn-sm btn-default shadow-sm">
                            <i class="fas fa-arrow-left fa-sm"></i> Geri
                    </a>
                        Mail Oku
                    </div>
                    <div class="card-tools">
                        <a href="@if($prev) {{ route('dashboard.email.show', $prev->id)  }}@endif" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                        <a href="@if($next) {{ route('dashboard.email.show', $next->id)  }}@endif" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="mailbox-read-info">
                        <h5>{{ $email->subject }}</h5>
                        <h6>Kimden: {{ $email->mail }}
                        <span class="mailbox-read-time float-right">{{ $email->created_at }}</span></h6>
                    </div>
                    <div class="mailbox-read-message">
                        {{ $email->content ?? 'Bu iletide bir mesaj bulunmuyor.' }}
                    </div>
                </div>
                <div class="card-footer clearfix">
                   
                </div>
             </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6 col-12">
        
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Bu İleti Hakkında Detaylar
                        </button>
                    </h5>
                    </div>
                
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Aygıt: {{ $email->device_info }}</p>
                        
                        <p>Ip: {{ $email->ip_adress }}</p>
                        <code>
                            {{ $email->ip_info_json }}
                        </code>
                    </div>
                    </div>
                </div>
                   
                  
            </div>
        </div>
        <!-- /.col -->
    </div>



</x-back-layout>



