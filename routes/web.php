<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProfileSettingsController;
use App\Http\Controllers\Forum\DiscussionController;

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
  return view('index');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

######*********  Discussion ******########

Route::get('/discussion/{status?}', [DiscussionController::class, 'index'])->name('discussion.index');
Route::get('/discussion/{id}/show', [DiscussionController::class, 'show'])->name('discussion.show');
Route::get('/discussion/channel/{channel}', [DiscussionController::class, 'channelDiscussion'])->name('discussion.channel');
Route::post('/discussion/search', [DiscussionController::class, 'search'])->name('discussion.search');
Route::get('/discussion/view-count/{id}', [DiscussionController::class, 'viewCount'])->name('discussion.view');


Route::middleware('auth')->group(function () {
  Route::post('/discussion/store', [DiscussionController::class, 'store'])->name('discussion.store');
  Route::post('/discussion/reply', [DiscussionController::class, 'reply'])->name('discussion.reply');
  Route::get('/discussion/vote/{id}', [DiscussionController::class, 'vote'])->name('discussion.vote');
  Route::get('/discussions/{discussion}/replies/{reply}/mark-as-best-reply', [DiscussionController::class, 'bestreply'])->name('discussions.best-reply');
});

/*****************
  Category Route
 ********************/
//get category 
Route::get('/job-solution/{main_category}', [CategoryController::class, 'getCategory']);
//get sub category 
Route::get('/job-solution/{main_category}/{category}', [CategoryController::class, 'getSubCategory'])->name('jobs.category.sub-category');
//*Get year wise sub category
Route::get('job-solutions/year={year}', [CategoryController::class, 'getSubCategoryByYear'])->name('job-solution.year');


/*****************
  Question Route
 ********************/
//get subject and all question 
Route::get('/jobs/{category}/{sub_category}/all-question', [QuestionController::class, 'getSubjectWithAllQuestion'])->name('jobs.sub-category.subject.all-question');
//vote
Route::get('/question/vote/{id}', [QuestionController::class, 'vote'])->name('question.vote');
//view count
Route::get('/question/view-count/{id}', [QuestionController::class, 'viewCount'])->name('question.view-count');
//single question
Route::get('/single-question', [QuestionController::class, 'singleQuestion'])->name('question.single-question');

/** get subject wise question */
Route::get('/jobs/{category}/{sub_category}/{subject}', [QuestionController::class, 'getSubjectWiseQuestion'])->name('jobs.category.sub-category.subject.question');

//question bookmark
Route::get('/question/bookmark/{id}/{catid}', [QuestionController::class, 'bookmark'])->name('question.bookmark');
//question comment
Route::post('question/comment/store', [CommentController::class, 'store'])->name('question.comment-store');


/********************* 
   Question Description
 ****************************/
Route::post('/description/question-description/store', [DescriptionController::class, 'store'])->name('description.question-description');
Route::get('/question/edit-question/{id}', [QuestionController::class, 'edit'])->name('question.edit-question');
Route::post('/question/update-question', [QuestionController::class, 'update'])->name('question.update-question');


####### User  route #######
Route::middleware('auth')->name('user-dashboard.')->group(function () {
  Route::get('/my-dashboard/{user}', [UserDashboardController::class, 'index'])->name('index');

  Route::get('/my-dashboard/{user}/profile-settings', [UserDashboardController::class, 'profileSettings'])->name('profile-settings');
  Route::post('/my-dashboard/profile-settings/chnage-password', [UserDashboardController::class, 'chnagePassword'])->name('chnage-password');
  Route::post('/my-dashboard/profile-settings/update-profile', [UserDashboardController::class, 'updateProfile'])->name('update-profile');

  ###**  Bookmark **###
  Route::get('/my-bookmark/user={user}', [BookmarkController::class, 'getBookmark'])->name('bookmark');
  Route::get('/my-bookmark/user={user}/category={category}', [BookmarkController::class, 'getBookmarkByCategory'])->name('bookmark.category');
});
