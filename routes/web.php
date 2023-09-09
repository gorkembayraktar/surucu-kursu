<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\MediaController;
use App\Http\Controllers\Front\BlogController;

use App\Http\Controllers\Back\DashController;

use App\Http\Controllers\Back\LoginController;
use App\Http\Controllers\Back\SliderController;
use App\Http\Controllers\Back\CustomerCommentsController;
use App\Http\Controllers\Back\TeamsController;
use App\Http\Controllers\Back\FAQController;
use App\Http\Controllers\Back\PagesController;
use App\Http\Controllers\Back\ServicesController;
use App\Http\Controllers\Back\BlogController as AdminBlogController;

use App\Http\Controllers\Back\MediaController as AdminMediaController;


use App\Http\Controllers\Back\SettingsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'main'])->name('index');

Route::get('hakkimizda', [HomeController::class, 'about_us'])->name('about-us');
Route::get('ekibimiz', [HomeController::class, 'team'])->name('team');
Route::get('sikca-sorulanlar', [HomeController::class, 'fqa'])->name('fqa');

Route::get('hizmetlerimiz',[ServiceController::class, 'services'])->name('services');
Route::get('hizmet-icerik/{slug}',[ServiceController::class, 'service'])->name('service');

Route::get('foto-galeri',[MediaController::class, 'gallery_photo'])->name('gallery-photo');
Route::get('video-galeri',[MediaController::class, 'gallery_media'])->name('gallery-media');


Route::get('blog',[BlogController::class, 'list'])->name('blog');
Route::get('blog/{slug}',[BlogController::class, 'single'])->name('blog-single');

Route::get('iletisim',[HomeController::class, 'channel'])->name('channel');


// Yönetim paneli
Route::middleware('isLogin')->group(function(){
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'post'])->name('login.post');
});


