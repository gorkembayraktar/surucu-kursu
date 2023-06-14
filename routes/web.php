<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\BlogController;
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