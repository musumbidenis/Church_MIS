<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\LeadersController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ContributionTypesController;
use App\Http\Controllers\ContributionsController;
use App\Http\Controllers\AuthController;

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

// Auth routes
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.showLoginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

    Route::get('/passwordChange', [AuthController::class, 'showPasswordChangeForm'])->name('auth.showPasswordChangeForm');
    Route::post('/passwordChange', [AuthController::class, 'passwordChange'])->name('auth.passwordChange');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/** Admin Section Routes */
Route::resource('/members', MembersController::class);
Route::resource('/groups', GroupsController::class);
Route::resource('/leaders', LeadersController::class);
Route::resource('/events', EventsController::class);
Route::resource('/contributionTypes', ContributionTypesController::class);
Route::resource('/contributions', ContributionsController::class);
