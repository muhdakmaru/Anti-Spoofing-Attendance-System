<?php

use App\Http\Controllers\adminController;
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

Route::middleware(['auth'])->group(function () {

    Route::post('/updateProfile', [AuthManager::class, 'updateProfile'])->name('updateProfile');
});

//Home Page

Route::get('/viewLecturer', function () {
    return view('viewLecturer', ['title' => 'Lecturer Profile']);

})->name('viewLecturer');


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


//Admin

Route::get('/admin', function () {
    return view('admin');

})->name('admin');

Route::get('/registerLecturer', function () {
    return view('registerLecturer');

})->name('registerLecturer');

Route::post('/registerLecturer', [adminController::class, 'registerLecturer'])->name('registerLecturer.post');

Route::get('/lecturer', [adminController::class, 'getLecturers'])->name('lecturer');

Route::get('/editUser/{id}', [adminController::class, 'editUserForm']);

Route::post('/editUser/{id}', [adminController::class, 'updateUser']);

Route::delete('/deleteUser/{id}', [adminController::class, 'deleteUser']);

