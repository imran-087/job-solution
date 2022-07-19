<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters, email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            $newslatter = Newsletter::create([
                'email' => $request->email
            ]);

            if($newslatter){
                return response()->json([
                    'success' => true,
                    'message' => 'Subscribed'
                ]);
            }
        }
    }
}
