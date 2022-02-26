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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/category/main-category', function () {
    return view('admin.category.main_category');
});

Route::get('/admin/category/category', function () {
    return view('admin.category.category');
});

Route::get('/admin/category/sub-category', function () {
    return view('admin.category.sub_category');
});

Route::get('/admin/category/subject', function () {
    return view('admin.category.subject');
});
