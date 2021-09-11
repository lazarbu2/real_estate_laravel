<?php

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

Route::get('/', 'PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');

Route::get('offer', 'OfferFormController@create');
Route::post('offer', 'OfferFormController@store');

Route::get('viewproperty', 'ViewPropertyFormController@create');
Route::post('viewproperty', 'ViewPropertyFormController@store');



Route::get('contact', 'ContactFormController@create');
Route::post('contact', 'ContactFormController@store');

Route::resource('/home', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);


Auth::routes();



Route::get('properties', 'PropertiesController@index')->name('properties');

Route::get('properties/{id}', 'PropertiesController@show');

Route::get('/rent', 'PropertiesController@rent');

Route::get('/sale', 'PropertiesController@sale');

Route::get('/newbuilt', 'PropertiesController@newbuilt');



Route::get('/advancedsearch', 'PropertiesController@sidebarSearch')->name('sidebarSearch');

Route::get('/welcomesearch', 'PropertiesController@welcomeSearch')->name('welcomeSearch');



Route::get('/adminSearch', 'AdminController@adminSearch')->name('adminSearch');


Route::delete('/{id}', 'PropertyImagesController@destroy');

Route::prefix('admin')->group(function (){

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/create', 'AdminController@create');
    Route::post('/', 'AdminController@store');
    Route::get('/{property_id}', 'PropertiesController@show');
    Route::delete('/{id}', 'AdminController@destroy');
    Route::get('/{id}/edit', 'AdminController@edit');
    Route::put('/{id}','AdminController@update');

});
