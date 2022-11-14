<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPacientsController;
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

Route::get('/', [AdminController::class, 'index'])->name('adminindex');


Route::get('/admin/listadepacientes', [AdminPacientsController::class, 'list'])->name('adminpacientslist');