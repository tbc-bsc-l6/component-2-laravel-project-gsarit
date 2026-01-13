<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\StudentModuleController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\TeacherModuleController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

Route::get('/About', function () {
    return view('About');
});


Route::get('/Contact', function () {
    return view('Contact');
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



Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::post('/admin/users/{user}/role',
        [AdminController::class, 'changeRole'])
        ->name('admin.users.role');

    Route::post('/admin/modules/{module}/toggle',
        [AdminController::class, 'toggleModule'])
        ->name('admin.modules.toggle');

    Route::post('/admin/modules/{module}/assign-teacher',
        [AdminController::class, 'assignTeacher'])
        ->name('admin.modules.assignTeacher');

    Route::post('/admin/modules/{module}/remove-student/{student}',
        [AdminController::class, 'removeStudent'])
        ->name('admin.modules.removeStudent');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/teacher/modules', [TeacherModuleController::class, 'index'])
        ->name('teacher.modules.index');

    Route::get('/teacher/modules/{module}', [TeacherModuleController::class, 'show'])
        ->name('teacher.modules.show');

    Route::post('/teacher/modules/{module}/grade/{student}',
        [TeacherModuleController::class, 'grade'])
        ->name('teacher.modules.grade');
});


require __DIR__.'/auth.php';

