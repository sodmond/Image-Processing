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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'home']);

Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['auth']], function(){
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('images', [App\Http\Controllers\ImageController::class, 'index'])->name('images');
    Route::post('images/process', [App\Http\Controllers\ImageController::class, 'new'])->name('image.new');
    Route::get('image/{id}/{code}', [App\Http\Controllers\ImageController::class, 'get'])->name('image');
    Route::get('processed_image/{id}', [App\Http\Controllers\ImageController::class, 'view'])->name('image.view');

    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [App\Http\Controllers\ProfileController::class, 'password'])->name('profile.password');
    Route::get('settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
    Route::post('settings/new-admin', [App\Http\Controllers\SettingsController::class, 'newAdmin'])->name('profile.new');
    Route::get('settings/delete-admin/{id}', [App\Http\Controllers\SettingsController::class, 'deleteAdmin'])->name('profile.delete');
});