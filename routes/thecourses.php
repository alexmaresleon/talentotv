<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MyCourses;

Route::redirect('', 'thecourses/courses');

Route::get('courses', MyCourses::class)->name('courses.index');

Route::get('courses/{id}', function () {
    return "prueba";
    
});