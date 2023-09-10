<x-app-layout>
    <x-slot:title>
        Hakkımızda
    </x-slot>

    <x-front.breadcrumb class="bg-f" title="Hakkımızda" />

    <section class="about-wrap style1 ptb-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6">
                    <div class="about-img-wrap">
                        <div class="about-bg-1 bg-f" style="background-image: url({{ asset( $page->image ) }})"></div>
                        <img src="assets/img/about/about-shape-1.png" alt="Image" class="about-shape-one moveHorizontal">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="content-title style1">
                            <span>{{  $page->sub_title}}</span>
                            <h2>{{ $page->title }}</h2>
                            <div>
                                {!! $page->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>