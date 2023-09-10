<x-app-layout>
    <x-slot:title>
        İletişim
    </x-slot>

    <x-front.breadcrumb class="bg-f" title="İletişim" />

    <section class="contact-us-wrap pt-100">
        <div class="container">
            <div class="row gx-5 pb-100">
                <div class="col-xl-7 col-lg-7">
                    <div class="contact-form">
                        <div class="content-title style1 mb-20">
                            <h2>Bize Mesaj Gönder</h2>
                        </div>
                        <form class="form-wrap" id="contactForm" action="" method="post" role="form">
                            <input name="ip" type="hidden" class="form-control" value="88.234.84.95">
                            <input name="durum" type="hidden" class="form-control" value="1">
                            <input type="hidden" name="tarih" value="14.06.2023 09:54:57">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="isim" id="name" required placeholder="İsminiz Soyisminiz">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="mail" id="email"  required placeholder="Elektronik Posta Adresiniz">
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="konu" id="phone_number" required  placeholder="İletmek İstediğiniz Mesajın Konusu">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group v1">
                                        <textarea name="mesaj" id="message" placeholder="İletmek İstediğiniz Mesajınız" cols="30" rows="10" required></textarea>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button name="iletisim" class="btn style1 w-100 d-block">Mesaj Gönder</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="contact-box-wrap">
                        <div class="content-title style1 mb-30">
                            <h2>İletişim Detayları</h2>
                        </div>
                        <div class="contact-item">
<span class="contact-icon">
<i class="ri-phone-line"></i>
</span>
                            <div class="contact-info">
                                <h5>Telefon</h5>
                                <a href="tel:{{ $settings->get('phone') }}">{{ $settings->get('phone') }}</a>
                            </div>
                        </div>
                        <div class="contact-item">
<span class="contact-icon">
<i class="ri-mail-send-line"></i>
</span>
                            <div class="contact-info">
                                <h5>E-Posta</h5>
                                <a href="mailto:{{ $settings->get('email') }}">{{ $settings->get('email') }}</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">
                            <i class="ri-map-pin-line"></i>
                            </span>
                            <div class="contact-info">
                                <h5>Adres</h5>
                                <p>{{ $settings->get('adress') }}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">
                            <i class="ri-share-line"></i>
                            </span>
                            <div class="contact-info">
                                <h5>Sosyal Medya</h5>
                                <ul class="social-profile list-style style1">
                                    <li><a href="{{ $settings->get('facebook') }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $settings->get('instagram') }}"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $settings->get('youtube') }}"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="{{ $settings->get('twitter') }}"><i class="fab fa-twitter"></i></a></li>                                                                                                          </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @if( $settings->get('mapiframe') )
    <!-- google-map-section -->
    <section class="google-map-section">
        <div class="map-column">
            <div class="google-map-area"> {!! $settings->get('mapiframe') !!} </div>
        </div>
    </section>
    <!-- google-map-section end -->
    @endif

</x-app-layout>