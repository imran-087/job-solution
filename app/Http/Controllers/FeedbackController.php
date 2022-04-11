<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user')->get();
        return view('feedback.index', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'feedback' => 'required'
        ]);

        $data['user_id'] = Auth::user()->id;

        Feedback::create($data);
        return redirect()->back()->with('success', 'Thanks for your valuable feedback');
    }
}
