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

Route::get('/admin', function () {
    return redirect('/machines');
});

//admin CATEGORY routes
Route::get('/categories', 'categoriesController@index')->name('categories')->middleware(['auth', 'auth.admin']);
Route::post('/addCategory', 'categoriesController@addCategory')->middleware(['auth', 'auth.admin']);
Route::get('/deleteCategory/{categoryID}', 'categoriesController@deleteCategory')->middleware(['auth', 'auth.admin']);
Route::get('/editCategory/{categoryID}', 'categoriesController@editCategoryIndex')->middleware(['auth', 'auth.admin']);
Route::post('/updateCategory', 'categoriesController@editCategoryExe')->middleware(['auth', 'auth.admin']);

//admin SUBCATEGORY routes
Route::get('/subCategories', 'subCategoriesController@index')->name('subcategories');
Route::post('/addSubCategory', 'subCategoriesController@addSubCategory')->middleware(['auth', 'auth.admin']);
Route::get('/editSubCategory/{subCategoryID}', 'subCategoriesController@editSubCategoryIndex');
Route::post('/updateSubCategory', 'subCategoriesController@editSubCategoryExe')->middleware(['auth', 'auth.admin']);
Route::get('/deleteSubCategory/{subCategoryID}', 'subCategoriesController@deleteSubCategory');

//admin MACHINE routes
Route::get('/machines', 'machineController@index')->name('machines')->middleware(['auth', 'auth.admin']);
Route::post('/addMachine', 'machineController@addMachineExe')->middleware(['auth', 'auth.admin']);
Route::get('/deleteMachine/{machineID}', 'machineController@delete')->middleware(['auth', 'auth.admin']);
Route::get('/editMachine/{machineID}', 'machineController@editMachine')->middleware(['auth', 'auth.admin']);
Route::post('/updateMachine', 'machineController@updateMachine')->middleware(['auth', 'auth.admin']);
Route::get('/editDescription/{machineID}', 'machineController@editDescriptionIndex')->middleware(['auth', 'auth.admin']);
Route::post('/editDescription', 'machineController@editDescriptionExe')->middleware(['auth', 'auth.admin']);

//admin IMAGE routes
Route::get('/machineImages/{machineID}', 'pictureController@machineImages')->middleware(['auth', 'auth.admin']);
Route::get('/deleteImage/{imageID}', 'pictureController@deleteImage')->middleware(['auth', 'auth.admin']);
Route::post('/addImageToMachine', 'pictureController@addImageToMachine')->middleware(['auth', 'auth.admin']);



//ajax routes
Route::get('/getSubCategories', 'subCategoriesController@getSubCategories');


//email routes
Route::post('/sendMail', 'MailController@html_email');
Route::post('/addEmail', 'MailController@addMail');
