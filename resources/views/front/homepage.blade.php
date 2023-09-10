<x-app-layout>
    <x-slot:title>
        Anasayfa
    </x-slot>

@if( $sliders->count() )
<div class="hero-wrap style2">
    <div class="hero-slider-one owl-carousel">
        @foreach($sliders as $slider)
        <div class="hero-slide-item hero-slide-3 bg-f" style="background-image: url({{asset($slider->image)}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <div class="hero-content" data-speed="0.10" data-revert="true">
                            <h1>{{ $slider->title }}</h1>
                            <p>{{ $slider->content }}</p>
                            
                            <a href="{{ $slider->button_redirect }}" class="btn style1">{{ $slider->button_name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif


@if( $about )
<section class="about-wrap style1 ptb-100">
<div class="container">
    <div class="row gx-5">
        <div class="col-lg-6">
            <div class="about-img-wrap">
                <div class="about-bg-1 bg-f" style="background-image: url({{asset( $about->image )}})"></div>
                <img src="assets/img/about/about-shape-1.png" alt="Image" class="about-shape-one moveHorizontal">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="about-content">
                <div class="content-title style1">
                    <span>{{ $about->sub_title }}</span>
                    <h2>{{ $about->title }}</h2>
                    <p>
                        {!! $about->content !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endif

@if($services->count())
<section class="course-wrap pt-100 pb-75 bg-concrete">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="section-title style1 text-center mb-40">
                    <span>Hizmetlerimiz</span>
                    <h2>En İyi Sürüş Kurslarını Sunuyoruz</h2>
                </div>
            </div>
        </div>
        <div class="course-slider-one owl-carousel">
            @foreach( $services as $service )
                <div class="course-card style2">
                    <a href="{{ route('service-single', $service->slug) }}">
                    <div class="course-img">
                        <img style="width: 100%;height: 280px;object-fit: cover;" src="{{ asset( $service->image ) }}" alt="{{ $service->title }}">
                    </div>
                    </a>
                    <div class="course-info">
                        <h3><a href="{{ route('service-single', $service->slug) }}">{{ $service->title }}</a></h3>
                        <p>{{ substr(strip_tags($service->content), 0,150) }}</p>
                        <a class="btn style2" href="{{ route('service-single', $service->slug) }}">
                            İncele <i class="flaticon-right-arrow"></i>
                        </a>
                    </div>
                </div>
            @endforeach                  
        </div>
    </div>
</section>
@endif


<section class="why-choose-wrap style2 ptb-100">
    <div class="container">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                <div class="wh-content">
                                            <div class="section-title style1">
                    <span>Neden Bizi Tercih Etmelisiniz? </span>
                    <h2>Deneyimli, Samimi ve Güvenilir Bir Sürücü Kursu</h2>
                </div>
                                           
                    <div class="feature-item-wrap">
                                                        <div class="feature-item style2">
                            <div class="feature-icon">
                                <i class="flaticon-driving-license"></i>
                            </div>
                            <div class="feature-text">
                                <h3>Tam lisanslı</h3>
                                <p>Lorem ipsum dolor amet consectetur adipisicing elit sed eiusmod tempor</p>
                            </div>
                        </div>
                                                        <div class="feature-item style2">
                            <div class="feature-icon">
                                <i class="flaticon-van"></i>
                            </div>
                            <div class="feature-text">
                                <h3>Profesyonel Sarma</h3>
                                <p>Lorem ipsum dolor amet consectetur adipisicing elit sed eiusmod tempor</p>
                            </div>
                        </div>
                                                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                <div class="quote-form">
                    <div class="quote-title">
                        <h2>Bize Mesaj Gönder</h2>
                    </div>
                    <form action="#" method="post" role="form">
                        
                        <div class="form-group">
                            <input type="text" name="isim" id="name" required placeholder="İsminiz Soyisminiz">
                        </div>
                        <div class="form-group">
                            <input type="email" name="mail" id="email"  required placeholder="Elektronik Posta Adresiniz">
                        </div>
                        <div class="form-group">
                            <input type="text" name="konu" id="phone_number" required  placeholder="İletmek İstediğiniz Mesajın Konusu">
                        </div>
                        <div class="form-group">
                            <textarea name="mesaj" id="msg" cols="30" rows="10" placeholder="İletmek İstediğiniz Mesajınız"></textarea>
                        </div>
                        <div class="form-group">
                            <button name="iletisim" type="submit" class="btn style1">Mesaj Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@if($blogs->count())
<section class="vehicle-wrap pt-100 pb-75 bg-concrete">
    <div class="container">
        <div class="section-title style1 text-center mb-40">
            <span>YAKIN ZAMANDA GÖNDERİLENLER</span>
            <h2>En Son Haberlerimizi Okuyun</h2>
        </div>            
        <div class="vehicle-slider-one owl-carousel">
            @foreach($blogs as $blog)
            <div class="course-card style2">
                <a href="{{ route('blog-single', $blog->slug) }}">
                    <div class="course-img">
                        <img style="width: 100%;height: 280px;object-fit: cover;" src="{{ asset( $blog->image ) }}" alt="{{ $blog->title }}">
                    </div>
                </a>
                <div class="course-info">
                    <h3><a href="{{ route('blog-single', $blog->slug) }}">{{ $blog->title }}</a></h3>
                    <p>{{ substr(strip_tags($blog->content), 0,150) }}</p>
                    <a class="btn style2" href="{{ route('blog-single', $blog->slug) }}">
                        İncele <i class="flaticon-right-arrow"></i>
                    </a>
                </div>
            </div>
            @endforeach
                                                
        </div>
    </div>
</section>
@endif

<div class="cta-wrap style1 bg-downriver ptb-100">
    <div class="container">
        <div class="row align-items-center cta-text">
            <div class="col-lg-8 col-md-7">
                                            <div class="content-title">
                    <h2 class="text-white">Bizimle İletişime Geçmek İster misiniz?</h2>
                    </div>
                                       
            </div>
            <div class="col-lg-4 col-md-5 text-end">
                <a href="{{ route('channel') }}" class="btn style1">İletişime Geç</a>
            </div>
        </div>
    </div>
</div>

@if($teams->count())
<section class="team-wrap pt-100 pb-75">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-10 offset-lg-1">
                                        <div class="section-title style1 text-center mb-40">
                    <span>Ekibimiz</span>
                    <h2>Profesyonel Eğitmenimiz</h2>
                </div>
            </div>
        </div>
        <div class="team-slider-one owl-carousel">
            @foreach($teams as $team)
                <div class="team-card style1">
                    <div class="team-img">
                        <img style="width: 100%" src="{{ asset( $team->image )}}" alt="{{ $team->full_name}}">
                        <ul class="social-profile list-style style1">
                                <li><a href="{{ $team->socials->get('facebook')}}" ><i class="fab fa-facebook"></i></a></li>
                                <li><a href="{{ $team->socials->get('instagram')}}" ><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{ $team->socials->get('youtube')}}" ><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{{ $team->socials->get('pinterest')}}" ><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-info-wrap">
                        <div class="team-info">
                            <h3><a>{{ $team->full_name}}</a></h3>
                            <span>{{ $team->degree}}</span>
                        </div>
                        <a class="team-link"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            @endforeach   
        </div>
    </div>
</section>

@endif


<div class="counter-area">
    <div class="container">
        <div class="counter-card-wrap">
            <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-6">
                    <div class="counter-card">
                            <span class="counter-icon">
                            <i class="flaticon-graduated"></i>
                            </span>
                        <div class="counter-text">
                            <h2 class="counter-num">
                                <span class="odometer" data-count="800"></span>
                                <span class="target">+</span>
                            </h2>
                            <p>MUTLU MÜŞTERİ</p>
                        </div>
                    </div>
                </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-6">
                    <div class="counter-card">
            <span class="counter-icon">
            <i class="flaticon-reading"></i>
            </span>
                        <div class="counter-text">
                            <h2 class="counter-num">
                                <span class="odometer" data-count="20"></span>
                                <span class="target">+</span>
                            </h2>
                            <p>ŞUBE SAYISI</p>
                        </div>
                    </div>
                </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-6">
                    <div class="counter-card">
                        <span class="counter-icon">
                        <i class="flaticon-teacher"></i>
                        </span>
                        <div class="counter-text">
                            <h2 class="counter-num">
                                <span class="odometer" data-count="234"></span>
                                <span class="target">+</span>
                            </h2>
                            <p>ÇALIŞAN SAYISI</p>
                        </div>
                    </div>
                </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-6">
                    <div class="counter-card">
                            <span class="counter-icon">
                            <i class="flaticon-car"></i>
                            </span>
                        <div class="counter-text">
                            <h2 class="counter-num">
                                <span class="odometer" data-count="1500"></span>
                                <span class="target">+</span>
                            </h2>
                            <p>OLUMLU GERİDÖNÜŞ</p>
                        </div>
                    </div>
                </div>
                                    </div>
        </div>
    </div>
</div>

@if($comments->count())
<section class="testimonial-wrap ptb-100">
    <div class="container">
        <div class="section-title style1 text-center mb-40">
            <span>MÜŞTERİ GERİ BİLDİRİM YAYINLARI</span>
            <h2>Müşterimiz Ne Diyor</h2>
        </div>
        <div class="testimonial-slider-two owl-carousel">
            @foreach($comments as $comment)
                <div class="testimonial-card style1">
                    <p class="client-quote">{{ $comment->content }}</p>
                    <div class="client-info-wrap">
                        <div class="client-img">
                            <img src="{{ asset( $comment->image) }}" alt="{{ $comment->name }}">
                        </div>
                        <div class="client-info">
                            <h3>{{ $comment->name }}</h3>
                            <span>{{ $comment->subname }}</span>
                        </div>
                        <div class="quote-icon">
                            <i class="flaticon-quote"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endif


@if($blogs->count())
<section class="blog-wrap pt-100 pb-75 bg-concrete">
    <div class="container">
        <div class="section-title style1 text-center mb-40">
            <span>Haberlerimiz</span>
            <h2>Bizden Haberler</h2>
        </div>
        <div class="row justify-content-center">
            @foreach($blogs as $blog)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="blog-card style1">
                    <a href="{{ route('blog-single', $blog->slug) }}">
                    <div class="blog-img">
                        <img style="width: 100%;height: 250px;object-fit: cover;" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                    </div>
                    </a>
                    <div class="blog-info">
                        <ul class="blog-metainfo  list-style">
                            <li><i class="fa fa-calendar"></i> <a href="{{ route('blog-single', $blog->slug) }}">{{ $blog->created_at }}</a></li>
                        </ul>
                        <h3><a href="{{ route('blog-single', $blog->slug) }}">{{ $blog->title }}</a></h3>
                        <p>{{ substr( strip_tags( $blog->content ), 0, 150) }}</p>
                        <a href="{{ route('blog-single', $blog->slug) }}" class="link style2">Devamını Oku
                            <i class="flaticon-right-arrow"></i>
                        </a>
                    </div>
                </div>
            </div> 
            @endforeach             
        </div>
    </div>
</section>

@endif

</x-app-layout>