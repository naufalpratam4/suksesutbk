<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/detail', function () {
    return view('course.detailCourse');
});
