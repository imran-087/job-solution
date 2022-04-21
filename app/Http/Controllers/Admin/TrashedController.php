<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuestionDescription;
use Yajra\DataTables\Facades\DataTables;

class TrashedController extends Controller
{
    public function questionTranshed(Request $request)
    {
        if ($request->ajax()) {
            //dd('here');
            $data = Question::onlyTrashed()->select();

            //filter
            if (isset($request->status) && $request->status != "all") {
                $data->where('status', $request->status);
            }

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('deleted_at', function ($row) {
                    return $row->deleted_at->diffForHumans();
                })

                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="javascript:;" onclick="restore(' . $row->id . ')" class="btn  btn-bg-danger text-white btn-sm">
                           Restore
                        </a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action',  'deleted_at',])
                ->make(true);
        }
        //dd('not ok');
        return view('admin.trashed.question_trash');
    }

    //restore question
    public function questionRestore($id)
    {
        $question = Question::withTrashed()->find($id)->restore();

        if ($question) {
            return response()->json([
                'success' => true,
                'message' => 'Item restored'
            ]);
        }
    }

    public function descriptionTranshed(Request $request)
    {
        if ($request->ajax()) {
            //dd('here');
            $data = QuestionDescription::onlyTrashed()->select();

            //filter
            if (isset($request->status) && $request->status != "all") {
                $data->where('status', $request->status);
            }

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('deleted_at', function ($row) {
                    return $row->deleted_at->diffForHumans();
                })
                ->editColumn('question_id', function ($row) {
                    return $row->question->question;
                })

                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="javascript:;" onclick="restore(' . $row->id . ')" class="btn  btn-bg-danger text-white btn-sm">
                           Restore
                        </a>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'deleted_at', 'question_id'])
                ->make(true);
        }
        //dd('not ok');
        return view('admin.trashed.description_trash');
    }

    //restore description
    public function descriptionRestore($id)
    {
        $questionDescription = QuestionDescription::withTrashed()->find($id)->restore();

        if ($questionDescription) {
            return response()->json([
                'success' => true,
                'message' => 'Item restored'
            ]);
        }
    }
}
