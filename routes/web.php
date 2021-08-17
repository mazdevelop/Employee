<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\ChangePasswordController;

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
Route::group(['prefix'=>'dashboard/'],function ()
{
    Route::resource('user',UserController::class)->except(['show']); 
    Route::resource('country',CountryController::class)->except(['show']); 
    Route::resource('state',StateController::class)->except(['show']); 
    Route::resource('city',CityController::class)->except(['show']); 
    Route::resource('department',DepartmentController::class)->except(['show']); 
    Route::post('user/{user}/change-password',[ChangePasswordController::class ,'change_password'])->name('user.change.password'); 
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
