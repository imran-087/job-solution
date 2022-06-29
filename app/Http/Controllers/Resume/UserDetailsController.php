<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDetailsController extends Controller
{
    public function personal()
    {
        return view('resume.personal');
    }

    public function education()
    {
        return view('resume.education');
    }
}
