<?php

namespace App\Http\Controllers\Resume;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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

     // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $user = User::with([
            'detail', 'career_info', 'academic_infos', 'experiences',
            'language_proficencies', 'professional_certificates', 'references',
            'skills', 'training_infos'
        ])
        ->where('id', Auth::id())->first()->toArray();
       
        dd($user);

        $pdf = PDF::loadView('resume.pdf_view', $user);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
