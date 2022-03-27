<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BackendUserController extends Controller
{
    public function index(Request $request)
    {
        //dd('ok');
        if ($request->ajax()) {
            $data = Admin::select();

            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->editColumn('role_id', function ($row) {
                    return $row->role->name;
                })

                ->editColumn('status', function ($row) {
                    if ($row->status == "active") {
                        $btn = '<div class="badge badge-light-success fw-bolder">Active</div>';
                    } else if ($row->status == "deactive") {
                        $btn = '<div class="badge badge-light-danger fw-bolder">Deactive</div>';
                    } else {
                        $btn = '<div class="badge badge-light-warning fw-bolder">Ban</div>';
                    }
                    return $btn;
                })

                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-start flex-shrink-0">
                        <a href="javascript:;" onclick="changeStatus(' . $row->id . ')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black"></path>
                                    <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                       
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'created_at', 'status', 'role_id'])
                ->make(true);
        }

        $roles = Role::all();
        return view('admin.users.backend-user-list', compact('roles'));
    }

    //create new user
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            $user = new Admin();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role;
            $user->created_at = Carbon::now();


            if ($user->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User created successfully!'
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed!.'
                ]);
            }
        }
    }

    public function chnageStatus($id)
    {
        $user = Admin::find($id);

        if ($user->status == 'ban') {
            $user->status = 'active';
        } else {
            $user->status = 'ban';
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User Status has benn chnaged!'
        ], 200);
    }
}
