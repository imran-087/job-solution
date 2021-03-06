<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Bookmark;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Models\EditedQuestion;
use App\Models\QuestionDescription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard_index');
    }

    public function profileSettings($id)
    {
        $profile_setting = User::find($id);
        return view('user.profile_settings', compact('profile_setting'));
    }

    public function chnagePassword(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);
        //dd('ok');
        $user = User::find(Auth::user()->id);
        //dd($user);
        if (Hash::check($request->old_password, $user->password)) {
            //dd('ok');

            $user->password = Hash::make($request->new_password);
            $user->save();

            session()->flash('success', 'Password changed');
            return redirect()->back();
        } else {
            session()->flash('error', 'Old Password does not match');
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',

        ]);
        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_type = $request->user_type;
        $user->address = $request->address;

        //image upload
        if ($request->file('avatar')) {

            //image
            $image = $request->file('avatar');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = \public_path('/uploads/avatar');

            //resize image
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(
                200,
                150,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save($destinationPath . $image_name, 80);

            // $image->move($destinationPath, $image_name);

            // unlink old image
            $photo_path = \base_path() . '/public' . $user->avatar;
            if (File::exists($photo_path)) {
                unlink($photo_path);
            }

            $user->avatar = '/uploads/avatar/' . $image_name;
        }

        $user->update();

        Session::flash('success', 'Profile updated successfully');
        return redirect()->back();
    }

    public function userActivity(Request $request)
    {

        $edit_questions = EditedQuestion::where('user_id', $request->user)->orderBy('created_at', 'desc')->limit(5)->get();
        //dd($edit_questions->count());
        $add_descriptions = QuestionDescription::where('created_user_id', $request->user)->orderBy('created_at', 'desc')->limit(5)->get();
        //dd($add_descriptions->count());
        $comments = Comment::where('user_id', $request->user)->orderBy('created_at', 'desc')->limit(5)->get();
        //dd($comments->count());
        $bookmarks = Bookmark::where('user_id', $request->user)->orderBy('created_at', 'desc')->limit(5)->get();
        //dd($bookmarks->count());
        $discussions = Discussion::where('user_id', $request->user)->orderBy('created_at', 'desc')->limit(5)->get();
        // dd($discussions->count());
        $replies = Reply::where('user_id', $request->user)->orderBy('created_at', 'desc')->limit(5)->get();
        //dd($replies->count());

        return view(
            'user.activity',
            compact('edit_questions', 'add_descriptions', 'bookmarks', 'comments', 'discussions', 'replies')
        );
    }
}
