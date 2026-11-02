<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

Route::get('/', function () {
    return view('home');
});

Route::get('/hello/{name}', function (string $name) {
    return "Hello {$name}";
});

Route::get('/about', [AboutController::class, 'index']);

Route::resource('students', StudentController::class);

Route::get('/roll/{roll}', function (Student $roll) {
    return view('students.show', ['student' => $roll]);
});