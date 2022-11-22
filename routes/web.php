<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ususarioController;
use App\Http\Controllers\ciudadController;
use App\Http\Controllers\citasController;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */

//Route::get('/',fn()=>"index");


Route::controller(ususarioController::class)->group(function(){
    Route::get('/login', 'login')->name('usuarios.login');
    Route::post('/login', 'acces')->name('usuarios.acces');
    
    Route::get('/registro','create')->name('usuarios.create');
    Route::post('/registro','save')->name('usuarios.save');
    
    Route::get('/dashboard/Mis-datos','show')->middleware('user.session')->name('usuarios.show');
    Route::put('/dasboard/update','update')->name('usuarios.update');
    
    Route::get('/dashboard/Usuarios','store')->middleware('user.session')->name('usuarios.store');
    Route::put('/dasboard/update/admin','updateAdm')->middleware('user.session')->name('usuarios.AdmUpdate');

    Route::get('/dashboard/Usuarios/{id}','find')->middleware('user.session')->name('usuarios.find');
});

Route::controller(citasController::class)->group(function(){
    Route::get('/dashboard/citas/Mis-Citas','store')->middleware('user.session')->name('citas.store');
    Route::get('/dashboard/citas/Agendar','create')->middleware('user.session')->name('citas.create');
    Route::post('dashboard/citas/save','save')->middleware('user.session')->name('citas.save');
    Route::get('/dashboard/citas/Adm-Citas','storeAdm')->middleware('user.session')->name('citas.storeAdm');
    Route::get('/dashboard/citas/{asesor}/{fecha}','find')->middleware('user.session');
    Route::put('/dashboard/citas/update','update')->middleware('user.session')->name('citas.update');
});

Route::get('/ciudad/show/{id}',[ciudadController::class,'find'])->name('ciudad');

Route::get('/finish',function(){
    session()->flush();
    return redirect()->route('usuarios.login');
})->name('finish');

Route::get('/dashboard/{val?}',fn() => redirect()->route('usuarios.show'))->name('usuarios.index');
Route::get('/{var?}',fn() => redirect()->route('usuarios.login'));

