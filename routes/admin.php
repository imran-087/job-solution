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

    ########## Password Reset #########
    Route::get('password/reset', 'Auth\ForgetPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgetPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@resetPassword')->name('password.update');

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

        ############ Subject Route #############
        Route::get('/category/subject', 'SubjectController@index')->name('subject.index');
        Route::post('/category/subject/store', 'SubjectController@store')->name('subject.store');
        Route::get('/category/subject/get/{id}', 'SubjectController@getSubject')->name('subject.get');
        Route::get('/category/subject/delete/{id}', 'SubjectController@deleteSubject')->name('subject.delete');

        ############ Year Route #############
        Route::get('/year/index', 'YearController@index')->name('year.index');
        Route::post('/year/store', 'YearController@store')->name('year.store');
        Route::get('/year/get/{id}', 'YearController@getYear')->name('year.get');
        Route::get('/year/delete/{id}', 'YearController@deleteYear')->name('year.delete');



        ############ Dependable setect route ###############
        Route::get('/get-category/{id}', 'GetAllCategoryController@getCategory');
        Route::get('/get-sub-category/{id}', 'GetAllCategoryController@getSubCategory');
        Route::get('/get-subject/{id}', 'GetAllCategoryController@getSubject');
        Route::get('/get-question/{subject_id}', 'GetAllCategoryController@getQuestion');
        Route::get('/get-parent-subject/{parent_id}', 'GetAllCategoryController@getParentSubject');
    });
});
