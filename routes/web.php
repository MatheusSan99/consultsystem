<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDoctorsController;
use App\Http\Controllers\AdminFunctionsController;
use App\Http\Controllers\AdminPacientsController;
use App\Http\Controllers\ConsultController;
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

Route::get('/admin/listademedicos', [AdminDoctorsController::class, 'doctorsList'])->name('adminDoctorsList');
Route::get('/admin/novomedico', [AdminDoctorsController::class, 'createDoctor'])->name('createDoctor');
Route::post('/admin/novomedico', [AdminDoctorsController::class, 'storeNewDoctor'])->name('storeNewDoctor');
Route::get('/admin/editarmedico/{id}', [AdminDoctorsController::class, 'editDoctor'])->name('editDoctor');
Route::put('/admin/editarmedico/{id}', [AdminDoctorsController::class, 'updateDoctor'])->name('updateDoctor');
Route::delete('/admin/listademedicos/apagar/{id}', [AdminDoctorsController::class, 'destroyDoctor'])->name('destroyDoctor');

Route::get('/admin/listadeconsultas', [ConsultController::class, 'consultList'])->name('consultList');
Route::get('/admin/novaconsulta', [ConsultController::class, 'newConsult'])->name('createConsult');
Route::post('/admin/novaconsulta', [ConsultController::class, 'storeNewConsult'])->name('storeNewConsult');

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
Route::post('/admin/novaespecialidade', [AdminFunctionsController::class, 'storeNewSpecialty'])->name('storeNewSpecialty');
Route::get('/admin/editarespecialidade/{id}', [AdminFunctionsController::class, 'editSpecialty'])->name('editSpecialty');
Route::put('/admin/editarespecialidade/{id}', [AdminFunctionsController::class, 'updateSpecialty'])->name('updateSpecialty');
Route::delete('/admin/especialidade/apagar/{id}', [AdminFunctionsController::class, 'deleteSpecialty'])->name('deleteSpecialty');
