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
                                <a href="tel:0(123) 000 00 10">0(123) 000 00 10</a>
                                <a href="tel:0(123) 000 00 10">0(123) 000 00 10</a>
                            </div>
                        </div>
                        <div class="contact-item">
<span class="contact-icon">
<i class="ri-mail-send-line"></i>
</span>
                            <div class="contact-info">
                                <h5>E-Posta</h5>
                                <a href="mailto:surucukursu@smurfweb.com">surucukursu@smurfweb.com</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">
                            <i class="ri-map-pin-line"></i>
                            </span>
                            <div class="contact-info">
                                <h5>Adres</h5>
                                <p>Demirtaş Mah. 16245 Osmangazi/Bursa</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">
                            <i class="ri-share-line"></i>
                            </span>
                            <div class="contact-info">
                                <h5>Sosyal Medya</h5>
                                <ul class="social-profile list-style style1">
                                                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                                                                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                                                                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                                                                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                                                                                                                        </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- google-map-section -->
    <section class="google-map-section">
        <div class="map-column">
            <div class="google-map-area">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40674.95943414137!2d-74.02830237109018!3d40.73596674750672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a197c06b7cb%3A0x40a06c78f79e5de6!2sOzodlik%20minorasi!5e0!3m2!1suz!2sus!4v1594532528185!5m2!1suz!2sus" width="100%" height="390px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>                </div>
        </div>
    </section>
    <!-- google-map-section end -->

</x-app-layout>