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

Auth::routes();

//public routes
Route::get('/', 'productController@indexDesign');
Route::get('/machine/{machineiD}', 'uixController@showMachine');
Route::get('/products/byCategory/{categoryID}', 'searchController@byCategory');
Route::get('/productInfo/{machineID}', 'productController@showMachineInfo');
Route::get('/contact', 'productController@contactPage');
Route::get('/products', 'productController@productPage');
Route::get('/productGalery/{machineID}', 'pictureController@productGalery');
Route::get('/about', 'productController@aboutPage');

//public SEARCH routes
Route::post('/search', 'searchController@machineSearch');
Route::post('/filterMachines', 'searchController@filterMachines');


//admin routes

//admin CATEGORY routes
Route::get('/categories', 'categoriesController@index')->name('categories');
Route::post('/addCategory', 'categoriesController@addCategory');
Route::get('/deleteCategory/{categoryID}', 'categoriesController@deleteCategory');
Route::get('/editCategory/{categoryID}', 'categoriesController@editCategoryIndex');
Route::post('/updateCategory', 'categoriesController@editCategoryExe');

//admin SUBCATEGORY routes
Route::get('/subCategories', 'subCategoriesController@index')->name('subcategories');
Route::post('/addSubCategory', 'subCategoriesController@addSubCategory');
Route::get('/editSubCategory/{subCategoryID}', 'subCategoriesController@editSubCategoryIndex');
Route::post('/updateSubCategory', 'subCategoriesController@editSubCategoryExe');
Route::get('/deleteSubCategory/{subCategoryID}', 'subCategoriesController@deleteSubCategory');

//admin MACHINE routes
Route::get('/machines', 'machineController@index')->name('machines');
Route::post('/addMachine', 'machineController@addMachineExe');
Route::get('/deleteMachine/{machineID}', 'machineController@delete');
Route::get('/editMachine/{machineID}', 'machineController@editMachine');
Route::post('/updateMachine', 'machineController@updateMachine');
Route::get('/editDescription/{machineID}', 'machineController@editDescriptionIndex');
Route::post('/editDescription', 'machineController@editDescriptionExe');

//admin IMAGE routes
Route::get('/machineImages/{machineID}', 'pictureController@machineImages');
Route::get('/deleteImage/{imageID}', 'pictureController@deleteImage');
Route::post('/addImageToMachine', 'pictureController@addImageToMachine');



//ajax routes
Route::get('/getSubCategories', 'subCategoriesController@getSubCategories');


//email routes
Route::post('/sendMail', 'MailController@html_email');
