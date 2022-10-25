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

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front');

Auth::routes();

Route::middleware(['auth'])->group(function () {

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::resource('/posts', App\Http\Controllers\PostController::class);
	Route::get('/posts/todelete/{post}', [App\Http\Controllers\PostController::class, 'toDelete'])->name('posts.todelete');

	Route::resource('/users', App\Http\Controllers\UserController::class);
	Route::get('/users/todelete/{user}', [App\Http\Controllers\UserController::class, 'toDelete'])->name('users.todelete');
	
	Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');

});