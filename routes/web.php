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
        Route::get('ekle', [SliderController::class, 'insert'])->name('dashboard.slider.insert');
        Route::post('ekle', [SliderController::class, 'post'])->name('dashboard.slider.insert.post');
    });

    Route::prefix('musteri-yorumlari')->group(function () {
        Route::get('/', [CustomerCommentsController::class, 'index'])->name('dashboard.customer-comments.index');
        Route::get('ekle', [CustomerCommentsController::class, 'insert'])->name('dashboard.customer-comments.insert');
        Route::post('ekle', [CustomerCommentsController::class, 'post'])->name('dashboard.customer-comments.insert.post');
    });

    Route::prefix('ekibimiz')->group(function () {
        Route::get('/', [TeamsController::class, 'index'])->name('dashboard.teams.index');
        Route::get('ekle', [TeamsController::class, 'insert'])->name('dashboard.teams.insert');
        Route::post('ekle', [TeamsController::class, 'post'])->name('dashboard.teams.insert.post');
    });

    Route::prefix('sikca-sorulanlar')->group(function () {
        Route::get('/', [FAQController::class, 'index'])->name('dashboard.faq.index');
        Route::get('ekle', [FAQController::class, 'insert'])->name('dashboard.faq.insert');
        Route::post('ekle', [FAQController::class, 'post'])->name('dashboard.faq.insert.post');
    });

    Route::prefix('sayfalar')->group(function () {
        Route::get('/', [PagesController::class, 'index'])->name('dashboard.page.index');
        Route::get('ekle', [PagesController::class, 'insert'])->name('dashboard.page.insert');
        Route::post('ekle', [PagesController::class, 'post'])->name('dashboard.page.insert.post');
    });

    Route::prefix('hizmetler')->group(function () {
        Route::get('/', [ServicesController::class, 'index'])->name('dashboard.services.index');
        Route::get('ekle', [ServicesController::class, 'insert'])->name('dashboard.services.insert');
        Route::post('ekle', [ServicesController::class, 'post'])->name('dashboard.services.insert.post');
    });

});
