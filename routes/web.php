<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DescriptionController;
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

/*********  Discussion ************/
Route::get('/discussion/{status?}', [DiscussionController::class, 'index'])->name('discussion.index');
Route::get('/discussion/{id}/show', [DiscussionController::class, 'show'])->name('discussion.show');
Route::get('/discussion/channel/{channel}', [DiscussionController::class, 'channelDiscussion'])->name('discussion.channel');
Route::post('/discussion/search', [DiscussionController::class, 'search'])->name('discussion.search');
Route::get('/discussion/view-count/{id}', [DiscussionController::class, 'viewCount'])->name('discussion.view');

/*********  Question ************/
Route::get('/question/all-question', [QuestionController::class, 'index'])->name('question.index');
Route::get('/question/vote/{id}', [QuestionController::class, 'vote'])->name('question.vote');

/*
  subject wise Question
*/
Route::get(
    '/question/{main_category}/{category}/{sub_category}/{subject}',
    [QuestionController::class, 'subjectWiseQuestion']
)->name('question.subject-wise-question');


//question bookmark
Route::get('/question/bookmark/{id}', [QuestionController::class, 'bookmark'])->name('question.bookmark');

/*
   Question Description
*/
Route::post('/description/question-description/store', [DescriptionController::class, 'store'])->name('description.question-description');

// filter 
//Route::get('/discussion/{status}', [DiscussionController::class, 'discussionFilter'])->name('discussion.filter-discussion');

Route::middleware('auth')->group(function () {
    Route::post('/discussion/store', [DiscussionController::class, 'store'])->name('discussion.store');
    Route::post('/discussion/reply', [DiscussionController::class, 'reply'])->name('discussion.reply');
    Route::get('/discussion/vote/{id}', [DiscussionController::class, 'vote'])->name('discussion.vote');
    Route::get('/discussions/{discussion}/replies/{reply}/mark-as-best-reply', [DiscussionController::class, 'bestreply'])->name('discussions.best-reply');
});
