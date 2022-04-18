<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\EditedQuestion;
use App\Models\QuestionOption;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class EditedQuestionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EditedQuestion::where('status', 'pending')->select();


            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->editColumn('user_id', function ($row) {
                    return $row->user->name;
                })

                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="javascript:;" onclick="view(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-warning btn-sm me-1">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="javascript:;" onclick="accept(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-success btn-sm me-1">
                            <i class="fas fa-check"></i>
                        </a>
                        <a href="javascript:;" onclick="deleteQuestion(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'user_id', 'created_at'])
                ->make(true);
        }
        return view('admin.question.edited_question_index');
    }

    //accept question
    public function acceptQuestion(Request $request)
    {
        //dd($request->all());

        $question = Question::where('id', $request->question_id)->update([
            'question' => $request->question,
            'updated_user_id' => $request->user_id,
            'approval_id' => Auth::guard('admin')->user()->id,
        ]);

        $questionOption = QuestionOption::where('question_id', $request->question_id)->update([
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
            'option_5' => $request->option_5,
            'answer' => $request->answer,
            'written_answer' => $request->written_answer,
        ]);

        if ($question && $questionOption) {
            //delete from edited
            $editedQuestion = EditedQuestion::find($request->edited_ques_id);
            if ($editedQuestion->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Question updated successfull'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed!'
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ]);
        }
        //dd('ok');


    }

    //reject question
    public function rejectQuestion($id)
    {
        $question = EditedQuestion::find($id);
        $question->status = 'reject';
        $question->reject_by = Auth::guard('admin')->user()->id;

        if ($question->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Rejected!'
            ], 200);
        }
    }

    //delete
    public function delete($id)
    {
        //dd($id);
        $question = EditedQuestion::find($id);

        if ($question->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Deleted successfully!'
            ], 200);
        }
    }

    //show question
    public function showQuestion($id)
    {
        $editedQuestion = EditedQuestion::find($id);
        //dd($editedQuestion);
        $view = view('admin.question.view_question_modal', compact('editedQuestion'))->render();

        return response([
            'html' => $view
        ]);
    }
}
