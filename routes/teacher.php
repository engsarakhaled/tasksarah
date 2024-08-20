<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\Admin;

Route::get('/',[TeacherController::class,'teacher'])->middleware(Admin::class);

Auth::routes(['verify' => true]);
