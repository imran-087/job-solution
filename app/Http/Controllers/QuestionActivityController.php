<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Bookmark;
use App\Models\Question;
use App\Models\BookmarkType;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;

class QuestionActivityController extends Controller
{
    // view question 
    public function viewCount($id)
    {
        $question = Question::find($id);
        $question->view_count = $question->view_count + 1;

        $question->save();
    }

    //like question
    public function vote($id)
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

    public function bookmark($id, $catid)
    {
        //dump($id);
        if (!Auth::check()) {
            //dd('ok');
            return response()->json([
                'error' => true,
                'message' => 'Please login in first.'
            ]);
        } else {
            $bookmark = Bookmark::where('question_id', $id)->first();
            if ($bookmark === null) {
                $bookmark = new Bookmark();
                $bookmark->question_id = $id;
                $bookmark->category_id = $catid;
                $bookmark->user_id = Auth::user()->id;

                if ($bookmark->save()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Bookmarked Added!'
                    ], 200);
                }
            } else {
                if ($bookmark->question_id == $id && $bookmark->user_id == Auth::user()->id) {
                    return response()->json([
                        'error' => true,
                        'message' => 'You alreday bookmarked this question!.'
                    ]);
                }
            }
        }
    }

    //store bookmark
    public function storeBookmark(Request $request)
    {

        //dump($id);
        if (!Auth::check()) {
            //dd('ok');
            return response()->json([
                'error' => true,
                'message' => 'Please login to add a bookmark.'
            ]);
        } else {

            $bookmark = Bookmark::where('question_id', $request->question_id)->first();
            if ($bookmark === null) {

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
                    $bookmark->question_id = $request->question_id;
                    $bookmark->category_id = $request->catid;
                    $bookmark->user_id = Auth::user()->id;
                    $bookmark->bookmark_type_id = $bookmark_type->id;

                    if ($bookmark->save()) {
                        return response()->json([
                            'success' => true,
                            'message' => 'Bookmarked Added!'
                        ], 200);
                    }
                } else {
                    $bookmark = new Bookmark();
                    $bookmark->question_id = $request->question_id;
                    $bookmark->category_id = $request->catid;
                    $bookmark->user_id = Auth::user()->id;
                    $bookmark->bookmark_type_id = $bookmark_type->id;

                    if ($bookmark->save()) {
                        return response()->json([
                            'success' => true,
                            'message' => 'Bookmarked Added!'
                        ], 200);
                    }
                }
            } else {
                if ($bookmark->question_id == $request->question_id && $bookmark->user_id == Auth::user()->id) {
                    return response()->json([
                        'error' => true,
                        'message' => 'You alreday bookmarked this question!.'
                    ]);
                }
            }
        }
    }
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
}
