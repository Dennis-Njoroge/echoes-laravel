<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::resource('/customers',CustomerController::class);
Route::match(['get','put'],'/customers/{id}/status',[CustomerController::class,'status'])->name('customerStatus');
Route::resource('/employees',EmployeeController::class);
Route::match(['get','put'],'/employees/{id}/status',[EmployeeController::class,'status'])->name('employeeStatus');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('/events', EventsController::class);
Route::resource('/feedback', FeedbackController::class);
Route::resource('/help', FaqsController::class);
