<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HealthController;

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
/*
Route::get('/studentportal', function () {
    return view('welcome');
});
*/
Route::get('/studentportal', [StudentController::class, 'studentportal'])->name('student.studentportal');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.store');
Route::get('/', [HealthController::class, 'dbHealth'])->name('health.dbHealth');

//Route::get('/student', [StudentController::class, 'index'])->name('student.index')->middleware('auth');
//Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
//Route::get('/student/login', [StudentController::class, 'showLogin'])->name('student.showLogin');
Route::get('/student/logout', [StudentController::class, 'logout'])->name('student.logout');
//Route::post('/student/login', [StudentController::class, 'login'])->name('student.login');
Route::middleware('guest')->group(function () {
    Route::get('/student/login', [StudentController::class, 'showLogin'])->name('student.showLogin');
    Route::post('/student/login', [StudentController::class, 'login'])->name('student.login');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
});
//Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');
//Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/', [StudentController::class, 'store'])->name('student.store');
//Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    
});
