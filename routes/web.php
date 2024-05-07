<?php

use App\Http\Controllers\cidade\CidadeController;
use App\Http\Controllers\Hotel\HotelController;
use App\Http\Controllers\Hotel\Quartos\ImagensController;
use App\Http\Controllers\Hotel\Quartos\QuartoController;
use App\Http\Controllers\LoginUsuarioController;
use App\Http\Controllers\Pedidos\Pagamento\PagamentoController;
use App\Http\Controllers\Pedidos\PedidosnaofinalizadosController;
use App\Http\Controllers\RegistroUserController;
use App\Http\Controllers\WelcomeController;
use App\Models\PedidosnaoFinalizado;
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
Route::middleware(['auth','user-access:user'])->group(function(){
    Route::get('/',[WelcomeController::class, 'Index'])->name('home');
    
    Route::get('/pedidos',[PedidosnaofinalizadosController::class,'index'])->name('pedidos.index');
    Route::post('/pedidos/hotel/{hotel}/quarto/{quarto}',[PedidosnaofinalizadosController::class, 'store'])->name('pedidos.store');
    Route::get('/pagamento',[PagamentoController::class,'create'])->name('pagamento.create');
    //Rotas Destinadas a usuarios logados

});
Route::get('/',[WelcomeController::class, 'Index'])->name('home');
Route::get('/hotel/{hotel}/quarto/{quarto}/quartescohido', [QuartoController::class,'ApresentarQuarto'])->name('hotel.quarto.apresentar');
Route::resource('usuario',RegistroUserController::class)->only(['create','store'])->missing(function(){
    return to_route('home');
});
Route::resource('acesso',LoginUsuarioController::class)->only(['create','store'])->missing((function(){
    return to_route('home');
}));

Auth::routes();

