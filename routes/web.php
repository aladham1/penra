<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReportController;
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
    return redirect()->route('reports.index');
});
require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('my-profile', 'AdminController@adminProfile')->name('myProfile');
    Route::post('profile', 'AdminController@update')->name('users.updateProfile');

    Route::Resource('admins', 'AdminController')->only('store', 'edit', 'index');
//    Route::post('admins/destroy', [AdminController::class, 'destroy'])->name('admins.destroy');
//    Route::post('admins/update', [AdminController::class, 'update'])->name('admins.update');

    Route::Resource('reports', ReportController::class)->only('store', 'edit', 'index','create');
    Route::post('reports/destroy', [ReportController::class, 'destroy'])->name('reports.destroy');

    Route::Resource('events', EventController::class)->only('store', 'edit', 'index');
    Route::post('events/destroy', [EventController::class, 'destroy'])->name('events.destroy');
   Route::post('events/update', [EventController::class, 'update'])->name('events.update');

});

