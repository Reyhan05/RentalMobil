<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataMobilController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\DataMerkController;
use App\Http\Controllers\HomeController;

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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

    Route::group(['middleware' => ['can:isAdmin']], function () {
        Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashboard');        
    
        Route::get('/datamobil', [DataMobilController::class, 'index'])->name('datamobil.index');
        Route::get('/datamerk', [DataMerkController::class, 'index'])->name('datamerk.index');
    
        Route::post('/datamobil', [DataMobilController::class, 'store'])->name('datamobil.store');
        Route::post('/datamerk', [DataMerkController::class, 'store'])->name('datamerk.store');
    
        Route::put('/update/success/{id}', [DataMobilController::class, 'update'])->name('car.update');
        Route::put('/update/success/{id}', [DataMerkController::class, 'update'])->name('car.update');
    
        Route::delete('/datamobil/{id}', [DataMobilController::class, 'destroy'])->name('datamobil.destroy');
        Route::delete('/datamerk/{id}', [DataMerkController::class, 'destroy'])->name('datamerk.destroy');
    
        Route::put('/merk/update/success/{id}', [DataMerkController::class, 'update'])->name('merk.update');
    });

    Route::group(['middleware' => ['can:isPenyewa']], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });