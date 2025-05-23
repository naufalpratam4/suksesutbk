<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginUserAuth;

Route::get('/signin', function() {
    return view('auth.login');
})->name('login');
Route::post('/signin', [LoginUserAuth::class, 'login'])->name('user.login');
Route::get('/signup', function() {
    return view('auth.signup');
});

Route::post('/logout', [LoginUserAuth::class, 'logout'])->name('user.logout');
// Route::middleware('auth')->group(function(){
//     Route::get('/', function(){
//         return view('welcome');
//     });
// });

Route::get('/', function () {
    return view('welcome');
});
Route::get('/detail', function () {
    return view('course.detailCourse');
});

