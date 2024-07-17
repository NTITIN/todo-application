<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CreateTODOController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('admin/register', [RegisterController::class, 'register']);
Route::post('admin/register', [RegisterController::class, 'store'])->name('admin/register');


Route::get('admin/login', [LoginController::class, 'login'])->name('admin/login');
Route::post('admin/login', [LoginController::class,'authenticate']);
Route::get('admin/logout', [LoginController::class,'logout'])->name('logout');

// dashboard routes
Route::get('admin/home', [HomeController::class,'home'])->name('home');

// forgot password routes
Route::get('forget-password', [ForgotPasswordController::class,'getEmail']);
Route::post('forget-password', [ForgotPasswordController::class,'postEmail']);

// Reset password routes
Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');

// Create daily task routes
Route::get('createtodo',[CreateTODOController::class,'index'])->name('createtodo');
Route::post('inserttask',[CreateTODOController::class,'insert_task'])->name('inserttask');
Route::get('useremail/{id}',[CreateTODOController::class,'getEmail'])->name('useremail');

Route::get('invitations', [InvitationController::class, 'create'])->name('invitations');
Route::post('sendinvitations', [InvitationController::class, 'store'])->name('sendinvitations');
Route::get('invitations/accept/{token}', [InvitationController::class, 'accept'])->name('invitations.accept');

// datatables routes
Route::get('users/data', [CreateTODOController::class, 'getData'])->name('users.data');

