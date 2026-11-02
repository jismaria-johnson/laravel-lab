<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

Route::get('/', function () {
    return view('home');
});

// Activity A

Route::get('/hello/{your_name}', function ($your_name) {
    return 'Hello ' . $your_name;
});

Route::get('/about', [AboutController::class, 'index']);


Route::resource('students', StudentController::class);

Route::get('/roll/{student}', function (Student $student) {
    return view('students.show', compact('student'));
});