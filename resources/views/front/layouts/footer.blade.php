<footer class="footer-wrap pt-100">
    <div class="container">
        <div class="row pb-75">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="footer-widget">
                    <a href="{{ route('index') }}" class="footer-logo">
                        <img src="{{ asset('') }}logo_dark.png" alt="Logo">
                    </a>
                    <p class="comp-desc"><p style="outline: none; padding: 0px; margin-bottom: 20px; line-height: 24px;"><font color="#cec6ce">Türkiye'nin en deneyimli en kaliteli Ehliyet ve Sürücü Kursu SmurfWeb Sürücü Kursu olarak, Ankara'da  ehliyet sahibi olmak isteyen sürücü adaylarını kurumumuza bekliyoruz.. </font><br></p></p>
                    <ul class="social-profile list-style style1">
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
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6  pe-xl-5">
                <div class="footer-widget">
                    <h3 class="footer-widget-title">Hızlı Menü</h3>
                    <ul class="footer-menu list-style">
                        <li><a href="{{ route('index') }}"><i class="flaticon-right-arrow-1"></i> Anasayfa</a></li>
                        <li><a href="{{ route('page-single', 'hakkimizda') }}"><i class="flaticon-right-arrow-1"></i> Hakkımızda</a></li>
                        <li><a href="{{ route('team') }}"><i class="flaticon-right-arrow-1"></i> Ekibimiz</a></li>
                        <li><a href="{{ route('fqa') }}"><i class="flaticon-right-arrow-1"></i> Sıkça Sorulanlar</a></li>
                        <li><a href="{{ route('services') }}"><i class="flaticon-right-arrow-1"></i> Hizmetlerimiz</a></li>
                        <li><a href="{{ route('blog') }}"><i class="flaticon-right-arrow-1"></i> Gerekli Bilgiler</a></li>
                        <li><a href="{{ route('gallery-photo') }}"><i class="flaticon-right-arrow-1"></i> Foto Galeri</a></li>
                        <li><a href="{{ route('gallery-media') }}"><i class="flaticon-right-arrow-1"></i> Video Galeri</a></li>
                        <li><a href="{{ route('blog') }}"><i class="flaticon-right-arrow-1"></i> Bizden Haberler</a></li>
                        <li><a href="{{ route('channel') }}"><i class="flaticon-right-arrow-1"></i> İletişim</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-widget-title">Hizmetlerimiz</h3>
                    <ul class="footer-menu list-style">
                        @foreach($menu->services as $s)
                        <li><a href="{{ route("service-single", $s->slug) }}"><i class="flaticon-right-arrow-1"></i> {{ $s->title }}</a></li>
                        @endforeach
                            
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-widget-title">İletişim Bilgileri</h3>
                    <ul class="contact-info list-style">
                        <li>
                            <span><i class="flaticon-phone-call"></i></span>
                            <h6>Telefon</h6>
                            <a href="tel:{{ $settings->get('phone') }}" target="_blank">{{ $settings->get('phone') }}</a>
                        </li>
                        <li>
                            <span><i class="fab fa-envelope"></i></span>
                            <h6>E-Posta</h6>
                            <a href="mailto:{{ $settings->get('email') }}" target="_blank">{{ $settings->get('email') }}</a>
                        </li>
                        <li>
                            <span><i class="flaticon-location-1"></i></span>
                            <h6>Adres</h6>
                            <p>{{ $settings->get('adress') }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-text">
        <div class="container">
            <p>{{ $settings->get('footer') }}</p>
        </div>
    </div>
</footer>

    

@stack('modals')

<a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>

<script src="{{ asset('') }}assets/js/jquery.min.js"></script>
<script src="{{ asset('') }}assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('') }}assets/js/form-validator.min.js"></script>
<script src="{{ asset('') }}assets/js/contact-form-script.js"></script>
<script src="{{ asset('') }}assets/js/aos.js"></script>
<script src="{{ asset('') }}assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('') }}assets/js/odometer.js"></script>
<script src="{{ asset('') }}assets/js/fancybox.js"></script>
<script src="{{ asset('') }}assets/js/jquery.appear.js"></script>
<script src="{{ asset('') }}assets/js/tweenmax.min.js"></script>
<script src="{{ asset('') }}assets/js/main.js"></script>
<script src="{{ asset('') }}assets/js/sweetalert2.all.js"></script>




@isset($js)
    {{ $js }}
@endisset

