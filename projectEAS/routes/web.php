<?php

use App\Http\Controllers\StockController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
route::get('/',[LoginController::class,'index']);
route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
route::get('/register',[RegisterController::class,'index']);
route::post('/register',[RegisterController::class,'store']);
route::post('/login', [LoginController::class,'authenticate']);
route::post('/logout',[LoginController::class,'logout']);
route::resource('stock', StockController::class)->middleware('auth');
route::get('/laporan',[LaporanController::class,'index'])->middleware('auth');
route::get('/laporan/{dat:id}/create',[LaporanController::class,'create'])->middleware('auth');
route::post('/laporan/create',[LaporanController::class,'store'])->middleware('auth');
