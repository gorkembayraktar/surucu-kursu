<x-app-layout>
    <x-slot:title>
        Hizmetlerimiz
    </x-slot>

    <x-front.breadcrumb class="bg-f" title="Hizmetlerimiz" />
    
    <section class="course-wrap ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach( $services as $s )
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="course-card style2">
                        <a href="{{ route('service-single', $s->slug ) }}">
                        <div class="course-img">
                            <img style="width: 100%;height: 280px;object-fit: cover;" src="{{ asset( $s->image ) }}" alt="{{ $s->title }}">
                        </div>
                        </a>
                        <div class="course-info">
                            <h3><a href="{{ route('service-single', $s->slug) }}"> {{ $s->title }}</a></h3>
                            <p>{!! $s->content !!}</p>
                            <a class="btn style2" href="{{ route('service-single', $s->slug) }}">
                                İncele <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                                    
            </div>
            <div class="page-navigation mt-10">
                {{ $services->links('vendor.pagination.front') }}
            </div>
        </div>
    </section>


</x-app-layout>