Route::get('{login}', function(){
    return redirect('/login');
})
->where('login', '(giriş|giris|admin)');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashController::class, 'index'])->name('dashboard.index');
    Route::post('logout', [LoginController::class, 'logout'])->name('dashboard.logout');

    Route::prefix('slider')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('dashboard.slider.index');
        Route::get('{id}/duzenle', [SliderController::class, 'edit'])->name('dashboard.slider.edit');
        Route::post('{id}/duzenle', [SliderController::class, 'edit_post'])->name('dashboard.slider.edit.post');
        Route::post('{id}/sil', [SliderController::class, 'delete_post'])->name('dashboard.slider.delete.post');
        Route::post('toggle', [SliderController::class, 'toggle_post'])->name('dashboard.slider.toggle.post');
        Route::get('ekle', [SliderController::class, 'insert'])->name('dashboard.slider.insert');
        Route::post('ekle', [SliderController::class, 'post'])->name('dashboard.slider.insert.post');
    });

    Route::prefix('musteri-yorumlari')->group(function () {
        Route::get('/', [CustomerCommentsController::class, 'index'])->name('dashboard.customer-comments.index');
        Route::get('ekle', [CustomerCommentsController::class, 'insert'])->name('dashboard.customer-comments.insert');
        Route::post('ekle', [CustomerCommentsController::class, 'post'])->name('dashboard.customer-comments.insert.post');

        Route::get('{id}/duzenle', [CustomerCommentsController::class, 'edit'])->name('dashboard.customer-comments.edit');
        Route::post('{id}/duzenle', [CustomerCommentsController::class, 'edit_post'])->name('dashboard.customer-comments.edit.post');
        Route::post('{id}/sil', [CustomerCommentsController::class, 'delete_post'])->name('dashboard.customer-comments.delete');
        
        Route::post('toggle', [CustomerCommentsController::class, 'toggle_post'])->name('dashboard.customer-comments.toggle.post');
    });

    Route::prefix('ekibimiz')->group(function () {
        Route::get('/', [TeamsController::class, 'index'])->name('dashboard.teams.index');
        Route::get('ekle', [TeamsController::class, 'insert'])->name('dashboard.teams.insert');
        Route::post('ekle', [TeamsController::class, 'post'])->name('dashboard.teams.insert.post');

        Route::get('{id}/duzenle', [TeamsController::class, 'edit'])->name('dashboard.teams.edit');
        Route::post('{id}/duzenle', [TeamsController::class, 'edit_post'])->name('dashboard.teams.edit.post');
        Route::post('{id}/sil', [TeamsController::class, 'delete_post'])->name('dashboard.teams.delete');
        
    });

    Route::prefix('sikca-sorulanlar')->group(function () {
        Route::get('/', [FAQController::class, 'index'])->name('dashboard.faq.index');
        Route::get('ekle', [FAQController::class, 'insert'])->name('dashboard.faq.insert');
        Route::post('ekle', [FAQController::class, 'post'])->name('dashboard.faq.insert.post');

        Route::get('{id}/duzenle', [FAQController::class, 'edit'])->name('dashboard.faq.edit');
        Route::post('{id}/duzenle', [FAQController::class, 'edit_post'])->name('dashboard.faq.edit.post');
        Route::post('{id}/sil', [FAQController::class, 'delete_post'])->name('dashboard.faq.delete');

    });

    Route::prefix('sayfalar')->group(function () {
        Route::get('/', [PagesController::class, 'index'])->name('dashboard.page.index');
        Route::get('ekle', [PagesController::class, 'insert'])->name('dashboard.page.insert');
        Route::post('ekle', [PagesController::class, 'post'])->name('dashboard.page.insert.post');

        Route::get('{id}/duzenle', [PagesController::class, 'edit'])->name('dashboard.page.edit');
        Route::post('{id}/duzenle', [PagesController::class, 'edit_post'])->name('dashboard.page.edit.post');
        Route::post('{id}/sil', [PagesController::class, 'delete_post'])->name('dashboard.page.delete');

        Route::post('toggle', [PagesController::class, 'toggle_post'])->name('dashboard.page.toggle.post');
    });

    Route::prefix('hizmetler')->group(function () {
        Route::get('/', [ServicesController::class, 'index'])->name('dashboard.services.index');
        Route::get('ekle', [ServicesController::class, 'insert'])->name('dashboard.services.insert');
        Route::post('ekle', [ServicesController::class, 'post'])->name('dashboard.services.insert.post');
       
        Route::get('{id}/duzenle', [ServicesController::class, 'edit'])->name('dashboard.services.edit');
        Route::post('{id}/duzenle', [ServicesController::class, 'edit_post'])->name('dashboard.services.edit.post');
        Route::post('{id}/cop', [ServicesController::class, 'trash_post'])->name('dashboard.services.trash');
        Route::post('{id}/sil', [ServicesController::class, 'delete_post'])->name('dashboard.services.delete');
        Route::post('{id}/action', [ServicesController::class, 'action_post'])->name('dashboard.services.action');
    });

    Route::prefix('blog')->group(function () {
        Route::get('/', [AdminBlogController::class, 'index'])->name('dashboard.blog.index');
        Route::get('ekle', [AdminBlogController::class, 'insert'])->name('dashboard.blog.insert');
        Route::post('ekle', [AdminBlogController::class, 'post'])->name('dashboard.blog.insert.post');


        Route::get('kategoriler', [AdminBlogController::class, 'category'])->name('dashboard.blog.category');
        Route::post('kategoriler', [AdminBlogController::class, 'category_post'])->name('dashboard.blog.category.post');
    });

    Route::prefix('media')->group(function () {
        Route::get('foto-galeri', [AdminMediaController::class, 'photo'])->name('dashboard.media.photo');
        Route::post('foto-galeri/ekle', [AdminMediaController::class, 'photo_post'])->name('dashboard.media.photo.post');

        Route::get('video-galeri', [AdminMediaController::class, 'video'])->name('dashboard.media.video');

        Route::get('video-galeri/ekle', [AdminMediaController::class, 'video_insert'])->name('dashboard.media.video.insert');
        Route::post('video-galeri/ekle', [AdminMediaController::class, 'video_insert_post'])->name('dashboard.media.video.insert.post');
    });

    Route::prefix('ayarlar')->group(function () {
        Route::get('genel', [SettingsController::class, 'general'])->name('dashboard.settings.general');
        Route::post('genel', [SettingsController::class, 'general_post'])->name('dashboard.settings.general.post');
        Route::get('iletisim-bilgileri', [SettingsController::class, 'contact'])->name('dashboard.settings.contact');
        Route::post('iletisim-bilgileri', [SettingsController::class, 'contact_post'])->name('dashboard.settings.contact.post');
        Route::get('gelismis', [SettingsController::class, 'advanced'])->name('dashboard.settings.advanced');
        Route::post('gelismis', [SettingsController::class, 'advanced_post'])->name('dashboard.settings.advanced.post');
        Route::get('email', [SettingsController::class, 'email'])->name('dashboard.settings.email');
        Route::post('email', [SettingsController::class, 'email_post'])->name('dashboard.settings.email.post');
        Route::get('bakim-modu', [SettingsController::class, 'maintenance'])->name('dashboard.settings.maintenance');
        Route::post('bakim-modu', [SettingsController::class, 'maintenance_post'])->name('dashboard.settings.maintenance.post');
    });



});
