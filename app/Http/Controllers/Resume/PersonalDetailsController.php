<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalDetailsController extends Controller
{
    public function create()
    {
        return view('resume.personal');
    }

    //personal details store
    public function personalDetailStore(Request $request)
    {
        dd($request->all());
    }

    //address details store
    public function addressDetailStore(Request $request)
    {
        dd($request->all());
    }

    //careerApplicationInfoStore
    public function careerApplicationInfoStore(Request $request)
    {
        dd($request->all());
    }

    //otherReleventInfoStore
    public function otherReleventInfoStore(Request $request)
    {
        dd($request->all());
    }

    //disabilitInfoStore
    public function disabilitInfoStore(Request $request)
    {
        dd($request->all());
    }
}
