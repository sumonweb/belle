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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');



//Frontend Routes
Route::get('/', 'App\Http\Controllers\FrontendController@home');


//Admin Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/admin', 'App\Http\Controllers\FrontendController@admin')->name('dashboard');


    Route::get('/site-settings/create', 'App\Http\Controllers\SiteSettingsController@create');
    Route::post('/site-settings/store', 'App\Http\Controllers\SiteSettingsController@store');
    Route::get('/site-settings/{id}/edit', 'App\Http\Controllers\SiteSettingsController@edit');
    Route::put('/site-settings/{id}/update', 'App\Http\Controllers\SiteSettingsController@update');

    Route::resource('slider', App\Http\Controllers\SliderController::class);
});




require __DIR__.'/auth.php';
