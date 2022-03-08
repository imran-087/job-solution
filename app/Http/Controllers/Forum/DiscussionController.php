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
    public function index($status = 'latest')
    {
        //dd($status);
        $channels = Channel::where('status', 'active')->get();
        if ($status == 'weekago') {
            $discussions = Discussion::with(['user', 'channel'])
                ->whereBetween(
                    'created_at',
                    [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
                )
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else if ($status == 'latest') {
            $discussions = Discussion::with(['user', 'channel'])
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else if ($status == 'popular') {
            $discussions = Discussion::with(['user', 'channel'])
                ->orderBy('id', 'desc')->where('vote', '>', 1)
                ->paginate(2);
        } else {
            $discussions = Discussion::with(['user', 'channel'])
                ->orderBy('id', 'desc')
                ->paginate(10);
        }
        //dd($discussions);

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

    //like dicsussion
    public function vote($id)
    {
        $discussion = Discussion::find($id);
        $discussion->vote = $discussion->vote + 1;

        if ($discussion->save()) {
            return response()->json([
                'success' => true,
                'message' => 'You liked this discussion!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!.'
            ]);
        }
    }
    public function search(Request $request)
    {
        // $term = $request->search;
        // $discussions = Discussion::where('title', 'LIKE', "%$term%")->get('title');

        // return response($discussions);

        if ($request->ajax()) {

            $data = Discussion::where('title', 'LIKE', '%' . $request->search . '%')
                ->get();

            $output = '';

            if (count($data) > 0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row) {

                    $output .= '<a href="discussion/' . $row->id . '/show"><li class="list-group-item">' . $row->title . '</li></a>';
                }

                $output .= '</ul>';
            } else {

                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }

            return $output;
        }
    }
}
