<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Models\SamprotikBookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function getBookmark($id)
    {
        $bookmarks = Bookmark::with(['question'])->where('user_id', Auth::user()->id)
            ->paginate(5);
        //dd($bookmarks);
        return view('user.bookmark_question', compact('bookmarks'));
    }
    public function getSamprotikBookmark($id)
    {
        $bookmarks = SamprotikBookmark::with(['samprotik_ques'])->where('user_id', Auth::user()->id)
            ->paginate(5);
        //dd($bookmarks);
        return view('user.samprotik_bookmark_question', compact('bookmarks'));
    }

    public function getBookmarkByCategory($user, $category)
    {
        $bookmarks = Bookmark::with(['question'])
            ->where(['user_id' => Auth::user()->id, 'category_id' => $category])
            ->paginate(5);
        //dd($bookmarks);
        return view('user.bookmark_question', compact('bookmarks'));
    }

    public function getBookmarkByType(Request $request)
    {
        $bookmarks = Bookmark::with(['question'])
            ->where(['user_id' => Auth::user()->id, 'bookmark_type_id' => $request->type_id])
            ->paginate();

        return view('user.bookmark_question', compact('bookmarks'));
    }
}
