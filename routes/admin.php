<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DiscussionController;
use App\Http\Controllers\Admin\BackendUserController;
use App\Http\Controllers\Admin\NotificationController;

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

        //subject-tree
        Route::get('/subject/subject-tree', 'SubjectController@treeView')->name('subject.tree');
        // Route::get('/subject/subject-tree/data', 'SubjectController@treeData')->name('subject.tree_data');

        // test route for create tree 
        Route::get('tree/create-subject', 'SubjectController@createSubject')->name('subject.create-tree');
        Route::post('/tree/store-subject', 'SubjectController@storeSubject')->name('subject.store_tree');
        // Route::get('tree/create-subject', 'SubjectController@createSubject')->name('subject.create-tree');

        ############ Trashed Route ############
        //question trashed
        Route::get('/trashed/question-trashed', 'TrashedController@questionTranshed')->name('trashed.question');
        Route::get('/trashed/restore-question/{id}', 'TrashedController@questionRestore')->name('trashed.question.restore');

        //description trashed
        Route::get('/trashed/description-trashed', 'TrashedController@descriptionTranshed')->name('trashed.description');
        Route::get('/trashed/restore-description/{id}', 'TrashedController@descriptionRestore')->name('trashed.description.restore');


        ############ Year Route #############
        Route::get('/year/index', 'YearController@index')->name('year.index');
        Route::post('/year/store', 'YearController@store')->name('year.store');
        Route::get('/year/get/{id}', 'YearController@getYear')->name('year.get');
        Route::get('/year/delete/{id}', 'YearController@deleteYear')->name('year.delete');

        ############ BookmarkType Route #############
        Route::get('/bookmark-type/index', 'BookmarkTypeController@index')->name('bookmark-type.index');
        Route::post('/bookmark-type/store', 'BookmarkTypeController@store')->name('bookmark-type.store');
        Route::get('/bookmark-type/get/{id}', 'BookmarkTypeController@getType')->name('bookmark-type.get');
        Route::get('/bookmark-type/delete/{id}', 'BookmarkTypeController@deleteType')->name('bookmark-type.delete');


        ############ Passage Route #############
        Route::get('/passage/index', 'PassageController@index')->name('passage.index');
        Route::post('/passage/store', 'PassageController@store')->name('passage.store');
        Route::get('/passage/get/{id}', 'PassageController@getPassage')->name('passage.get');
        Route::get('/passage/delete/{id}', 'PassageController@deletePassage')->name('passage.delete');

        ######### Preview Question #########
        Route::post('/question/preview-question', 'QuestionController@preview')->name('question.preview-store');
        // Route::get('/question/preview-question/show', 'QuestionController@previewQuestion')->name('question.preview');
        Route::get('/question/edit-question/modal/{id}', 'QuestionController@editPreviewQuestion')->name('question.preview-edit');
        Route::post('/question/edit-question/update', 'QuestionController@updatePreviewQuestion')->name('question.preview-update');


        ############ MCQ Question Route #############
        Route::get('/question/question-index', 'QuestionController@index')->name('question.index');

        Route::get('/question/create', 'QuestionController@create')->name('question.create');
        Route::post('/question/question-input', 'QuestionController@createQuestionInput')->name('question.question-input');
        Route::get('/question/edit-question', 'QuestionController@editQuestion')->name('question.edit');
        Route::post('/question/update', 'QuestionController@update')->name('question.update');
        Route::get('/question/get/{id}', 'QuestionController@getQuestion')->name('question.get');
        Route::get('/question/delete/{id}', 'QuestionController@deleteQuestion')->name('question.delete');
        Route::get('/question/mcq-question/view', 'QuestionController@allQuestion')->name('question.all-question');
        Route::get('/question/passage-mcq-question/view', 'QuestionController@passageQuestion')->name('question.passage-question');
        Route::get('/question/image-mcq-question/view', 'QuestionController@imageQuestion')->name('question.image-question');

        Route::post('/question/preview', 'QuestionController@preview')->name('question.preview');
        Route::post('/question/store', 'QuestionController@store')->name('question.store');

        Route::get('/question/store/{val}', 'QuestionController@storeQuestion')->name('question.store-question');

        //new
        Route::get('/question/mcq-question', 'QuestionController@getCategory')->name('question.category');
        Route::get('/question/mcq-question/sub-categories', 'QuestionController@getSubCategory')->name('question.sub-category');



        //edited question
        Route::get('/question/edited-question/index', 'EditedQuestionController@index')->name('question.edited-question');
        Route::get('question/edited-question/delete/{id}', 'EditedQuestionController@delete')->name('question.edited-question.delete');
        Route::post('question/edited-question/accept', 'EditedQuestionController@acceptQuestion')->name('question.edited-question.accept');
        Route::get('question/edited-question/reject/{id}', 'EditedQuestionController@rejectQuestion')->name('question.edited-question.reject');
        Route::get('question/edited-question/show/{id}', 'EditedQuestionController@showQuestion')->name('question.edited-question.show');

        // add tag 
        Route::get('/question/add-tag-on-question', 'TagController@index')->name('question.tag');
        Route::get('/question/add-tag-on-question2', 'TagController@index2')->name('question.tag2');
        Route::post('question/tag/search', 'TagController@searchTag')->name('question.search-tag');
        Route::post('question/tag/tag-added', 'TagController@addTag')->name('question.add-tag');
        //add subject
        Route::get('question/subject/get-subject', 'TagController@getSubject')->name('question.get-subject');
        Route::post('question/subject/add-subject', 'TagController@addSubject')->name('question.add-subject');


        ############ Description Route #############
        //Question Description
        Route::get('/description/question-description', 'QuestionDescriptionController@index')->name('question-description.index');
        Route::post('/description/question-description/store', 'QuestionDescriptionController@store')->name('question-description.store');
        Route::get('/description/question-description/create', 'QuestionDescriptionController@create')->name('question-description.create');
        Route::get('/description/question-description/get/{id}', 'QuestionDescriptionController@getQuestionDes')->name('question-description.get');
        Route::get('/description/question-description/delete/{id}', 'QuestionDescriptionController@deleteQuestionDes')->name('question-description.delete');

        Route::get('/description/pending-question-description', 'QuestionDescriptionController@pending')->name('question-description.pending');
        Route::post('/description/pending-description/accept', 'QuestionDescriptionController@acceptDescription')->name('question-description.accept');
        Route::get('/description/pending-description/reject/{id}', 'QuestionDescriptionController@rejectDescription')->name('question-description.reject');
        Route::get('/description/pending-question-description/status/{id}', 'QuestionDescriptionController@chnageStatus')->name('question-description.pending-status');

        //show description
        Route::get('/description/question-description/show/{id}', 'QuestionDescriptionController@showDescription')->name('question-description.show');
        Route::get('/description/question-all-description/show/{id}', 'QuestionDescriptionController@getAllDescription')->name('question-all-description.show');

        #** Samprotik Description **#
        Route::post('/samprotik-description/store', 'SamprotikDescriptionController@store')->name('samprotik-description.store');
        Route::post('/samprotik-description/update', 'SamprotikDescriptionController@update')->name('samprotik-description.update');

        #** Written Description **#
        Route::post('/written-question/description/store', 'WrittenDescriptionController@store')->name('written-description.store');

        ########## User Management ###########
        Route::get('/user-management/user-list', 'UserController@index')->name('user-management.index');
        Route::get('/user-management/user/change-status/{id}', 'UserController@chnageStatus')->name('user-management.chnage-status');
        ##backend-users
        Route::get('/user-management/backend-user-list', 'BackendUserController@index')->name('user-management.backend.index');
        Route::post('/user-management/backend-user/store', 'BackendUserController@store')->name('user-management.backend.store');
        Route::get('/user-management/backend-user/change-status/{id}', 'BackendUserController@chnageStatus')->name('user-management.chnage-status');

        ############ Dependable setect input route ###############
        Route::get('/get-category/{id}', 'DependableCategoryController@getCategory');
        Route::get('/get-sub-category/{id}', 'DependableCategoryController@getSubCategory');
        Route::get('/get-subject/{id}', 'DependableCategoryController@getSubject');
        Route::get('/get-parent-subject/{id}', 'DependableCategoryController@getParentSubject');
        Route::get('/get-sub-parent-subject/{id}', 'DependableCategoryController@getSubParentSubject');
        Route::get('/get-question/{subject_id}', 'DependableCategoryController@getQuestion');
        Route::get('/get-parent-subject/{parent_id}', 'DependableCategoryController@getParentSubject');


        ############## Samprotik Question ###############
        Route::get('/question/samprotik-question', 'SamprotikQuestionController@index')->name('samprotik.index');
        Route::get('/question/samprotik-question/create', 'SamprotikQuestionController@create')->name('samprotik.create');
        Route::post('/question/samprotik-question/input', 'SamprotikQuestionController@input')->name('samprotik.input');
        Route::get('/question/samprotik-question/edit', 'SamprotikQuestionController@edit')->name('samprotik.edit');
        Route::post('/question/samprotik-question/update', 'SamprotikQuestionController@update')->name('samprotik.update');
        Route::post('/question/samprotik-question/preview', 'SamprotikQuestionController@preview')->name('samprotik.preview');
        Route::post('/question/samprotik-question/store', 'SamprotikQuestionController@store')->name('samprotik.store');
        // Samprotik filter route
        Route::get('/question/samprotik/option-filter', 'SamprotikQuestionController@optionFilter')->name('samprotik.option-filter');
        Route::get('/question/samprotik-filter-by-date', 'SamprotikQuestionController@dateFilter')->name('samprotik.date-filter');
        Route::get('/question/samprotik-filter-category', 'SamprotikQuestionController@categoryFilter')->name('samprotik.category-filter');

        ######## Samprotik Tag ########
        Route::get('/samprotik-tag/index', 'SamprotikTagController@index')->name('samprotik-tag.index');
        Route::post('/samprotik-tag/store', 'SamprotikTagController@store')->name('samprotik-tag.store');
        Route::get('/samprotik-tag/get/{id}', 'SamprotikTagController@getTag')->name('samprotik-tag.get');
        Route::get('/samprotik-tag/delete/{id}', 'SamprotikTagController@deleteTag')->name('samprotik-tag.delete');

        //add tag
        Route::get('/samprotik-tag/get-tag', 'SamprotikTagController@getAllTAg')->name('samprotik-alltag.index');
        Route::post('/samprotik-question/add-tag', 'SamprotikTagController@addTag')->name('samprotik-addtag');

        //pdf
        Route::get('/question/samprotik-question/pdf', 'SamprotikQuestionController@createPDF')->name('samprotik.pdf');
        //pagination
        // Route::get('/question/pagination/fetch_data', 'SamprotikQuestionController@fetch_data');


        ############## Written Question ###############
        Route::get('/question/written-question', 'WrittenQuestionController@index')->name('written.index');
        Route::get('/question/written-question/create', 'WrittenQuestionController@create')->name('written.create');
        Route::post('/question/written-question/store', 'WrittenQuestionController@store')->name('written.store');
        Route::get('/question/written-question/show', 'WrittenQuestionController@show')->name('written.show');
        Route::get('/question/written-question/edit/{id}/{type}', 'WrittenQuestionController@edit')->name('written.edit');
        Route::post('/question/written-question/update', 'WrittenQuestionController@update')->name('written.update');
        Route::get('/question/written-question/get-instruction', 'WrittenQuestionController@getInstruction')->name('written.instruction');

        ############## Written Question Test ###############
        Route::get('/question/written-question/test/show', 'WrittenQuestionTestController@getCategory')->name('written.test.show');
        Route::get('/question/written-question/sub-categories', 'WrittenQuestionTestController@getSubCategory')->name('written.test.sub-categories');

        Route::get('/question/written-question/test', 'WrittenQuestionTestController@getQuestion')->name('written.test.question');

        /*
        |--------------------------------------------------------------------------
        | Exam
        |--------------------------------------------------------------------------
        */

        ######### Exam route ###########
        Route::get('/exam', 'Exam\ExamController@index')->name('exam.index');
        Route::get('/exam/create', 'Exam\ExamController@create')->name('exam.create');
        Route::post('/exam/store', 'Exam\ExamController@store')->name('exam.store');
        Route::get('/exam/edit/{id}', 'Exam\ExamController@edit')->name('exam.edit');
        Route::post('/exam/update', 'Exam\ExamController@update')->name('exam.update');

        ######### Exam details route ###########
        Route::get('/exam-details/create', 'Exam\ExamDetailsController@create')->name('exam-details.create');
        Route::get('/exam-details/get-subject/{id}', 'Exam\ExamDetailsController@getSubject')->name('exam-details.subject');
        Route::post('/exam-details/store', 'Exam\ExamDetailsController@store')->name('exam-details.store');
        Route::get('/exam-details/get-subject/subject/{id}', 'Exam\ExamDetailsController@examSubject')->name('exam-details.subject');


        ######### Exam Details add questions #########
        Route::get('/exam-details/exam-question', 'Exam\ExamDetailsController@question')->name('exam-details.question');
        Route::post('/exam-details/get-subject-question', 'Exam\ExamDetailsController@getQuestion')->name('exam-details.get-question');
        Route::post('/exam-details/exam-question/add', 'Exam\ExamDetailsController@addQuestion')->name('exam-details.question-add');

        ####### Package route ###########
        Route::get('/packages/index', 'PackageController@index')->name('package.index');
        Route::post('/packages/store', 'PackageController@store')->name('package.store');
        Route::get('/packages/get/{id}', 'PackageController@get')->name('package.get');
        Route::get('/packages/delete/{id}', 'PackageController@delete')->name('package.delete');

        ####### Points route ###########
        Route::get('/points/index', 'PointController@index')->name('point.index');
        Route::post('/points/store', 'PointController@store')->name('point.store');
        Route::get('/points/get/{id}', 'PointController@get')->name('point.get');
        Route::get('/points/delete/{id}', 'PointController@delete')->name('point.delete');

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

        ########### Mark as read Notification ################
        Route::get('/notification/mark-as-read/{id}', 'NotificationController@markAsRead')->name('notification.mark-as-read');
    });
});
