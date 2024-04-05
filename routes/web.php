<?php

use App\Http\Controllers\cidade\CidadeController;
use App\Http\Controllers\Hotel\HotelController;
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
        'hotel'=> HotelController::class
    ],['shallow'=>true]);
    Route::get('/home/hotel', [App\Http\Controllers\HomeController::class, 'donoHotelHome'])->name('home.donohotel');

});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
