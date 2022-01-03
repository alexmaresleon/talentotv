<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CourseController;

use App\Http\Livewire\CourseStatus;
use Illuminate\Support\Facades\Artisan;
use Google\Service\Analytics;
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

Route::get('/', HomeControler::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('cursos/{course}/enroled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enroled');

Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');

