<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Bookmark;
use App\Models\Question;
use App\Models\SubCategory;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('question_option')->paginate(10);

        $main_categories = MainCategory::all();

        return view('question.all_question', compact(['questions', 'main_categories']));
    }

    public function vote($id)
    {
        $question = Question::find($id);
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

    public function bookmark($id)
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

    //subject wise question
    public function subjectWiseQuestion($main_category, $category, $sub_category, $subject)
    {
        // dump($main_category);
        // dump($category);
        // dump($sub_category);
        // dump($subject);
        $sub_category = SubCategory::where('slug', $sub_category)->first();
        $subject = Subject::where('slug', $subject)->first();
        $questions  = Question::where(['subject_id' => $subject->id, 'sub_category_id' => $sub_category->id])
            ->with('question_option', 'subject', 'sub_category', 'descriptions')->paginate(2);

        //dd($questions);
        return view('question.subject_wise_question', compact('questions'));
    }
}
