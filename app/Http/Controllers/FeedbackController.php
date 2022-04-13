<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user')->orderBy('id', 'desc')->paginate(10);
        return view('feedback.index', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'feedback' => 'required'
        ]);

        $data['user_id'] = Auth::user()->id;

        Feedback::create($data);
        return redirect()->back()->with('success', 'Thanks for your valuable feedback');
    }

    //like feedback
    public function like($id)
    {
        //dd($id);
        if (Auth::check()) {
            $feedback = Feedback::find($id);

            $vote = Vote::where(['votable_id' => $id, 'votable_type' => 'App\Models\Feedback', 'user_id' => Auth::user()->id])->first();
            if ($vote) {
                return response()->json([
                    'error' => true,
                    'message' => 'you already like this!'
                ]);
            } else {
                $feedback->votes()->create([
                    'user_id' => Auth::user()->id
                ]);

                $feedback->like = $feedback->like + 1;

                if ($feedback->save()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'You liked this Feedback!'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed!.'
                    ]);
                }
            }
        } else {
            return response()->json([
                'error' => true,
                'message' => 'You are unautheticate!.'
            ]);
        }
    }
}
