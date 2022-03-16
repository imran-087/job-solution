<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Passage;
use App\Models\Subject;
use App\Models\Bookmark;
use App\Models\EditedQuestion;
use App\Models\Question;
use App\Models\SubCategory;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function edit($id)
    {
        $years = Year::all();
        $passages = Passage::all();
        $question = Question::find($id);
        //dd($question->toArray());
        $question_option = QuestionOption::where('question_id', $id)->first();
        $sub_category = SubCategory::where('id', $question->sub_category_id)->first();
        $subjects = Subject::where('sub_category_id', $question->sub_category_id)->get();
        //dd($question_options->toArray());
        return view('question.edit_question', compact(['subjects', 'question', 'years', 'passages', 'question_option', 'sub_category']));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $question = EditedQuestion::create([
            'question_id' => $request->id,
            'question' => $request->question,
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
            'option_5' => $request->option_5,
            'answer' => $request->answer,
            'written_answer' => $request->written_answer,
            'user_id' => Auth::user()->id,
        ]);


        if ($question) {
            Session::flash('success', 'Question updated!! Please wait for approval');
            return redirect()->back();
        } else {
            Session::flash('error', 'Somethings Went wrong');
            return redirect()->back();
        }
    }
}
