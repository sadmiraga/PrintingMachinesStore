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



//ajax routes
Route::get('/getSubCategories', 'subCategoriesController@getSubCategories');


//category routes
Route::get('/categories', 'categoriesController@index');
Route::post('/addCategory', 'categoriesController@addCategory');
Route::get('/deleteCategory/{categoryID}', 'categoriesController@deleteCategory');
Route::get('/editCategory/{categoryID}', 'categoriesController@editCategoryIndex');
Route::post('/updateCategory', 'categoriesController@editCategoryExe');


//subCategories routes
Route::get('/subCategories', 'subCategoriesController@index');
Route::post('/addSubCategory', 'subCategoriesController@addSubCategory');
Route::get('/editSubCategory/{subCategoryID}', 'subCategoriesController@editSubCategoryIndex');
Route::post('/updateSubCategory', 'subCategoriesController@editSubCategoryExe');
Route::get('/deleteSubCategory/{subCategoryID}', 'subCategoriesController@deleteSubCategory');


//machines routes
Route::get('/machines', 'machineController@index');
Route::post('/addMachine', 'machineController@addMachineExe');
Route::get('/deleteMachine/{machineID}', 'machineController@delete');
