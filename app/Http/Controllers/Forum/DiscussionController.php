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
    public function index($status = null)
    {

        //dump($status);
        $channels = Channel::where('status', 'active')->get();

        if ($status == 'weekago') {
            $discussions = Discussion::with(['user', 'channel'])
                ->whereBetween(
                    'created_at',
                    [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
                )
                ->orderBy('id', 'desc')
                ->paginate(10);
            //dd($discussions);
        } else if ($status == 'latest') {
            $discussions = Discussion::with(['user', 'channel'])
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else if ($status == 'popular') {
            $discussions = Discussion::with(['user', 'channel'])
                ->orderBy('vote', 'desc')->where('vote', '>', 1)
                ->paginate(10);
        } else {
            $discussions = Discussion::with(['user', 'channel'])
                ->orderBy('id', 'desc')
                ->paginate(10);
        }

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
            if (Auth::check()) {
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
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Please, login to create a new discussion'
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

    // discussion live search
    public function search(Request $request)
    {

        if ($request->ajax()) {

            $data = Discussion::where('title', 'LIKE', '%' . $request->search . '%')
                ->get();

            $output = '';

            if (count($data) > 0) {

                //$output = '<ul class="list-group" style="display: block; position: relative; z-index: 1;">';


                foreach ($data as $row) {
                    $output .= '<div class="d-flex align-items-center mb-5"
                    style="margin:0px 30px 20px 30px; background-color:#F5F8FA; border-radius:5px !important; padding:10px;">
                    <div class="symbol symbol-40px me-4 ">
                    </div>
                                <!--begin::Title-->
                                <div class="d-flex flex-column">
                                    <a href="discussion/' . $row->id . '/show" class="fs-6 text-gray-800 text-hover-primary fw-bold" >' . $row->title . '</a>
                                    <span class="fs-7 text-muted fw-bold ">' . $row->created_at->diffForHumans() . '</span>
                                </div>
                                <!--end::Title-->
                                </div>
                                ';


                    //$output .= '<a href="discussion/' . $row->id . '/show"><li class="list-group-item" style=" border-radious:10px">' . $row->title . '</li></a>';
                }

                //$output .= '</ul>';
            } else {

                $output .= ' <p  class="fs-6 text-800  fw-bold"
                style="color:red; margin:0px 30px 20px 30px; background-color:#F5F8FA; padding:10px; border-radious:30px;"> '
                    . 'No Result' .
                    '</p>';
            }


            return $output;
        }
    }

    //dicussion view count
    public function viewCount($id)
    {
        //dump($id);
        $discussion = Discussion::find($id);
        $discussion->view = $discussion->view + 1;

        $discussion->save();
    }

    //ckeditor image upload
    public function uploadImage(Request $request)
    {
        //image upload
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('discussion-forum/images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('discussion-forum/images/' . $fileName);
            return response()->json([
                'fileName' => $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
    }
}
