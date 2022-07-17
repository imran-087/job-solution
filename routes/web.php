<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\RecentQuestionController;
use App\Http\Controllers\ProfileSettingsController;
use App\Http\Controllers\Forum\DiscussionController;
use App\Http\Controllers\QuestionActivityController;
use App\Http\Controllers\Resume\UserDetailsController;
use App\Http\Controllers\ModelTest\ModelTestController;
use App\Http\Controllers\Admin\DependableCategoryController;
use App\Http\Controllers\ModelTest\CustomModelTestController;
use App\Http\Controllers\ModelTest\ModelTestResultController;
use App\Http\Controllers\Resume\CountryStateCityUpazilaPostController;
use App\Http\Controllers\Resume\EducationController;
use App\Http\Controllers\Resume\EmploymentController;
use App\Http\Controllers\Resume\OtherInformationController;
use App\Http\Controllers\Resume\PersonalDetailsController;
use App\Http\Controllers\Resume\PhotographController;
use App\Http\Controllers\Resume\ResumeViewController;

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

########### Autheticate Route  #############
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


  ########### Start Satt Exam ############
  #******* Model test **********#
  Route::get('/model-test', [ModelTestController::class, 'index'])->name('model-test.index');
  Route::get('/model-test/exam-details', [ModelTestController::class, 'show'])->name('model-test.exam-details');
  Route::get('/model-test/attend', [ModelTestController::class, 'modelTest'])->name('model-test.attend');
  Route::post('/model-test/submitted-data', [ModelTestController::class, 'submittedData'])->name('model-test.submit');

  #******* Custom Model test **********#
  Route::get('/custom/model-test', [CustomModelTestController::class, 'create'])->name('custom.model-test');
  Route::get('custom/model-test/data', [CustomModelTestController::class, 'getData'])->name('custom.test.data');


  #******* Model test result**********#
  Route::get('/model-test/result', [ModelTestResultController::class, 'index'])->name('result.index');
  Route::get('/model-test/details-view', [ModelTestResultController::class, 'show'])->name('model-test.details-view');

  ########### End Satt Exam ############

  ########### Resume Route ############
  Route::middleware('auth')->group( function() {

      //personal details
      Route::get('/resume/step_01/personal-details', [PersonalDetailsController::class, 'create'])->name('resume.personal');
      Route::post('/resume/step_01/personal_detail/store', [PersonalDetailsController::class, 'personalDetailStore'])->name('resume.personal_detail.store');
      Route::post('/resume/step_01/address_detail/store', [PersonalDetailsController::class, 'addressDetailStore'])->name('resume.address_detail.store');
      Route::post('/resume/step_01/preffered-job-cat/store', [PersonalDetailsController::class, 'prefferedJobCatStore'])->name('resume.preffered-job-cat.store');
      Route::post('/resume/step_01/career_application/store', [PersonalDetailsController::class, 'careerApplicationInfoStore'])->name('resume.career_application-info.store');
      Route::post('/resume/step_01/other_relevent_info/store', [PersonalDetailsController::class, 'otherReleventInfoStore'])->name('resume.other_relavent-info.store');
      Route::post('/resume/step_01/disability_info/store', [PersonalDetailsController::class, 'disabilitInfoStore'])->name('resume.disability_info.store');

      //step_1 delete route
      Route::get('resume/step_1/delete-personal-detail/{id}', [PersonalDetailsController::class, 'deletePersonalDetail'])->name('resume.personal_detail-delete');
      Route::get('resume/step_1/delete-career-application/{id}', [PersonalDetailsController::class, 'deleteCareerApplication'])->name('resume.career_application-delete');

      //step_1 get state
      Route::get('/resume/step_1/get-state/{id}', [CountryStateCityUpazilaPostController::class, 'stateData']);
      Route::get('/resume/step_1/get-city/{id}', [CountryStateCityUpazilaPostController::class, 'cityData']);
      Route::get('/resume/step_1/get-upazila/{id}', [CountryStateCityUpazilaPostController::class, 'upazilaData']);
      Route::get('/resume/step_1/get-post/{id}', [CountryStateCityUpazilaPostController::class, 'postData']);
      Route::get('/resume/step_1/search-city', [CountryStateCityUpazilaPostController::class, 'getMatchCityData'])->name('resume.searchcity');
      Route::get('/resume/step_1/search-organization', [CountryStateCityUpazilaPostController::class, 'getMatchOrganizationData'])->name('resume.searchorgazation');


      //educationandtraining
      Route::get('/resume/step_02/education-training', [EducationController::class, 'create'])->name('resume.education');
      Route::post('/resume/step_02/academic-summary/store', [EducationController::class, 'academicSummaryStore'])->name('resume.academic.store');
      Route::post('/resume/step_02/training-summary/store', [EducationController::class, 'trainingSummaryStore'])->name('resume.training.store');
      Route::post('/resume/step_02/professional-summary/store', [EducationController::class, 'professionalSummaryStore'])->name('resume.professional.store');
      Route::get('/resume/step_02/get-education-degree', [EducationController::class, 'getEducationDegree'])->name('resume.education-degree');

      ///Edit Step_02
      Route::get('/resume/step_02/get-professional-summary', [EducationController::class, 'getProfessionalCertificate'])->name('resume.get_certificate');
      Route::get('/resume/step_02/get-training-data', [EducationController::class, 'getTrainingData'])->name('resume.get_training_info');
      Route::get('/resume/step_02/get-academic-data', [EducationController::class, 'getAcademicData'])->name('resume.get_academic_info');

      //step_2 delete route
      Route::get('resume/step_2/delete-academy/{id}', [EducationController::class, 'deleteAcademy'])->name('resume.academy-delete');
      Route::get('resume/step_2/delete-training/{id}', [EducationController::class, 'deleteTraining'])->name('resume.training-delete');
      Route::get('resume/step_2/delete-certificate/{id}', [EducationController::class, 'deleteCertificate'])->name('resume.certificate-delete');

      //employmentHistory
      Route::get('/resume/step_03/employment-history', [EmploymentController::class, 'create'])->name('resume.employment');
      Route::post('/resume/step_03/employment-history/store', [EmploymentController::class, 'employmentHistoryStore'])->name('resume.employment_history.store');
      Route::post('/resume/step_03/retired-army/store', [EmploymentController::class, 'retiredArmyStore'])->name('resume.retired_army.store');

      //edit step_03
      Route::get('/resume/step_03/get-employment-data', [EmploymentController::class, 'getEmploymentHistory'])->name('resume.get_employment_info');
      
      //step_3 delete route
      Route::get('resume/step_3/delete-experience/{id}', [EmploymentController::class, 'deleteExperience'])->name('resume.experience-delete');
      

      //otherinformation
      Route::get('/resume/step_04/other-inforamtion', [OtherInformationController::class, 'create'])->name('resume.other_info');
      Route::post('/resume/step_04/specialization-skill/store', [OtherInformationController::class, 'skillStore'])->name('resume.skill.store');
      Route::post('/resume/step_04/description/store', [OtherInformationController::class, 'descriptionStore'])->name('resume.description.store');
      Route::post('/resume/step_04/extracaricular/store', [OtherInformationController::class, 'extracaricularStore'])->name('resume.extracaricular.store');
      Route::post('/resume/step_04/language-proficency/store', [OtherInformationController::class, 'languageStore'])->name('resume.language.store');
      Route::post('/resume/step_04/references/store', [OtherInformationController::class, 'referencesStore'])->name('resume.references.store');

      //step_4 edit route
      Route::get('resume/step_04/get-skill', [OtherInformationController::class, 'getSkill'])->name('resume.get_skill');
      Route::post('/resume/step_04/specialization-skill/update', [OtherInformationController::class, 'skillUpdate'])->name('resume.skill.update');
      Route::get('resume/step_04/get-language', [OtherInformationController::class, 'getLanguage'])->name('resume.get_language');
      Route::get('resume/step_04/get-references', [OtherInformationController::class, 'getReferences'])->name('resume.get_references');

      //step_4 delete route
      Route::get('resume/step_4/delete-skill/{id}', [OtherInformationController::class, 'deleteSkill'])->name('resume.skill-delete');
      Route::get('resume/step_4/delete-description/{id}', [OtherInformationController::class, 'deleteDescription'])->name('resume.description-delete');
      Route::get('resume/step_4/delete-extracurricular/{id}', [OtherInformationController::class, 'deleteExtracurricular'])->name('resume.extracurricular-delete');
      Route::get('resume/step_4/delete-reference/{id}', [OtherInformationController::class, 'deleteReference'])->name('resume.reference-delete');
      Route::get('resume/step_4/delete-language/{id}', [OtherInformationController::class, 'deleteLanguage'])->name('resume.language-delete');

      //photograph
      Route::get('/resume/step_05/photograph', [PhotographController::class, 'create'])->name('resume.photo');
      Route::post('/resume/step_05/photograph/store', [PhotographController::class, 'photographStore'])->name('resume.photograph.store');

    ####### Resume View ##
    Route::get('/resume-view', [ResumeViewController::class, 'index'])->name('resume.view.index');
    Route::get('/resume/pdf', [ResumeViewController::class, 'createPDF'])->name('resume.pdf');

});

######***News Feed ***#######
Route::get('/news-feed', [FeedController::class, 'index'])->name('news-feed');
Route::middleware('auth')->post('/feed/store', [FeedController::class, 'store'])->name('feed.store');
Route::middleware('auth')->post('/feed-reply/store', [FeedController::class, 'storeReply'])->name('feed.reply');
Route::get('feed/news/like/{id}', [FeedController::class, 'like'])->name('feed.like');


######***Feedback ***#######
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::get('/feedback/like/{id}', [FeedbackController::class, 'like'])->name('feedback.like');
Route::middleware('auth')->post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');


############ Dependable setect input route ###############
Route::get('/get-category/{id}', [DependableCategoryController::class, 'getCategory']);
Route::get('/get-sub-category/{id}', [DependableCategoryController::class, 'getSubCategory']);
Route::get('/get-subject/{id}', [DependableCategoryController::class, 'getSubject']);




#### TEssssssssst #######
Route::get('/test/matjx', function () {
  return view('category.test-mathjx');
});
