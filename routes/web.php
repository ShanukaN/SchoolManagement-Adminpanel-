<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('new');
})->name('dashboard');


Route::get('/teacher', function () {
    return view('teacher.index');
})->name('teacher');


Route::get('/staff', function () {
    return view('staff.index');
})->name('staff');


Route::prefix('/student')->group(function(){
    Route::get('/', [StudentController::class, 'index'])->name('Viewstudent');
    Route::get('/register', [StudentController::class, 'register'])->name('REGstudent');
    Route::post('/save', [StudentController::class, 'store'])->name('student.save');
    Route::get('/edit/{user_id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('/update/{user_id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/delete/{user_id}', [StudentController::class, 'destroy'])->name('student.delete');
    Route::get('/view/{user_id}', [StudentController::class, 'view'])->name('student.view');
});


Route::prefix('/teacher')->group(function(){
    Route::post('/store',[TeacherController::class,'store'])->name('teacher.store');
    Route::get('/show',[TeacherController::class,'show'])->name('teacher.show');
    Route::get('/edit',[TeacherController::class,'edit'])->name('teacher.edit');
    Route::post('/update',[TeacherController::class,'update'])->name('teacher.update');
});