<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feed;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::select('id', 'name')->get();

        if ($request->has('id')) {
            $feeds = Feed::with('user', 'comments', 'category')->where('category_id', $request->id)->orderBy('id', 'desc')->Paginate(5);
        } else {
            $feeds = Feed::with('user', 'comments', 'category')->orderBy('id', 'desc')->Paginate(5);
        }
        //dd($categories);
        return view('feed.index', compact('feeds', 'categories'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $data['user_id'] = Auth::user()->id;

        Feed::create($data);
        return redirect()->back()->with('success', 'Thanks for shareing valuable information');
    }

    public function storeReply(Request $request)
    {
        $request->validate([
            'reply' => 'required'
        ]);

        if (Auth::check()) {
            $feed = Feed::find($request->id);
            $feed->comments()->create([
                'content' => $request->reply,
                'user_id' => Auth::user()->id
            ]);
            return redirect()->back()->with('success', 'Reply added');
        } else {
            return redirect()->back()->with('error', 'to add a comment/reply you have to login');
        }
    }

    //like feed
    public function like($id)
    {
        //dd($id);
        if (Auth::check()) {
            $feed = Feed::find($id);

            $vote = Vote::where(['votable_id' => $id, 'votable_type' => 'App\Models\Feed', 'user_id' => Auth::user()->id])->first();
            if ($vote) {
                return response()->json([
                    'error' => true,
                    'message' => 'you already like this Feed!'
                ]);
            } else {
                $feed->votes()->create([
                    'user_id' => Auth::user()->id
                ]);

                $feed->like = $feed->like + 1;

                if ($feed->save()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'You liked this Feed!'
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
