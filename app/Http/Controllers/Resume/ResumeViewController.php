<?php

namespace App\Http\Controllers\Resume;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResumeViewController extends Controller
{
    public function index()
    {
        $user = User::with([
            'detail', 'career_info', 'academic_infos', 'experiences',
            'language_proficencies', 'professional_certificates', 'references',
            'skills', 'training_infos'
        ])
        ->where('id', Auth::id())->first();
        
        //dd($user);
        return view('resume.index', compact('user'));
    }
}
