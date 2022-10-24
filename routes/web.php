<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('master.dashboard');
});

// Route::get('/dashboard', function () {
//     return view('master.dashboard');
// });

// Route::get('/masterContact', function () {
//     return view('master.masterContact');
// });

// Route::get('/masterProject', function () {
//     return view('master.masterProject');
// });

// Route::get('/masterSiswa', function () {
//     return view('master.masterSiswa');
// });

//admin

Route::middleware('auth')->group(function(){

    Route::resource('dashboard', dashboardController::class);
    Route::get('masterSiswa/{id_siswa}/hapus',[siswaController::class,'hapus'])->name('masterSiswa.hapus');
    Route::get('masterProject/{id_project}/hapus',[projectController::class,'hapus'])->name('masterProject.hapus');
    Route::resource('masterSiswa', siswaController::class);
    Route::get('masterProject/create/{id_siswa}',[projectController::class,'tambah'])->name('masterProject.tambah');
    Route::resource('masterProject', projectController::class);
    Route::resource('masterContact', contactController::class);
    Route::post('logout', [LoginController::class, 'logout']);
});

//guest

Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
    Route::get('/', function (){return view ('home');});
    Route::get('/about', function (){return view ('about');});
    Route::get('/project', function (){return view ('project');});
    Route::get('/contact', function (){return view ('contact');});
});

// Route::get('/admin', function () {
//     return view('layout.admin');
// });

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/project', function () {
//     return view('project');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });


