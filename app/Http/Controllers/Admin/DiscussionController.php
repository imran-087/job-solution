<?php

namespace App\Http\Controllers\Admin;

use App\Models\Channel;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DiscussionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Discussion::select();

            //filter
            if (isset($request->status) && $request->status != "all") {
                $data->where('channel_id', $request->status);
            }

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('user_id', function ($row) {
                    return $row->user->name;
                })
                ->editColumn('channel_id', function ($row) {
                    return $row->channel->name;
                })
                ->editColumn('content', function ($row) {
                    return substr($row->content, 0, 200) . '...';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })

                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                            <a href="javascript:;" onclick="deleteDiscussion(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'created_at', 'user_id', 'channel_id', 'content'])
                ->make(true);
        }
        $channels = Channel::all();
        return view('admin.forum.discussion.discussion_index', compact('channels'));
    }
}
