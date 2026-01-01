<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\StudentModuleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Only for authenticated students
Route::middleware(['auth'])->group(function() {

    Route::get('/student/modules', [StudentModuleController::class, 'index'])
        ->name('student.modules.index');

    Route::post('/student/modules/{module}/enrol', [StudentModuleController::class, 'enrol'])
        ->name('student.modules.enrol');
});

require __DIR__.'/auth.php';
