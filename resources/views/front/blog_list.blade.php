<x-app-layout>
    <x-slot:title>
        Blog
    </x-slot>

    <x-front.breadcrumb class="bg-f" title="Blog" />

    <div class="blog-details-wrap ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($blogs as $blog)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="blog-card style1">
                            <a href="{{ route( "blog-single", $blog->slug ) }}">
                            <div class="blog-img">
                                <img style="width: 100%;height: 250px;object-fit: cover;" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                            </div>
                            </a>
                            <div class="blog-info">
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="fa fa-calendar"></i> <a href="{{ route('blog-single',$blog->slug) }}">{{ $blog->created_at }}</a></li>
                                </ul>
                                <h3><a href="{{ route('blog-single',$blog->slug) }}"> {{$blog->title }}</a></h3>
                                <p>{{ substr( strip_tags( $blog->content), 0, 150)}}</p>
                                <a href="{{ route('blog-single',$blog->slug) }}" class="link style2">Devamını Oku
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                                        
            </div>
            <div class="page-navigation mt-10">
                {{ $blogs->links('vendor.pagination.front') }}
                
            </div>
        </div>
    </div>
</x-app-layout>

