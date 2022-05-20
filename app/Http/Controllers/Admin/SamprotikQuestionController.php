<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SamprotikQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SamprotikQuestionController extends Controller
{
    public function index(Request $request)
    {

        $questions = SamprotikQuestion::where('options', null)->orWhere('answer', '!=', null)->paginate(10);
        if ($request->ajax()) {
            //dd('here');
            $view = view('admin.samprotik.samprotik', compact('questions'))->render();
            return response()->json(['html' => $view]);
        }

        return view('admin.samprotik.index', compact('questions'));
    }

    public function optionFilter(Request $request)
    {
        //dd('here');
        if ($request->has('option')) {
            if ($request->option == 0) {
                $questions = SamprotikQuestion::where('options', null)->orWhere('answer', '!=', null)->paginate(10);
            } else {
                $questions = SamprotikQuestion::where('options', '!=', null)->paginate(10);
            }
            if ($request->ajax()) {
                //dd('here');
                $view = view('admin.samprotik.samprotik', compact('questions'))->render();
                return response()->json(['html' => $view]);
            }
            return view('admin.samprotik.with_option', compact('questions'));
        }
    }

    public function dateFilter(Request $request)
    {
        //dd($request->all());

        switch ($request->value) {
            case ('today'):
                $questions = SamprotikQuestion::whereDate('created_at', Carbon::today())->paginate(10);
                break;

            case ('yesterday'):
                $questions = SamprotikQuestion::whereDate('created_at', Carbon::yesterday())->paginate(10);
                break;

            case ('last_7_days'):
                $questions = SamprotikQuestion::where('created_at', '>=', Carbon::now()->subDays(7))->paginate(10);
                break;

            case ('last_30_days'):
                $questions = SamprotikQuestion::where('created_at', '>=', Carbon::now()->subDays(30))->paginate(10);
                break;

            case ('lastmonth'):
                $questions = SamprotikQuestion::whereBetween(
                    'created_at',
                    [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
                )->paginate(10);
                break;

            case ('thismonth'):
                $questions = SamprotikQuestion::whereMonth('created_at', Carbon::now()->month)->paginate(10);
                break;
        }
        if ($request->ajax()) {
            //dd('here');
            $view = view('admin.samprotik.samprotik', compact('questions'))->render();
            return response()->json(['html' => $view]);
        }
        return view('admin.samprotik.with_option', compact('questions'));

        //custom date  range filter
        // $from = date('Y-m-d H:i:s', strtotime($request->from));
        // $to = date('Y-m-d H:i:s', strtotime($request->to));
        // $questions = SamprotikQuestion::whereBetween('created_at', [$from, $to])->get();
        // //dd($questions);
        // if ($request->ajax()) {
        //     //dd('here');
        //     $view = view('admin.samprotik.samprotik', compact('questions'))->render();
        //     return response()->json(['html' => $view]);
        // }
        // return view('admin.samprotik.byDate', compact('questions'));
    }

    public function categoryFilter(Request $request)
    {
        //dd($request->all());
        switch ($request->category) {
            case ('bn'):
                $questions = SamprotikQuestion::where(['options' => null, 'category' => 'bn'])->orWhere('answer', '!=', null)->paginate(10);
                break;

            case ('in'):
                $questions = SamprotikQuestion::where(['options' => null, 'category' => 'in'])->orWhere('answer', '!=', null)->paginate(10);
                break;

            case ('bn_in'):
                $questions = SamprotikQuestion::where(['options' => null, 'category' => 'bn_in'])->orWhere('answer', '!=', null)->paginate(10);
                break;
        }

        if ($request->ajax()) {
            //dd('here');
            $view = view('admin.samprotik.samprotik', compact('questions'))->render();
            return response()->json(['html' => $view]);
        }
        return view('admin.samprotik.index', compact('questions'));
    }


    public function input()
    {
        return view('admin.samprotik.input');
    }

    public function create(Request $request)
    {
        //dd($request->all());
        $category = $request->category;
        $option = $request->option;
        $number = $request->number;
        $date = $request->date;

        $view = view('admin.samprotik.create', compact('category', 'option', 'number', 'date'))->render();

        return response([
            'html' => $view
        ]);
    }

    public function preview(Request $request)
    {
        $data['myForm'] = $request->all();
        //dd($data);
        return view('admin.samprotik.preview', $data);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'question.*' => ['required'],
            'answer.*' => ['required'],
        ]);
        //dd($request->all());
        foreach ($request->question as $key => $value) {
            if (\strlen($value) > 1) {
                //question save
                $question = new SamprotikQuestion();
                $question->category = $request->category;
                $question->question = $request->question[$key];
                $question->created_user_id = Auth::guard('admin')->user()->id;
                $question->slug = Str::slug($request->question[$key]);
                $question->previous_date = $request->date;

                if ($request->option == '1') {
                    // dump('answer_' . $key);
                    // dd('ok');
                    $data = [
                        'option_1' => $request->option_1[$key],
                        'option_2' => $request->option_2[$key],
                        'option_3' => $request->option_3[$key],
                        'option_4' => $request->option_4[$key],
                        'answer' => $request->answer[$key],

                    ];
                    if ($request->answer[$key] == 1) {
                        $question->answer = $request->option_1[$key];
                    } elseif ($request->answer[$key] == 2) {
                        $question->answer = $request->option_2[$key];
                    } elseif ($request->answer[$key] == 3) {
                        $question->answer = $request->option_3[$key];
                    } elseif ($request->answer[$key] == 4) {
                        $question->answer = $request->option_4[$key];
                    }
                    //dd($data);
                    $question->options = $data;
                } else {
                    $question->answer = $request->answer[$key];
                }
                // }

                $question->save();
            }
        }
        return redirect()->route('admin.samprotik.index')->with('success', 'Question Created Successfully');
    }

    public function edit(Request $request)
    {
        $question = SamprotikQuestion::find($request->id);
        return view('admin.samprotik.edit', compact('question'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $question = SamprotikQuestion::find($request->id);
        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->category = $request->category;
        $question->previous_date = $request->date;
        $data = [
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
            'answer' => $request->answer_option,
        ];
        //dd($data);
        $question->options = ($data);
        if ($question->save()) {
            return redirect()->route('admin.samprotik.index')->with('success', 'Updted Successfully');
        }
    }
}
