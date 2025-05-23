<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/detail', function () {
    return view('course.detailCourse');
});
Route::get('/signin', function() {
    return view('auth.login');
});
Route::get('/signup', function() {
    return view('auth.signup');
});
