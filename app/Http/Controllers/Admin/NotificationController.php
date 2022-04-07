<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    //mark as read
    public function markAsRead(Request $request, $id)
    {
        if ($request->ajax()) {
            //dd('here');
            auth()->guard('admin')->user()
                ->unreadNotifications
                ->where('id', $request->id)
                ->markAsRead();

            return response()->json([
                'success' => true,
                'message' => 'Notification mark as read'
            ]);
        } else {
            auth()->guard('admin')->user()
                ->unreadNotifications
                ->where('id', $id)
                ->markAsRead();

            return redirect()->back()->with('success', 'Notification mark as read');
        }
    }
}
