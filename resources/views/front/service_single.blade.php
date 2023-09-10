<x-app-layout>
    <x-slot:title>
       {{ $service->title }}
    </x-slot>
    <x-slot:style>
        <style>
            .hactive{
                font-weight: bold !important;
                color:#091851 !important;
            }
        </style>
     </x-slot>

    <x-front.breadcrumb class="bg-f" title="Otoyol Sürüşü" parentUrl="hizmetlerimiz" parentTitle="Hizmetlerimiz" />

    <div class="blog-details-wrap ptb-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-xl-4 col-lg-12">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h4>Hizmetlerimiz</h4>
                            <div class="category-box style2">
                                <ul class="list-style">
                                    @foreach( $services as $s )
                                        <li><a class="@if( $s->id == $service->id) hactive @endif" href="{{ route( 'service-single', $s->slug ) }}"><i class="flaticon-right-arrow-1"></i> {{ $s->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12">
                    <article>
                        <div class="post-img">
                            <img style="width: 100%" src="{{ asset( $service->image ) }}" alt="{{ $service->title }}"> 
                        </div>
                        <h3>{{ $service->title }}</h3>
                        <div class="post-para">
                            {!! $service->content !!}
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </div>

</div>

</x-app-layout>