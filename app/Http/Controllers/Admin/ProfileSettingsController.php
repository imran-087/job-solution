<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileSettingsController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function chnagePassword(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);
        //dd('ok');
        $user = Admin::find(Auth::guard('admin')->user()->id);
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
        $user = Admin::find(Auth::guard('admin')->user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        //image upload
        if ($request->file('avatar')) {

            //image
            $image = $request->file('avatar');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = \public_path('/uploads/avatar');
            $image->move($destinationPath, $image_name);


            // unlink old image
            // $photo_path = \base_path() . '/public' . $user->avatar;
            // if (File::exists($photo_path)) {
            //     unlink($photo_path);
            // }

            $user->avatar = '/uploads/avatar/' . $image_name;
        }

        $user->save();

        Session::flash('success', 'Profile updated successfully');
        return redirect()->back();
    }
}
