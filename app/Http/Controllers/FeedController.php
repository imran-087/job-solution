<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index()
    {
        $feeds = Feed::with('user', 'comments')->orderBy('id', 'desc')->Paginate(1);
        return view('feed.index', compact('feeds'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
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
}
