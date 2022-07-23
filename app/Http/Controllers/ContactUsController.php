<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\Setting;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $pages = Page::all();
        return view('contact-us', compact('setting', 'pages'));
    }

    public function contactStore(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            $contact = new ContactUs();

            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject =  $request->subject;
            $contact->message =  $request->message;

            $contact->created_at = Carbon::now();

            if ($contact->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Message send! We will contact you soon ......'
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed!.'
                ]);
            }
           
        }
    }
}
