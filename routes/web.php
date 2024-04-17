<?php

use App\Http\Controllers\cidade\CidadeController;
use App\Http\Controllers\Hotel\HotelController;
use App\Http\Controllers\Hotel\Quartos\ImagensController;
use App\Http\Controllers\Hotel\Quartos\QuartoController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth','user-access:admin'])->group(function(){
    Route::get('/home/administrador', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');

});
Route::middleware(['auth','user-access:donohotel'])->group(function(){
    Route::resources( [
        'hotel'=> HotelController::class,
        'hotel.quartos'=>QuartoController::class,
        'hotel.quartos.images'=>ImagensController::class,
    ],['shallow'=>true]);
    Route::get('/home/hotel', [App\Http\Controllers\HomeController::class, 'donoHotelHome'])->name('home.donohotel');
    Route::get('/hoteljson',[HotelController::class ,'HotelJson'])->name('hotel.json');
    Route::get('/quartos/image/{id}', [ImagensController::class, 'ImageJson'])->name('image.quarto.json');
    Route::get('/hotel/quartos/{id}',[QuartoController::class ,'QuartoJson'])->name('quarto.json');

});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

