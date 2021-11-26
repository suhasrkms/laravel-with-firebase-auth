<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user','fireauth');

// Route::get('/home/customer', [App\Http\Controllers\HomeController::class, 'customer'])->middleware('user','fireauth');

Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

Route::resource('/home/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user','fireauth');

Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);

Route::resource('/img', App\Http\Controllers\ImageController::class);

Route::get('/patients', [App\Http\Controllers\HomeController::class, 'displayinfo'])->name('patients');

// Route::view('patients', 'patients');

// Route::get('/display', function(){
//     $patient = app('firebase.firestore')->database()->collection('patients')->documents();  
//     print_r('Total records: '.$patient->size());  
//     foreach($patient as $pat) {  
//     if($pat->exists()){  
//     print_r("<br>".'Student ID = '.$pat->id());  
//     print_r("<br>".'First Name = '.$pat->data()['name']);
//     print_r('Last Name = '.$pat->data()['email']);
//     print_r("<br>");
//    }  
//  }  
//   });