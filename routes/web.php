<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginUserAuth;
use App\Http\Controllers\ExamController;

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
Route::get('/dashboard', function() {
    return view('dashboard.main');
});
// kategori
Route::get('/kategori-ujian', function() {
    return view('dashboard.kategori.main');
});
Route::post('/kategori-ujian', [ExamController::class, 'addKategori'])->name('addKategori');

Route::get('/soal', [ExamController::class, 'showUjian']);
Route::get('/soal/buat-soal', function(){
    return view('dashboard.ujian.soal');
});
Route::get('/soal/{id}', [ExamController::class, 'showSoal']);
Route::get('/soal/tambah-soal/{id}', [ExamController::class, 'showEditSoal'])->name('showAddSoal');
Route::post('/soal/buat-soal', [ExamController::class, 'addUjian'])->name('addUjian');
Route::post('/soal/{id}/edit-soal', [ExamController::class, 'addSoal'])->name('addSoal');

