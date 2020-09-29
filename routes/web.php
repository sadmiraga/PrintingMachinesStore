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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/design', 'productController@design');

Route::get('/admin', 'adminController@index');

Route::get('/machines', 'machineController@index');




//category routes
Route::get('/categories', 'categoriesController@index');
Route::post('/addCategory', 'categoriesController@addCategory');


//subCategories routes
Route::get('/subCategories', 'subCategoriesController@index');
Route::post('/addSubCategory', 'subCategoriesController@addSubCategory');
