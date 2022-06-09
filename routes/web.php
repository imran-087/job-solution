<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\RecentQuestionController;
use App\Http\Controllers\ProfileSettingsController;
use App\Http\Controllers\Forum\DiscussionController;
use App\Http\Controllers\ModelTest\ModelTestController;
use App\Http\Controllers\QuestionActivityController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserActivityController;

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
Route::get('/discussion/channel/discussion/{id}/show', [DiscussionController::class, 'show']);
Route::post('/discussion/search', [DiscussionController::class, 'search'])->name('discussion.search');
Route::get('/discussion/view-count/{id}', [DiscussionController::class, 'viewCount'])->name('discussion.view');
Route::post('/discussion/ckeditor-image-upload', [DiscussionController::class, 'uploadImage'])->name('ckeditor.upload');
Route::post('/discussion/store', [DiscussionController::class, 'store'])->name('discussion.store');
Route::middleware('auth')->group(function () {

  Route::get('/discussion/vote/{id}', [DiscussionController::class, 'vote'])->name('discussion.vote');

  Route::post('/discussion/reply', [ReplyController::class, 'reply'])->name('discussion.reply');
  Route::get('/discussions/{discussion}/replies/{reply}/mark-as-best-reply', [ReplyController::class, 'bestreply'])->name('discussions.best-reply');
  Route::post('/discussions/answer/reply-answer', [ReplyController::class, 'replyToAanswer'])->name('duscussion.answer.reply');
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
/** get subject wise question */
Route::get('/jobs/{category}/{sub_category}/{subject}', [QuestionController::class, 'getSubjectWiseQuestion'])->name('jobs.category.sub-category.subject.question');
//single question
Route::get('/single-question', [QuestionController::class, 'singleQuestion'])->name('question.single-question');

//edit question
Route::get('/question/edit-question/{id}/{type?}', [QuestionController::class, 'edit'])->name('question.edit-question');
Route::post('/question/edit-question/update', [QuestionController::class, 'update'])->name('question.update-question');

//subject wise question
Route::get('subjects/{subject?}', [SubjectController::class, 'index'])->name('subject.subject');


/******************
   Question Activity
 * *****************/
Route::get('question/answer-check/{id}/{option}', [QuestionActivityController::class, 'checkAnswer'])->name('question.answer-check');
Route::get('/question/vote/{id}', [QuestionActivityController::class, 'vote'])->name('question.vote');
Route::get('/question/view-count/{id}', [QuestionActivityController::class, 'viewCount'])->name('question.view-count');
Route::get('/question/bookmark/{id}/{catid}', [QuestionActivityController::class, 'bookmark'])->name('question.bookmark');
Route::post('/question/bookmark', [QuestionActivityController::class, 'storeBookmark']);
Route::get('/question/bookmark-remove/{id}', [QuestionActivityController::class, 'bookmarkRemove'])->name('question.bookmark-remove');
Route::get('/samprotik-question/bookmark/{id}/{cat}', [QuestionActivityController::class, 'samprotikBookmark'])->name('samprotik-question.bookmark');

//comment
Route::post('question/comment/store', [CommentController::class, 'store'])->name('question.comment-store');

/******************
   Recent/Samprotik Question
 * *****************/
Route::get('samprotik', [RecentQuestionController::class, 'recentQuestion'])->name('question.recent-question');

/*********************
   Question Description
 ****************************/
Route::post('/description/question-description/store', [DescriptionController::class, 'store'])->name('description.question-description');
Route::post('/description/question-description/resubmit', [DescriptionController::class, 'resubmit'])->name('description.resubmit');
Route::get('/description/vote/{id}', [DescriptionController::class, 'like'])->name('description.like');
Route::get('/description/question-des/get/{id}', [DescriptionController::class, 'getdescription'])->name('description.resubmit');

####### User  route #######
Route::middleware('auth')->name('user.')->group(function () {
  Route::get('/my-dashboard/{user}', [UserDashboardController::class, 'index'])->name('index');

  Route::get('/my-dashboard/{user}/profile-settings', [UserDashboardController::class, 'profileSettings'])->name('profile-settings');
  Route::post('/my-dashboard/profile-settings/chnage-password', [UserDashboardController::class, 'chnagePassword'])->name('chnage-password');
  Route::post('/my-dashboard/profile-settings/update-profile', [UserDashboardController::class, 'updateProfile'])->name('update-profile');

  //activity
  Route::get('user-activities', [UserDashboardController::class, 'userActivity'])->name('activity');
  // activity details 
  Route::get('user-activity/user={user}/description-details', [UserActivityController::class, 'description'])->name('activity.description');
  Route::get('user-activity/user={user}/edited-question-details', [UserActivityController::class, 'editedQuestion'])->name('activity.edited-question');
  Route::get('user-activity/user={user}/discussion-details', [UserActivityController::class, 'discussion'])->name('activity.discussion');

  //Resume
  Route::get('user-resume/create', [ResumeController::class, 'create'])->name('resume');
  Route::post('user-resume/store-general-info', [ResumeController::class, 'generalInfoStore'])->name('resume.general-info.store');
  Route::post('user-resume/store-educational-info', [ResumeController::class, 'educationalInfoStore'])->name('resume.educational-info.store');


  ###**  Bookmark **###
  Route::get('/my-bookmark/user={user}', [BookmarkController::class, 'getBookmark'])->name('bookmark');
  Route::get('/my-bookmark/samprotik/user={user}', [BookmarkController::class, 'getSamprotikBookmark'])->name('samprotik.bookmark');
  Route::get('/my-bookmark/user={user}/category={category}', [BookmarkController::class, 'getBookmarkByCategory'])->name('bookmark.category');
  Route::get('/my-bookmark/bookmark-type', [BookmarkController::class, 'getBookmarkByType'])->name('bookmark.bookmark-type');
});


########### Satt Exam ############
#******* Model test **********#
Route::get('/model-test', [ModelTestController::class, 'index'])->name('model-test.index');
Route::get('/model-test/exam-details', [ModelTestController::class, 'show'])->name('model-test.exam-details');
Route::get('/model-test/attend', [ModelTestController::class, 'modelTest'])->name('model-test.attend');
Route::post('/model-test/submitted-data', [ModelTestController::class, 'submittedData'])->name('model-test.submit');

######***News Feed ***#######
Route::get('/news-feed', [FeedController::class, 'index'])->name('news-feed');
Route::middleware('auth')->post('/feed/store', [FeedController::class, 'store'])->name('feed.store');
Route::middleware('auth')->post('/feed-reply/store', [FeedController::class, 'storeReply'])->name('feed.reply');
Route::get('feed/news/like/{id}', [FeedController::class, 'like'])->name('feed.like');


######***Feedback ***#######
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::get('/feedback/like/{id}', [FeedbackController::class, 'like'])->name('feedback.like');
Route::middleware('auth')->post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');


Route::get('/test/matjx', function () {
  return view('category.test-mathjx');
});
