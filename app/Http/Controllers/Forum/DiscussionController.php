<?php

namespace App\Http\Controllers\Forum;

use Carbon\Carbon;
use App\Models\Channel;
use App\Models\Discussion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DiscussionController extends Controller
{
    public function index()
    {
        $channels = Channel::where('status', 'active')->get();
        return view('discussion.discussion_index', compact('channels'));
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
            $discussion->user_id =  1; //Auth::user()->id

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
}
