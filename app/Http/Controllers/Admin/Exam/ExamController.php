<?php

namespace App\Http\Controllers\Admin\Exam;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreExamRequest;

class ExamController extends Controller
{
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.exam.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $exam_starting_time = Carbon::parse($request->exam_starting_time)->format('Y-m-d\TH:i');

        $exam = Exam::create([
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'user_id' => Auth::guard('admin')->user()->id,
            'name' => $request->name,
            'examinee_type' => $request->examinee_type,
            'exam_mode' => $request->exam_mode,
            'duration' => $request->duration,
            'number_of_question' => $request->number_of_question,
            'mark' => $request->mark,
            'cut_mark' => $request->cut_mark ?? '0',
            'negative_mark' => $request->negative_mark ?? '0',
            'required_point' => $request->required_point ?? '0',
            'exam_price' => $request->price,
            'discount_price' => $request->discount_price,
            'exam_status' => $request->exam_status,
            'exam_starting_time' => $exam_starting_time,
            'discount_price' => $request->discount_price,
        ]);
        if ($exam) {
            return redirect()->back()->with('success', 'Exam Created');
        } else {
            return redirect()->back()->with('error', 'Failed!');
        }
    }
}
