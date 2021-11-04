<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MyCourses;

Route::redirect('', 'thecourses/courses');

Route::get('courses', MyCourses::class)->middleware('auth')->name('courses.index');