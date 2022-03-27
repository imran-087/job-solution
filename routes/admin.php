<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DiscussionController;
use App\Http\Controllers\Admin\BackendUserController;

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

        ############ Admin Profile ##############
        Route::get('/profile-settings', 'ProfileSettingsController@index')->name('profile');
        Route::post('/profile-settings/update-profile', 'ProfileSettingsController@updateProfile')->name('update-profile');
        Route::post('/profile-settings/change-password', 'ProfileSettingsController@chnagePassword')->name('change-password');

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


        ############ Passage Route #############
        Route::get('/passage/index', 'PassageController@index')->name('passage.index');
        Route::post('/passage/store', 'PassageController@store')->name('passage.store');
        Route::get('/passage/get/{id}', 'PassageController@getPassage')->name('passage.get');
        Route::get('/passage/delete/{id}', 'PassageController@deletePassage')->name('passage.delete');

        ############ Question Route #############
        Route::get('/question/question-index', 'QuestionController@index')->name('question.index');
        Route::get('/question/create', 'QuestionController@create')->name('question.create');
        Route::post('/question/question-input', 'QuestionController@createQuestionInput')->name('question.question-input');
        Route::get('/question/edit-question/{id}', 'QuestionController@editQuestion')->name('question.question-edit');
        Route::post('/question/store', 'QuestionController@store')->name('question.store');
        Route::post('/question/update', 'QuestionController@update')->name('question.update');
        Route::get('/question/get/{id}', 'QuestionController@getQuestion')->name('question.get');
        Route::get('/question/delete/{id}', 'QuestionController@deleteQuestion')->name('question.delete');
        //edited question
        Route::get('/question/edited-question/index', 'EditedQuestionController@index')->name('question.edited-question');
        Route::get('question/edited-question/delete/{id}', 'EditedQuestionController@delete')->name('question.edited-question.delete');
        Route::get('question/edited-question/accept/{id}', 'EditedQuestionController@acceptQiestion')->name('question.edited-question.accept');
        Route::get('question/edited-question/show/{id}', 'EditedQuestionController@showQiestion')->name('question.edited-question.show');


        ############ Description Route #############
        //Question Description
        Route::get('/description/question-description', 'QuestionDescriptionController@index')->name('question-description.index');
        Route::post('/description/question-description/store', 'QuestionDescriptionController@store')->name('question-description.store');
        Route::get('/description/question-description/get/{id}', 'QuestionDescriptionController@getQuestionDes')->name('question-description.get');
        Route::get('/description/question-description/delete/{id}', 'QuestionDescriptionController@deleteQuestionDes')->name('question-description.delete');

        Route::get('/description/pending-question-description', 'QuestionDescriptionController@pending')->name('question-description.pending');
        Route::get('/description/pending-question-description/status/{id}', 'QuestionDescriptionController@chnageStatus')->name('question-description.pending-status');


        ########## User Management ###########
        Route::get('/user-management/user-list', 'UserController@index')->name('user-management.index');
        Route::get('/user-management/user/change-status/{id}', 'UserController@chnageStatus')->name('user-management.chnage-status');
        ##backend-users
        Route::get('/user-management/backend-user-list', 'BackendUserController@index')->name('user-management.backend.index');
        Route::post('/user-management/backend-user/store', 'BackendUserController@store')->name('user-management.backend.store');
        Route::get('/user-management/backend-user/change-status/{id}', 'BackendUserController@chnageStatus')->name('user-management.chnage-status');

        ############ Dependable setect input route ###############
        Route::get('/get-category/{id}', 'GetAllCategoryController@getCategory');
        Route::get('/get-sub-category/{id}', 'GetAllCategoryController@getSubCategory');
        Route::get('/get-subject/{id}', 'GetAllCategoryController@getSubject');
        Route::get('/get-question/{subject_id}', 'GetAllCategoryController@getQuestion');
        Route::get('/get-parent-subject/{parent_id}', 'GetAllCategoryController@getParentSubject');


        /*
        |--------------------------------------------------------------------------
        | Discussion Forum
        |--------------------------------------------------------------------------
        */

        ############ Channel Route #############
        Route::get('/forum/channel/index', 'ChannelController@index')->name('channel.index');
        Route::post('/forum/channel/store', 'ChannelController@store')->name('channel.store');
        Route::get('/forum/channel/get/{id}', 'ChannelController@getChannel')->name('channel.get');
        Route::get('/forum/channel/delete/{id}', 'ChannelController@deleteChannel')->name('channel.delete');

        ############ Discussion Route #############
        Route::get('/forum/discussion/index', 'DiscussionController@index')->name('discussion.index');
        Route::get('/forum/discussion/delete/{id}', 'DiscussionController@delete')->name('discussion.delete');
    });
});
