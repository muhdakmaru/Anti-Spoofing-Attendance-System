<?php

use App\Http\Controllers\Firebase\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');

});

//Login Page

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

//Home Page

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);

})->name('home');

Route::get('/blog', function () {
    return view('blog' , ['title' => 'Blog']);

});

Route::get('/about', function () {
    return view('about' , ['title' => 'About']);

});

Route::get('/contact', function () {
    return view('contact' , ['title' => 'Contact']);

});

Route::get('/registerStudent', function () {
    return view('registerStudent' , ['title' => 'Register Student Page']);

});

Route::post('registerStudent', [RegisterController::class, 'store']);

/*
Route::get('/student', function () {
    return view('student' , ['title' => 'Student Information Page']);

});

*/

Route::get('/student', [RegisterController::class, 'index']);

Route::get('/generateReport', function () {
    return view('generateReport' , ['title' => 'Student Information Page']);

});

Route::get('/editStudent/{id}', [RegisterController::class, 'edit']);

Route::post('/updateStudent/{id}', [RegisterController::class, 'update']);

Route::get('/deleteStudent/{id}', [RegisterController::class, 'delete']);


