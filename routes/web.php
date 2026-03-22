<?php

use App\Http\Controllers\FormsController;
use App\Http\Controllers\MailsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\Site2Controller;
use App\Http\Controllers\Site3Controller;
use App\Models\Post;
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

Route::prefix('site3')->name('site3.')->group(function () {
    Route::get('/', [Site3Controller::class, 'about'])->name('about');
    Route::get('/experience', [Site3Controller::class, 'experience'])->name('experience');
    Route::get('/education', [Site3Controller::class, 'education'])->name('education');
    Route::get('/skills', [Site3Controller::class, 'skills'])->name('skills');
    Route::get('/interests', [Site3Controller::class, 'interests'])->name('interests');
    Route::get('/awards', [Site3Controller::class, 'awards'])->name('awards');

    });

Route::get('form1',[FormsController::class,'form1'])->name('form1');
Route::post('form1',[FormsController::class,'form1_data']);

Route::get('form2',[FormsController::class,'form2'])->name('form2');
Route::post('form2',[FormsController::class,'form2_data'])->name('form2_data');

Route::get('form3',[FormsController::class,'form3'])->name('form3');
Route::post('form3',[FormsController::class,'form3_data'])->name('form3_data');

Route::get('form4',[FormsController::class,'form4'])->name('form4');
Route::post('form4',[FormsController::class,'form4_data'])->name('form4_data');

Route::get('form5',[FormsController::class,'form5'])->name('form5');
Route::post('form5',[FormsController::class,'form5_data'])->name('form5_data');

Route::get('sent-mail',[MailsController::class, 'send_mail']);


Route::get('contact-us',[MailsController::class, 'contact_us'])->name('contact_us');
Route::post('contact-us',[MailsController::class, 'contact_us_data'])->name('contact_us_data');

Route::get('posts',[PostController::class,'index'])->name('posts.index');