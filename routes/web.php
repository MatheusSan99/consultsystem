<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFunctionsController;
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

//Crud Pacientes
Route::get('/admin/listadepacientes', [AdminPacientsController::class, 'list'])->name('adminPacientsList');
Route::get('/admin/novoPaciente', [AdminPacientsController::class, 'createPacient'])->name('createPacient');
Route::post('/admin/novoPaciente', [AdminPacientsController::class, 'storeNewPacient'])->name('storeNewPacient');
Route::get('/admin/editarpaciente/{id}', [AdminPacientsController::class, 'editPacient'])->name('editPacient');
Route::put('/admin/editarpaciente/{id}', [AdminPacientsController::class, 'updatePacient'])->name('updatePacient');
Route::delete('/admin/listadepacientes/apagar/{id}', [AdminPacientsController::class, 'destroyPacient'])->name('destroyPacient');

//Crud Especialidades

Route::get('/admin/especialidade', [AdminFunctionsController::class, 'specialtyList'])->name('specialtylist');
Route::get('/admin/novaespecialidade', [AdminFunctionsController::class, 'createSpecialty'])->name('createSpecialty');
Route::post('/admin/novaespecialidade', [AdminFunctionsController::class, 'storeSpecialty'])->name('storeSpecialty');
Route::get('/admin/editarespecialidade/{id}', [AdminPacientsController::class, 'editSpecialty'])->name('editSpecialty');
Route::put('/admin/editarespecialidade/{id}', [AdminPacientsController::class, 'updateSpecialty'])->name('updateSpecialty');
Route::delete('/admin/especialidade/apagar/{id}', [AdminFunctionsController::class, 'deleteSpecialty'])->name('deleteSpecialty');
