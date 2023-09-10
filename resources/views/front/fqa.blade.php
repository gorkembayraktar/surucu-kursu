<x-app-layout>
    <x-slot:title>
        Sıkça Sorulanlar
    </x-slot>

    <x-front.breadcrumb class="bg-f" title="Sıkça Sorulanlar" />

    <section class="faq-wrap ptb-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faq as $f)
                            
                       
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $f->id }}" aria-expanded="true" aria-controls="collapseOne">
                                    <span>
                                    <i class="flaticon-right-arrow-1 plus"></i>
                                    <i class="flaticon-down-arrow minus"></i>
                                    </span>
                                    {{ $f->title }}
                                </button>
                            </h2>
                            <div id="collapse-{{ $f->id }}" class="accordion-collapse collapse @if ($loop->first) show @endif" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="single-product-text">
                                        <p>{{ $f->content }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>