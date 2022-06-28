<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Question;
use App\Models\Description;
use Illuminate\Http\Request;
use App\Models\WrittenQuestion;
use App\Models\SamprotikQuestion;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $total_mcq_question = Question::select('id')->count();  
        $total_samprotik_question = SamprotikQuestion::select('id')->count();  
        $total_written_question = WrittenQuestion::select('id')->count(); 

        $total_user = User::select('id')->count();
        $admin_panel_users = Admin::select('id', 'name', 'avatar')->limit(5)->get();
        $today_registerd_user = User::whereDate('created_at', Carbon::today())->count();

        $total_description = Description::select('id')->count();
        

        // dump('MCQ = '.$total_mcq_question); 
        // dump('Samprotik = ' . $total_samprotik_question); 
        // dump('Written = ' . $total_written_question); 
        // dump('User = ' . $total_user); 
        // dump('Admins = ' . $admin_panel_users); 
        // dump('Today registerd = ' . $today_registerd_user); 
        // dump('Description = ' . $total_description); 
        // dd('ok');

        return view('admin.dashboard', compact([
            'total_mcq_question', 'total_samprotik_question',
            'total_written_question', 'total_user', 'admin_panel_users',
            'today_registerd_user', 'total_description'
        ]));
    }
}
