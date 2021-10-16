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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'checkUserLogin'], function() {
    Route::get('/login', 'RenderView\RenderViewController@login')->name('login');
    Route::get('/register', 'RenderView\RenderViewController@register')->name('register');
});

// Rest
Route::post('/login', 'Rest\UserCtrl@login');
Route::post('/register', 'Rest\UserCtrl@register');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::group(['prefix' => 'rest', 'middleware' => 'auth'], function() {
    Route::post('logout', 'Rest\UserCtrl@logout')->name('logout');
});
