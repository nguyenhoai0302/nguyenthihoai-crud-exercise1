<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('students')->name('students.')->group(function (){
    Route::get('/', [StudentsController::class, 'index'])->name('students');
    Route::get('/add', [StudentsController::class, 'add'])->name('add');
    Route::post('/add', [StudentsController::class, 'postAdd'])->name('post-add');
    Route::get('/edit/{id}', [StudentsController::class, 'getEdit'])->name('edit');
    Route::post('/update', [StudentsController::class, 'postEdit'])->name('post-edit');
    Route::get('/delete/{id}', [StudentsController::class, 'delete'])->name('delete');
});