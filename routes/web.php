<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\MediaController;
use App\Http\Controllers\Front\BlogController;

use App\Http\Controllers\Back\DashController;

use App\Http\Controllers\Back\LoginController;
use App\Http\Controllers\Back\SliderController;
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

});
