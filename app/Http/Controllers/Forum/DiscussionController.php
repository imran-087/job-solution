<?php

namespace App\Http\Controllers\Forum;

use Carbon\Carbon;
use App\Models\Reply;
use App\Models\Channel;
use App\Models\Discussion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DiscussionController extends Controller
{
    public function index()
    {
        $channels = Channel::where('status', 'active')->get();
        $discussions = Discussion::with(['user', 'channel'])->orderBy('id', 'desc')->paginate(10);
        return view('discussion.discussion_index', compact(['channels', 'discussions',]));
    }

    //create discussion
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'content' => ['required'],
            'title' => ['required'],
            'channel' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            $discussion = new Discussion();

            $discussion->content = $request->content;
            $discussion->title = $request->title;
            $discussion->channel_id = $request->channel;
            $discussion->slug =  Str::slug($request->title);
            $discussion->user_id =  Auth::user()->id;

            $discussion->created_at = Carbon::now();


            if ($discussion->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Discussion  create successfully!'
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed!.'
                ]);
            }
        }
    }

    //show discussion
    public function show($id)
    {
        $discussion = Discussion::with(['user', 'channel', 'reply'])->where('id', $id)->first();
        $channels = Channel::where('status', 'active')->get();
        $replies = Reply::with('user')->where('discussion_id', $id)->get();
        return view('discussion.single_discussion', compact('discussion', 'channels', 'replies'));
    }

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

        Session::flash('success', 'Reply added');
        return redirect()->back();
    }

    public function bestreply($discussion, $reply)
    {
        $discussion = Discussion::find($discussion);

        $discussion->reply_id = $reply;
        $discussion->save();

        Session::flash('success', 'Marked as best');
        return redirect()->back();
    }

    //chaneel all discussion
    public function channelDiscussion($channel)
    {
        $channels = Channel::where('status', 'active')->get();
        $discussions = Discussion::with(['user', 'channel'])->where('channel_id', $channel)->orderBy('id', 'desc')->paginate(10);
        return view('discussion.discussion_index', compact(['channels', 'discussions']));
    }
}
