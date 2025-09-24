<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/', [StudentController::class, 'store'])->name('student.store');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
