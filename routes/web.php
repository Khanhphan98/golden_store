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

Route::get('/','RenderView\RenderViewController@welcome');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'checkUserLogin'], function() {
    Route::get('/login', 'RenderView\RenderViewController@login')->name('login');
    Route::get('/register', 'RenderView\RenderViewController@register')->name('register');
});

// Rest
Route::post('/login', 'Rest\UserCtrl@login');
Route::post('/register', 'Rest\UserCtrl@register');
Route::get('/auth/redirect/{provider}', 'SocialController@redirectToProvider');
Route::get('/callback/{provider}', 'SocialController@handleProviderCallback');

Route::group(['prefix' => 'render', 'middleware' => 'auth'], function () {
    // items
    Route::get('items', 'RenderView\RenderViewController@items')->name('items');
    Route::get('listItems', 'Rest\ProductsCtrl@listItems')->name('listItems');
   // categories
    Route::get('category', 'RenderView\RenderViewController@category')->name('category');
   // brands
    Route::get('brand', 'RenderView\RenderViewController@brand')->name('brand');

    Route::get('modal/{modalName}', 'RenderView\RenderViewController@renderModal');
});

Route::group(['prefix' => 'rest', 'middleware' => 'auth'], function() {
    Route::post('logout', 'Rest\UserCtrl@logout')->name('logout');

    // Product
    Route::get('listItem', 'Rest\ProductsCtrl@itemsAll')->name('listItem');
    Route::post('createItem', 'Rest\ProductsCtrl@createItem')->name('createItem');
    Route::delete('deleteItem/{id}', 'Rest\ProductsCtrl@deleteItem')->name('deleteItem');
    Route::post('updateItem/{id}', 'Rest\ProductsCtrl@updateItem')->name('updateItem');

    // Brand
    Route::get('listBrand', 'Rest\BrandCtrl@listBrand')->name('listBrand');
    Route::get('selectBrand', 'Rest\BrandCtrl@selectBrand')->name('selectBrand');
    Route::post('createBrand', 'Rest\BrandCtrl@createBrand')->name('createBrand');
    Route::delete('deleteBrand/{id}', 'Rest\BrandCtrl@deleteBrand');
    Route::put('updateBrand/{id}', 'Rest\BrandCtrl@updateBrand')->name('updateBrand');

    // Category
    Route::get('listCategory', 'Rest\CategoriesCtrl@listCategory')->name('listCategory');
    Route::get('selectListCategory', 'Rest\CategoriesCtrl@selectListCategory')->name('selectListCategory');
    Route::post('createCategory', 'Rest\CategoriesCtrl@createCategory')->name('createCategory');
    Route::delete('deleteCategory/{id}', 'Rest\CategoriesCtrl@deleteCategory')->name('deleteCategory');
    Route::put('updateCategory/{id}', 'Rest\CategoriesCtrl@updateCategory')->name('updateCategory');


});
