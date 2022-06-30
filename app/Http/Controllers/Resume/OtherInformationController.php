<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherInformationController extends Controller
{
    public function create()
    {
        return view('resume.other_information');
    }

    //skillStore
    public function skillStore(Request $request)
    {
        dd($request->all());
    }

    //descriptionStore
    public function descriptionStore(Request $request)
    {
        dd($request->all());
    }

    //extracaricularStore
    public function extracaricularStore(Request $request)
    {
        dd($request->all());
    }

    //extracaricularStore
    public function languageStore(Request $request)
    {
        dd($request->all());
    }

    //referencesStore
    public function referencesStore(Request $request)
    {
        dd($request->all());
    }
}
