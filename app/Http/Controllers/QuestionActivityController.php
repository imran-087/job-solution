<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Bookmark;
use App\Models\Question;
use App\Models\BookmarkType;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use App\Models\SamprotikBookmark;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class QuestionActivityController extends Controller
{
    // viewcount when click on question 
    public function viewCount($id)
    {
        $question = Question::find($id);
        $question->view_count = $question->view_count + 1;

        $question->save();
    }

    /*like/vote question*/
    public function storeVote($id)
    {
        //dd($id);
        $question = Question::find($id);
        $vote = Vote::where(['votable_id' => $id, 'votable_type' => 'App\Models\Question', 'user_id' => Auth::user()->id])->first();

        if ($vote) {
            return response()->json([
                'error' => true,
                'message' => 'you already like this Question!'
            ]);
        } else {
            $question->votes()->create([
                'user_id' => Auth::user()->id
            ]);

            $question->vote = $question->vote + 1;

            if ($question->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'You liked this Question!'
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed!.'
                ]);
            }
        }
    }

    //check question answer
    public function checkAnswer($id, $option)
    {
        $question_option = QuestionOption::find($id);
        if ($question_option->answer == $option) {
            return response()->json([
                'success' => true,
                'message' => 'Correct answer'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Incorrect answer'
            ], 200);
        }
    }

   
    /*store mcq-question bookmark*/
    public function storeBookmark(Request $request)
    {
        //dd($request->all());

        if (!Auth::check()) {
            //dd('notauth');
            return response()->json([
                'error' => true,
                'message' => 'Please login to add a bookmark.'
            ]);
        } else {

            $bookmark = Bookmark::where(['bookmarkable_id' => $request->question_id, 'bookmarkable_type' =>'App\Models\Question', 'user_id' => Auth::user()->id])->first();
            //dd('getbookmark');
            if ($bookmark === null) {
                //dd('null');
                //save bookmarktype
                $bookmark_type = BookmarkType::where('type_name', $request->bookmark_type)
                    ->whereIn('created_user_id', [Auth::user()->id, 0])
                    ->first();

                //dd($bookmark_type);

                if ($bookmark_type === null) {

                    $bookmark_type = BookmarkType::create([
                        'type_name' => $request->bookmark_type,
                        'created_user_id' => Auth::user()->id,
                    ]);

                    $bookmark = new Bookmark();
                    $bookmark->category_id = $request->catid;
                    $bookmark->user_id = Auth::user()->id;
                    $bookmark->bookmark_type_id = $bookmark_type->id;
                    $bookmark->created_at = Carbon::now();

                    $question = Question::find($request->question_id);

                    if ($question->bookmarks()->save($bookmark)) {
                        return response()->json([
                            'success' => true,
                            'message' => 'Bookmarked Added!'
                        ], 200);
                    }
                } else {
                    $bookmark = new Bookmark();
                    $bookmark->category_id = $request->catid;
                    $bookmark->user_id = Auth::user()->id;
                    $bookmark->bookmark_type_id = $bookmark_type->id;
                    $bookmark->created_at = Carbon::now();

                    $question = Question::find($request->question_id);

                    if ($question->bookmarks()->save($bookmark)) {
                        return response()->json([
                            'success' => true,
                            'message' => 'Bookmarked Added!'
                        ], 200);
                    }
                }
            } else {
                //dd('find');
                return response()->json([
                    'error' => true,
                    'message' => 'You alredy bookmarked this question!.'
                ]);
            }
        }
    }
    // remove bookmark 
    public function bookmarkRemove($id)
    {
        //dd($id);
        $bookmark = Bookmark::find($id);

        if ($bookmark->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Bookmarked removed successfully'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed !'
            ]);
        }
    }

    // samprotik question bookmark 
    public function samprotikBookmark($id, $category)
    {
        if (!Auth::check()) {
            //dd('unauth');
            return response()->json([
                'error' => true,
                'message' => 'Please login to add bookmark.'
            ]);
        } else {
            $bookmark = SamprotikBookmark::where('question_id', $id)->first();
            //dd($bookmark);
            if ($bookmark) {
                if ($bookmark->user_id == Auth::user()->id) {
                    return response()->json([
                        'error' => true,
                        'message' => 'You alreday bookmarked this question!.'
                    ]);
                } else {
                    //dd('ok');
                    $bookmark = new SamprotikBookmark();
                    $bookmark->question_id = $id;
                    $bookmark->category = $category;
                    $bookmark->user_id = Auth::user()->id;

                    if ($bookmark->save()) {
                        return response()->json([
                            'success' => true,
                            'message' => 'Bookmarked Added!'
                        ], 200);
                    }
                }
            } else {
                //dd('here');
                $bookmark = new SamprotikBookmark();
                $bookmark->question_id = $id;
                $bookmark->category = $category;
                $bookmark->user_id = Auth::user()->id;

                if ($bookmark->save()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Bookmarked Added!'
                    ], 200);
                }
            }
        }
    }
}
