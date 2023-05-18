<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LockerController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::resource('students', StudentController::class);
Route::get('/students/create', 'App\Http\Controllers\StudentController@create')->name('students.create');
Route::post('/students', 'App\Http\Controllers\StudentController@store')->name('students.store');
Route::post('/students/{student}/activateSavingMood', 'App\Http\Controllers\StudentController@activateSavingMood')->name('students.activateSavingMood');
Route::post('/students/{student}/deactivate-saving-mood', 'App\Http\Controllers\StudentController@deactivateSavingMood')->name('students.deactivateSavingMood');
Route::get('/students/search', [App\Http\Controllers\StudentController::class, 'search'])->name('students.search');


Route::resource('lockers', LockerController::class);
Route::get('/assignform', [LockerController::class, 'index']);
Route::get('/lockers', [LockerController::class, 'show'])->name('lockers.assignform');
Route::post('/lockers', [LockerController::class, 'store'])->name('lockers.assignlocker');
Route::get('/about', [AboutController::class, 'index'])->name('home.about');
Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
        Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

?>