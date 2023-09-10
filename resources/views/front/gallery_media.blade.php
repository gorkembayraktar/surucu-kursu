<x-app-layout>
    <x-slot:title>
        Anasayfa
    </x-slot>

    <x-front.breadcrumb class="bg-f" title="Video Galeri" />


        <section class="team-wrap ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($videos as $video)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="team-card style1">
                            {!! $video->iframe !!}

                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="page-navigation mt-10">
                    {{ $videos->links('vendor.pagination.front') }}
                </div>
            </div>
        </section>
</x-app-layout>