
<header class="header-wrap style1">
    <div class="header-top">
        <button type="button" class="close-sidebar">
            <i class="ri-close-fill"></i>
        </button>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-12">
                    <div class="header-top-left">
                        <ul class="contact-info list-style">
                            <li><i class="flaticon-call"></i> <a href="tel:{{ $settings->get('phone') }}">{{ $settings->get('phone') }}</a></li>
                            <li>
                                <i class="flaticon-envelope"></i> 
                                <a href="mailto:{{ $settings->get('email') }}"><span class="__cf_email__" >{{ $settings->get('email') }}</span></a>
                            </li>
                            <li>
                                <i class="flaticon-location-1"></i>
                                <p>{{ $settings->get('adress') }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="header-top-right">
                        <ul class="social-profile list-style style2">
                            @if( $settings->get('facebook') )
                            <li><a href="{{ $settings->get('facebook') }}"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if( $settings->get('instagram') )
                            <li><a href="{{ $settings->get('instagram') }}"><i class="fab fa-instagram""></i></a></li>
                            @endif
                            @if( $settings->get('youtube') )
                            <li><a href="{{ $settings->get('youtube') }}"><i class="fab fa-youtube"></i></a></li>
                            @endif
                            @if( $settings->get('twitter') )
                            <li><a href="{{ $settings->get('twitter') }}"><i class="fab fa-twitter"></i></a></li>
                            @endif
                                                                                                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-bottom">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img style="height: 85px" src="{{ asset( $settings->get('logo') ) }}" alt="logo">
                </a>
                <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                    <div class="menu-close xl-none">
                        <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                    </div>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="{{ route('index') }}">Anasayfa</a></li>
                        <li class="nav-item  has-dropdown"><a class="nav-link " href="#">Kurumsal 
                            <i class="ri-arrow-down-s-fill"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('about-us') }}">Hakkımızda</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('team') }}">Ekibimiz</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('fqa') }}">Sıkça Sorulanlar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item  has-dropdown"><a class="nav-link " href="{{ route('services') }}">Hizmetler     <i class="ri-arrow-down-s-fill"></i></a>
                            <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="hizmet-icerik/otoyol-surusu-20.html">Otoyol Sürüşü</a></li>
                                            <li class="nav-item"><a class="nav-link" href="hizmet-icerik/on-lisans-kursu-22.html">Ön Lisans Kursu</a></li>
                                            <li class="nav-item"><a class="nav-link" href="hizmet-icerik/genc-surucu-kursu-25.html">Genç Sürücü Kursu</a></li>
                                            <li class="nav-item"><a class="nav-link" href="hizmet-icerik/uluslararasi-surus-21.html">Uluslararası Sürüş</a></li>
                                            <li class="nav-item"><a class="nav-link" href="hizmet-icerik/trafik-bilimi-24.html">Trafik Bilimi</a></li>
                                        <li><a href="{{ route('services') }}">TÜMÜNÜ GÖRÜNTÜLE</a></li>
                            </ul>
                        </li>
                        <li class="nav-item  has-dropdown"><a class="nav-link " href="bilgiler">Gerekli Bilgiler   <i class="ri-arrow-down-s-fill"></i></a>
                            <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="bilgi-icerik/konuk-daniel-stern-ile-yolu-aydinlatmak-1.html">Konuk Daniel Stern ile Yolu Aydınlatmak</a></li>
                                            <li class="nav-item"><a class="nav-link" href="bilgi-icerik/bu-pandemi-sirasinda-nasil-guvenle-yolculuk-yapilir-2.html">Bu Pandemi Sırasında Nasıl Güvenle Yolculuk Yapılır?</a></li>
                                            <li class="nav-item"><a class="nav-link" href="bilgi-icerik/otomatik-surus-neden-gecmenize-yardimci-olur-3.html">Otomatik Sürüş Neden Geçmenize Yardımcı Olur?</a></li>
                                    <li><a href="bilgiler.html">TÜMÜNÜ GÖRÜNTÜLE</a></li>
                            </ul>
                        </li>
                        <li class="nav-item  has-dropdown"><a class="nav-link " href="#">Multimedya <i class="ri-arrow-down-s-fill"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('gallery-photo') }}">Foto Galeri</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('gallery-media') }}">Video Galeri</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('blog') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('channel') }}">İletişim</a></li>
                    </ul>                    
                </div>
            </nav>
            <div class="mobile-bar-wrap">
                <div class="mobile-sidebar">
                    <i class="ri-menu-4-line"></i>
                </div>
                <button class="searchbtn xl-none" type="button">
                </button>
                <div class="mobile-menu xl-none">
                    <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>