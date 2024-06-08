<?php

use App\Http\Controllers\MahasiswaController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::get('/mahasiswa/{id}/edit',[MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/{id}/update',[MahasiswaController::class, 'update']);
Route::get('/mahasiswa/{id}/delete',[MahasiswaController::class, 'delete']);