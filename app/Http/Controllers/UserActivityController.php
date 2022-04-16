<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Models\QuestionDescription;
use Illuminate\Support\Facades\Auth;

class UserActivityController extends Controller
{
    public function description()
    {
        $descriptions = QuestionDescription::with('question')
            ->where('created_user_id', Auth::user()->id)
            ->whereIn('status', ['approve', 'reject', 'pending'])->get();
        //dd($descriptions->count());
        return view('user.activity_details.description_details', compact('descriptions'));
    }

    public function editedQuestion()
    {
        return view('user.activity_details.edited_question_details');
    }

    public function discussion()
    {
        $discussions = Discussion::where('user_id', Auth::id())->get();
        return view('user.activity_details.discussion_details', compact('discussions'));
    }
}
