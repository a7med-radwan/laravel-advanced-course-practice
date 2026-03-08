<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\Site2Controller;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return 'Home Page';
// });

// Route::get('/about', function () {
//     return 'About Pag0e git';
// });

// Route::post('/about', function () {
//     return 'About Page post';
// });

// Route::put('/about', function () {
//     return 'About Page put';
// });

// Route::delete('/about', function () {
//     return 'About Page delete';
// });

// Route::get('welcome/{name}/age/{age}', function($name, $age){
//     return 'Welcome ' . $name . ' your age is ' . $age;
// })->whereAlpha('name')->whereNumber('age');

// Route::get('news',function(){
//     return 'News';
// });

// Route::get('news/{id?}',function($id = null){
//     return 'News ' . $id;
// });


// Route::prefix('admin')->name('admin.')->group(function () {

//     Route::get('/dashboard', function () {
//         return "Admin Dashboard";
//     })->name('dashboard');

//     Route::get('/post', function () {
//         return "Admin Post";
//     })->name('post');

//     Route::get('/contact', function () {
//         return "Admin Contact";
//     })->name('contact');
// });


Route::get('/', [MainController::class, 'home'] )->name('home');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/contact', [MainController::class, 'contact'])->name('contact');

Route::get('/site1',[Site1Controller::class,'index'])->name('site1');

Route::prefix('site2')->name('site2.')->group(function () {
    Route::get('/', [Site2Controller::class, 'index'])->name('index');
    Route::get('/about', [Site2Controller::class, 'about'])->name('about');
    Route::get('/post', [Site2Controller::class, 'post'])->name('post');
    Route::get('/contact', [Site2Controller::class, 'contact'])->name('contact');

    });