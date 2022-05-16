<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('student')->name('student.')->group(function(){
    Route::middleware(['guest:student','preventBackHistory'])->group(function () {
        Route::get('/login', [StudentController::class,'login'])->name('login');
        Route::get('/register', [StudentController::class,'register'])->name('register');
        Route::post('/registersave', [StudentController::class,'registerSave'])->name('registersave');
        Route::post('/check',[StudentController::class,'check'])->name('check');
        
    });
    Route::middleware(['auth:student','preventBackHistory'])->group(function(){
        //Route::post('/check', [StudentController::class,'check'])->name('check');
        Route::get('/dashboard', [StudentController::class,'dashboard'])->name('dashboard');
        Route::get('/logout', [StudentController::class,'logout'])->name('logout');
    });
});