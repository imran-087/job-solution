<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin.')->group(function () {

    ########### Auth Route ############
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login');

    ############ Route For Authenticate User #############
    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        ############ Dashboard Route #############
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        ############ Main Category Route #############
        Route::get('/category/main-category', 'MainCategoryController@index')->name('main-category.index');
        Route::post('/category/main-category/store', 'MainCategoryController@store')->name('main-category.store');
        Route::get('/category/main-category/get/{id}', 'MainCategoryController@getCategory')->name('main-category.get');
        Route::get('/category/main-category/delete/{id}', 'MainCategoryController@deleteCategory')->name('main-category.delete');

        ############ Category Route #############
        Route::get('/category/category-index', 'CategoryController@index')->name('category.index');
        Route::post('/category/category/store', 'CategoryController@store')->name('category.store');
        Route::get('/category/category/get/{id}', 'CategoryController@getCategory')->name('category.get');
        Route::get('/category/category/delete/{id}', 'CategoryController@deleteCategory')->name('category.delete');

        ############ Sub Category Route #############
        Route::get('/category/sub-category', 'SubCategoryController@index')->name('sub-category.index');
        Route::post('/category/sub-category/store', 'SubCategoryController@store')->name('sub-category.store');
        Route::get('/category/sub-category/get/{id}', 'SubCategoryController@getCategory')->name('sub-category.get');
        Route::get('/category/sub-category/delete/{id}', 'SubCategoryController@deleteCategory')->name('sub-category.delete');



        Route::get('/category/subject', function () {
            return view('admin.category.subject');
        });

        ############ Dependable setect route ###############
        Route::get('/get-category/{id}', 'GetAllCategoryController@getCategory');
        Route::get('/get-sub-category/{id}', 'GetAllCategoryController@getSubCategory');
        Route::get('/get-subject/{id}', 'GetAllCategoryController@getSubject');
        Route::get('/get-question/{subject_id}', 'GetAllCategoryController@getQuestion');
        Route::get('/get-parent-subject/{parent_id}', 'GetAllCategoryController@getParentSubject');
    });
});
