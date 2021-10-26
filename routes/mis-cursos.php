<?php

use App\Http\Controllers\CourseController as ControllersCourseController;
use Illuminate\Support\Facades\Route;

Route::get('courses', MyCourses::class);