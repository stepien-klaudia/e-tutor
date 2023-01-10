<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Kernel;

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

Route::get('/hello', [HelloController::class, 'show']);

Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('auth');
Route::get('/users/list', [UserController::class, 'index'])->middleware('auth');

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcement_index')->middleware('auth');
Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcement_create')->middleware('auth');
Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcement_store')->middleware('auth');
Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcement_show');
Route::get('/announcements/edit/{announcement}', [AnnouncementController::class, 'edit'])->name('announcement_edit')->middleware('auth');
Route::post('/announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcement_update')->middleware('auth');
Route::delete('/announcements/del/{announcement}', [AnnouncementController::class, 'destroy'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

