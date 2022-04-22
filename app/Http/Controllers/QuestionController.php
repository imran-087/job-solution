<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Admin;
use App\Models\Passage;
use App\Models\Subject;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Question;
use App\Models\SubCategory;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\EditedQuestion;
use App\Models\QuestionOption;
use App\Notifications\EditQuestionNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{

    public function getSubjectWithAllQuestion(Request $request, $category, $sub_category)
    {
        //dump($category);
        //dump($sub_category);
        //dd('ok');
        $category = Category::where('slug', $category)->first();
        $sub_category = SubCategory::where('slug', $sub_category)->first();
        //dd($sub_category);
        if ($sub_category->category->main_category->id == 1) {
            $subjects = Subject::where(['sub_category_id' => 0, 'parent_id' => null])->get();
        } else {
            $subjects = Subject::where(['sub_category_id' => $sub_category->id, 'parent_id' => null])->get();
        }
        if ($request->type == 'written') {
            //dd('here');
            $questions = Question::where(['sub_category_id' => $sub_category->id, 'question_type' => 'written'])->paginate(10);
        } elseif ($request->type == 'passage') {
            //dd('ok');
            $questions = Question::with('passage')->where('sub_category_id', $sub_category->id)
                ->where('passage_id', '!=', '')->paginate(10);
            //dd($questions);
        } elseif ($request->type == 'image') {
            //dd('ok');
            $questions = Question::where(['sub_category_id' => $sub_category->id, 'question_type' => 'image'])
                ->paginate(10);
            //dd($questions);
        } else {
            //dd('not');
            $questions = Question::where(['sub_category_id' => $sub_category->id, 'question_type' => 'mcq'])->paginate(10);
        }


        return view('question.subject_and_question', compact(
            'questions',
            'sub_category',
            'subjects',
            'category'
        ));
    }

    public function getSubjectWiseQuestion($category, $sub_category, $subject)
    {
        //dump($category);
        //dump($sub_category);
        //dd('ok');
        $category = Category::where('slug', $category)->first();
        $sub_category = SubCategory::where('slug', $sub_category)->first();
        $subject = Subject::where('slug', $subject)->first();
        $subjects = Subject::where(['sub_category_id' => $sub_category->id, 'parent_id' => null])->get();
        if ($subjects->count() == 0) {
            $subjects = Subject::where(['sub_category_id' => 0, 'parent_id' => null])->get();
        }
        //dd($subject->id);
        $questions = Question::where(['subject_id' => $subject->id, 'sub_category_id' => $sub_category->id])->paginate(10);

        return view('question.subject_and_question', compact('questions', 'sub_category', 'subjects', 'category'));
    }


    public function edit($id)
    {
        //dd($id);
        $question = Question::find($id);
        //dd($question);
        $question_option = QuestionOption::where('question_id', $id)->first();
        $view = view('question.include.edit_question_modal', compact('question', 'question_option'))->render();

        return response([
            'html' => $view
        ]);
        // $years = Year::all();
        // $passages = Passage::all();
        // $question = Question::find($id);
        // //dd($question->toArray());
        // $question_option = QuestionOption::where('question_id', $id)->first();
        // $sub_category = SubCategory::where('id', $question->sub_category_id)->first();
        // $subjects = Subject::where('sub_category_id', $question->sub_category_id)->get();
        // //dd($question_options->toArray());
        // return view('question.edit_question', compact(['subjects', 'question', 'years', 'passages', 'question_option', 'sub_category']));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        if (!Auth::check()) {
            //dd('unthenticate');
            return response()->json([
                'error' => true,
                'message' => __('To edit a question you have to login')
            ]);
        } else {
            //dd($request->all());
            $question = new EditedQuestion();
            $question->question_id = $request->question_id;
            $question->question = $request->question;
            $question->user_id = Auth::user()->id;

            if ($request->type == 'written') {
                $question->written_answer = $request->written_answer;
            } elseif ($request->type == 'mcq') {
                $question->option_1 = $request->option_1;
                $question->option_2 = $request->option_2;
                $question->option_3 = $request->option_3;
                $question->option_4 = $request->option_4;
                $question->option_5 = $request->option_5;
                $question->answer = $request->answer;
            } elseif ($request->type == 'samprotik') {
                $question->answer = $request->answer;
            }

            if ($question->save()) {
                //notification
                $admin = Admin::where('id', 1)->first();
                // dd($admin);
                $admin->notify(new EditQuestionNotification($question));

                return response()->json([
                    'success' => true,
                    'message' => __('Question update request has been sent! Thanks for helping us...')
                ], 200);
                //dd($question);

            } else {
                return response()->json([
                    'error' => true,
                    'message' => __('Failed!.')
                ]);
            }
        }
    }

    public function singleQuestion(Request $request)
    {
        //dd($id);
        $question = Question::find($request->ques_id);

        $question->view_count = $question->view_count + 1;
        $question->save();

        return view('question.single_question', compact('question'));
    }
}
