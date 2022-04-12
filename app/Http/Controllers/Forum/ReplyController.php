<?php

namespace App\Http\Controllers\Forum;

use Carbon\Carbon;
use App\Models\Reply;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReplyController extends Controller
{
    //reply store
    public function reply(Request $request)
    {

        $request->validate([
            'reply' => 'required'
        ]);

        Reply::create([
            'user_id' => Auth::user()->id,
            'discussion_id' => $request->discussion,
            'reply' => $request->reply,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success', 'answer added for this discussion');
        return redirect()->back();
    }

    //mark as best reply
    public function bestreply($discussion, $reply)
    {
        $discussion = Discussion::find($discussion);

        $discussion->reply_id = $reply;
        $discussion->save();

        Session::flash('success', 'Marked as best');
        return redirect()->back();
    }

    //Reply to a answer
    public function replyToAanswer(Request $request)
    {
        $reply = Reply::find($request->reply_id);

        if (Auth::check()) {
            $reply->comments()->create([
                'content' => $request->comment,
                'user_id' => Auth::user()->id
            ]);

            return redirect()->back()->with('success', 'reply added');
        } else {
            return redirect()->back()->with('erroe', 'login first to add a reply');
        }
    }
}
