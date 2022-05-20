<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\MarksController;
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
    return redirect('students');
});

Route::prefix('students')->group(function () {

    Route::get('/', [StudentsController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/store', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/edit/{id}', [StudentsController::class, 'edit'])->name('students.edit');
    Route::post('/update/{id}', [StudentsController::class, 'update'])->name('students.update');
    Route::get('/delete/{id}', [StudentsController::class, 'delete'])->name('students.delete');

});

Route::prefix('marks')->group(function () {

    Route::get('/', [MarksController::class, 'index'])->name('marks.index');
    Route::get('/create', [MarksController::class, 'create'])->name('marks.create');
    Route::post('/store', [MarksController::class, 'store'])->name('marks.store');
    Route::get('/edit/{id}', [MarksController::class, 'edit'])->name('marks.edit');
    Route::post('/update/{id}', [MarksController::class, 'update'])->name('marks.update');
    Route::get('/delete/{id}', [MarksController::class, 'delete'])->name('marks.delete');

});
