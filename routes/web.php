<?php

use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/home', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/relatorios/medicos', 'App\Http\Controllers\MedicosController@relatorio');
Route::get('/relatorios/pacientes', 'App\Http\Controllers\PacientesController@relatorio');

Route::resource('medicos', MedicosController::class)->middleware('auth');
Route::resource('pacientes', PacientesController::class)->middleware('auth');
Route::resource('consultas', ConsultasController::class)->middleware('auth');
