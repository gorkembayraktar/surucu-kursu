<p align="center">
<a href="https://gorkembayraktar.com" target="_blank">
<img src="/public/logo_dark.png" width="400" alt="Laravel Logo">
</a>
<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>


<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Kurumsal Sürücü Kursu Web Sitesi
Bu proje Laravel 10. sürüm ile hazırlanmıştır. Kurumsal işletme "sürücü kursu" tanıtımını gelişmiş yönetim paneli yapabilirsiniz.

## Canlı
https://drivingschool.smurftheme.net/
## Panel
https://drivingschool.smurftheme.net/dashboard/

<hr>

## Kurulum
Projeyi locale aldıktan sonra aşağıda yer alan adımları uygulayınız.
#### 1) .env.example dosyasını düzenleyin
    - .env.example isimli dosyayı .env olarak yeniden adlandırın.
    -  Mysql'de veritabanı oluşturunuz. Oluşturduğunuz dbname .env dosyasında tanımlanmalıdır.
    - .env dosyasında konfigürasyon değerlerini localinizdeki bilgiler ile değiştiriniz.
```
    # APP_URL değerini çalışma dizininiz olarak tanımlayınız.
    APP_URL=http://localhost

    # Database Bilgileriniz
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
```
#### 2) Gereklik bağımlılıkların yüklenmesi
Paketlerin yüklenmesi için php paket yöneticisi composer kurulu olan bir ortamda aşadağıdaki komutu çalıştırınız.
```
composer install
```
Tabloların ve örnek datanın initialize işlemi
Uyarı: Tablolar mevcut ve data girdisi var ise tüm veriler silinecek ve tablolar varsayılan ayarlarda seed edilecektir.
```
php artisan migrate:refresh --seed
```
Proje için özel anahtar oluşturulması
```
php artisan key:generate
```
#### 3) Projeyi dev olarak çalıştır
Eğer projeyi dev olarak başlatırsanız, .env dosyasında APP_URL=http://localhost:<AÇILAN PORT> olarak tanımlama yapınız.
```
php artisan serve
```

#### 4) Projeyi Sunucuda Serve etmek
Production ortamında paket boyutunu küçültmek için yalnızca gerekli olan bağımlılıklar kullanılmalıdır. Dev dependencies paketlerinin kaldırılması ve optimizasyon işlemi için aşağıda yer alan komutu dizininizde çalıştırınız:
```
composer install --no-dev --optimize-autoloader
```
Projenizi uzak sunucuda çalıştırmak için: 
(php artisan serve bu komutu kullanmadan erişilebilir olması)

   - dizinde bulunan .htaccess.server dosya adını .htaccess olarak yeniden adlandırın.


Kurulum adımları işte bu kadar!
<hr>

### Yönetim Paneli
    - Günlük, haftalık, aylık ve yıllık görüntülenmesini grafik ile görüntüleyebilir
    - Blog yazılarını paylaşabilir,
    - Hizmetler kategorisinden hizmetlerinizi düzenleyebilir,
    - Multi Medya ile sürücü kursunuzu/işletmenizin tanıtımını içeren video/görseller yükleyebilir,
    - Slider ile anasayfadaki ziyaretçilerinizi karşılayabilir,
    - Sıkça sorulanlar ile Google SEO FAQ arama motoruna eklenebilir,
    - Müşteri yorumları ile işletmenizi tanıtabilir,
    - Ayarlar ile logo/icon, email, iletişim bilgilerinizi kaydedebilirsiniz.
    - Bakım modu sayesinde panelde değişiklikler yapabilir websitenizi yayına alabilirsiniz.




