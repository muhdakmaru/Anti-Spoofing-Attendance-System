<?php

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

Route::get('/testing', function () {
    return view('testing' , ['title' => 'Testing']);

});


