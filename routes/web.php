<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataMobilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashbordController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashboard');

Route::get('/datamobil', [DataMobilController::class, 'index'])->name('datamobil');
Route::post('/datamobil', [DataMobilController::class, 'store'])->name('datamobil.store');
Route::get('/datamerk', [DataMerkController::class, 'index'])->name('datamerk');

Route::delete('/datamobil/{id}', [DataMobilController::class, 'destroy'])->name('datamobil.destory');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::put('/update/success/{id}', [DataMobilController::class, 'update'])->name('car.update');