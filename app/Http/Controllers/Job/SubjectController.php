<?php

namespace App\Http\Controllers\Job;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $sub_category = SubCategory::where('id', $request->sub_category)->with(['category' => function ($query) {
            $query->select('id', 'name');
        }])->select('id', 'name', 'category_id')->first();

        $subjects = Question::whereBelongsTo($sub_category)
            ->select('id', 'subject_id', DB::raw('count(*) as total'))
            ->groupBy('subject_id')->with(['subject' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get();
        //dd($subjects);

        return view('job.job_subject', compact('subjects', 'sub_category'));

    }
}
