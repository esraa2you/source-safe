<?php

use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use App\Http\Controllers\PDFController;
use  App\Http\Controllers\GroupController;
use App\Models\Group;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(App\Http\Controllers\FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});
// Route::middleware(['auth:sanctum',
// config('jetstream.auth_session'),
// 'verified','IsAdmin'])->group(
//     Route::get('','')
// );

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {

    Route::get('groups/', 'App\Http\Controllers\GroupController@index')->name('group.index');
    Route::get('group/create', 'App\Http\Controllers\GroupController@create')->name('group.create');
    Route::post('group/store', 'App\Http\Controllers\GroupController@store')->name('group.store');
    Route::get('group/destroy/{group}', 'App\Http\Controllers\GroupController@destroy')->name('group.destroy');
    Route::get('group/edit/{group}', 'App\Http\Controllers\GroupController@edit')->name('group.edit');
    Route::put('group/update/{group}', 'App\Http\Controllers\GroupController@update')->name('group.update');

});
