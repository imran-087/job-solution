<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SamprotikQuestion;
use App\Http\Controllers\Controller;

class HtmlToImagePdfController extends Controller
{
    public function samprotikToImage()
    {
        $questions = SamprotikQuestion::paginate(16);
        return view('admin.converter.samprotik_to_image', compact('questions'));
    }
}
