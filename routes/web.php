<?php

use App\Http\Controllers\testController;
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

Route::get('/',[testController::class,'index'])->name('index.contact');
Route::post('/confirm',[testController::class,'show'])->name('confirm.contact');
Route::post('/create',[testController::class,'create'])->name('create.contact');
Route::post('/modif',[testController::class,'modif'])->name('modif.contact');
Route::get('/thanks',[testController::class,'thanks']);
Route::get('/manage', [testController::class, 'manage']);
Route::post('/manage', [testController::class, 'manage'])->name('serch.contact');
Route::post('/delete/{id}',[testController::class,'delete'])->name('delete.contact');
