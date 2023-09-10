<x-app-layout>
    <x-slot:title>
        Anasayfa
    </x-slot>

    <x-front.breadcrumb class="bg-f" title="Foto Galeri" />


    <section class="team-wrap ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach( $photos as $photo )
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="team-card style1">
                        <a class="course-img d-block" data-fancybox="gallery" href="{{ asset( $photo->image ) }}">
                        <div class="team-img">
                            <img style="width: 100%;height: 320px;object-fit: cover;" src="{{ asset( $photo->image ) }}" alt="Image">
                        </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="page-navigation mt-10">
                {{ $photos->links('vendor.pagination.front') }}
            </div>
        </div>
    </section>
</x-app-layout>