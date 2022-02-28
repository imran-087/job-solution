<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('admin.auth.passwords.reset_password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        //dd($request->all());
        $updatePassword = DB::table('password_resets')
            ->where([
                'token' => $request->token
            ])
            ->first();
        //DD($updatePassword);
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = Admin::where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['token' => $request->token])->delete();

        Session::flash('success', 'Your password has been changed!');
        return redirect('admin/login');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admins');
    }
}
