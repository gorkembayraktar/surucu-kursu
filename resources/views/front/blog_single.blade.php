<x-app-layout>
    <x-slot:title>
     {{ $blog->title }}
    </x-slot>

    <x-front.breadcrumb class="bg-f" title="{{ $blog->title }}" />


    <div class="blog-details-wrap ptb-100">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-xl-8 col-lg-12">
                        <article>
                            <div class="post-img">
                                <img style="width: 100%" src="{{ asset( $blog->image ) }}" alt="{{ $blog->title }}">
                            </div>
                            <ul class="post-metainfo  list-style">
                                <li><i class="fa fa-calendar"></i> <a>{{ $blog->created_at }}</a></li>
                            </ul>
                            <h3>{{ $blog->title }}</h3>
                            <div class="post-para">
                                {!! $blog->content !!}
                            </div>
                        </article>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="sidebar">
                            <div class="sidebar-widget popular-post">
                                <h4>Popüler Yazılar</h4>
                                <div class="popular-post-slider owl-carousel">
                                    @foreach($last as $l)
                                    <div class="blog-card style1">
                                        <a href="{{ route('blog-single', $l->slug) }}">
                                        <div class="blog-img">
                                            <img style="width: 100%;" src="{{ asset( $l->image ) }}" alt="{{ $l->title}}">
                                        </div>
                                        </a>
                                        <div class="blog-info">
                                            <ul class="blog-metainfo  list-style">
                                                <li><i class="fa fa-calendar"></i> <a href="{{ route('blog-single', $l->slug) }}"> {{ $l->created_at }}</a></li>
                                            </ul>
                                            <h3><a href="{{ route('blog-single', $l->slug) }}">{{ $l->title}}</a></h3>
                                        </div>
                                    </div>
                                    @endforeach                          
                                </div>
                            </div>
                            <div class="sidebar-widget">
                                <h4>Hizmetlerimiz</h4>
                                <div class="category-box style2">
                                    <ul class="list-style">
                                        @foreach( $services as $service )
                                        <li><a href="{{ route('service-single', $service->slug) }}"><i class="flaticon-right-arrow-1"></i> {{ $service->title }}</a></li>
                                        @endforeach
                                             
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</x-app-layout>

