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
        //dd($resume_info);
        return view('user.resume.index', compact('resume_info'));
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
        return redirect()->back()->with('success', 'Information save successfully');
    }

    public function educationalInfoStore(Request $request)
    {
        //dd($request->all());
        $general_info = Resume::where('user_id', Auth::user()->id)->first();
        if ($general_info) {
            //dd('here');
            if ($request->academic == 'academic') {
                //dd('here');
                foreach ($request->except('_token', 'academic') as $data => $value) {
                    $valids[$data] = "required";
                }
                //dump($data);
                $data = $request->validate($valids);
                if ($general_info->update($data)) {
                    return redirect()->back()->with('success', 'Academic info updated');
                }
            } elseif ($request->college == 'college') {
                //dd('here');
                foreach ($request->except('_token', 'college') as $data => $value) {
                    $valids[$data] = "required";
                }
                //dump($data);
                $data = $request->validate($valids);
                if ($general_info->update($data)) {
                    return redirect()->back()->with('success', 'College info updated');
                }
            } elseif ($request->versity == 'versity') {
                //dd('here');
                foreach ($request->except('_token', 'versity') as $data => $value) {
                    $valids[$data] = "required";
                }
                //dump($data);
                $data = $request->validate($valids);
                if ($general_info->update($data)) {
                    return redirect()->back()->with('success', 'University info updated');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Fill your general inforamtion first');
        }
    }
}
