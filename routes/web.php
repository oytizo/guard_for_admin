<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\dashboardController;
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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/login',function(){
    return view('login');
})->name('login');

Route::get('/registration',function(){
    return view('registration');
})->name('registration');

Route::post('admin/registration',[AdminsController::class,'store'])->name('admin.store');
Route::post('admin/login',[AdminsController::class,'index'])->name('admin.index');

Route::group(['middleware'=>'admin'],function(){
    Route::get('/',[dashboardController::class,'index'])->name('admin.dashboard');
    Route::get('admin/logout',[AdminsController::class,'logout'])->name('admin.logout');
});