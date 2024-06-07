<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Livewire\CourseStatus;

Route::get('/', HomeController::class)->name('home');

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');