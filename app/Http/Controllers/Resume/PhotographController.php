<?php

namespace App\Http\Controllers\Resume;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PhotographController extends Controller
{
    public function create()
    {
        $user_avatar = UserDetail::where('user_id', Auth::id())->select('photo_path')->first();
        return view('resume.photograph', compact('user_avatar'));
    }

    // photographStore
    public function photographStore(Request $request)
    {
       //dd($request->all());

        $validator = Validator::make($request->all(), [
            'avatar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            if (Auth::check()) {

                //image upload
                if ($request->file('avatar')) {

                    //image
                    $image = $request->file('avatar');
                    $image_name = time() . '.' . $image->getClientOriginalExtension();

                    $destinationPath = \public_path('/uploads/avatar');

                    //resize image
                    $imgFile = Image::make($image->getRealPath());
                    $imgFile->resize(200, 150, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $image_name, 80);

                    // $image->move($destinationPath, $image_name);
                    //dd($user->avatar);
                    //unlink old image
                    // $photo_path = \base_path() . '/public' . $user->avatar;
                    // //dd($photo_path);
                    // if (File::exists($photo_path)) {
                    //     unlink($photo_path);
                    // }

                    $photograph  = UserDetail::updateOrCreate([
                        'user_id' => Auth::id()
                        ],[
                            'photo_path' => '/uploads/avatar/' . $image_name
                        ]
                    );
                    if($photograph){
                        return response()->json([
                            'success' => true,
                            'message' => 'Photo uploaded'
                        ]);
                    }else{
                        return response()->json([
                            'success' => true,
                            'message' => 'Failed !!'
                        ]);
                    }
                }
            }
        }
    }
    
}
