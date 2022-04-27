<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reply;

class WrittenQuestionController extends Controller
{
    public function index()
    {
        $main_categories = MainCategory::all();
        $years = Year::all();
        return view('admin.written_ques.index', compact('main_categories', 'years'));
    }

    public function create(Request $request)
    {
        //dd($request->all());

        $number = $request->number;
        $view = view('admin.written_ques.input_layout', compact('number'))->render();

        return response([
            'html' => $view
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
