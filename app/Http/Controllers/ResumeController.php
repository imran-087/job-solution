<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function create(Request $request)
    {
        $resume_info = Resume::where('user_id', Auth::user()->id)->first();
        return view('user.resume', compact('resume_info'));
    }

    public function generalInfoStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:resumes',
            'contact' => 'required|numeric',
            'address' => 'required',
        ]);

        $data['user_id'] = Auth::user()->id;

        Resume::create($data);
        //dd($data);
        return redirect()->back()->with('success', 'Information save successfully')->with('data', $data);
    }

    public function educationalInfoStore(Request $request)
    {
        //dd($request->all());
        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
        }
        $data = $request->validate($valids);;

        Resume::where('user_id', Auth::user()->id)->update($data);
        return redirect()->back()->with('success', 'Information save successfully')->with('data', $data);
    }
}
