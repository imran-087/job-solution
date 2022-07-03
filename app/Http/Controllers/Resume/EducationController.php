<?php

namespace App\Http\Controllers\Resume;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAcademicInfo;
use App\Models\UserEducationDegree;
use App\Models\UserProfessionalCertificate;
use App\Models\UserTranningInfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    public function create()
    {
        return view('resume.education');
    }

    //academicSummaryStore
    public function academicSummaryStore(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'level_of_education' => 'required',
            'degree' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            if (Auth::check()) {
                $academic_info = UserAcademicInfo::create([
                    'user_id' => Auth::id(),
                    'degree_level' => $request->level_of_education,
                    'degree_name' => $request->degree,
                    'major' => $request->major,
                    'institute_name' => $request->institute_name,
                    'board' => $request->board,
                    'result' => $request->result,
                    'marks' => $request->mark,
                    'cgpa' => $request->cgpa,
                    'scale' => $request->scale,
                    'passing_year' => $request->passing_year,
                    'course_duration' => $request->course_duration,
                    'achivement' => $request->achievement,
                ]);

                if ($academic_info) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Training info save successfully'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed !!!'
                    ], 200);
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'unauthenticate user! please, login to complete this action'
                ], 401);
            }
        }

    }

    //trainingSummaryStore
    public function trainingSummaryStore(Request $request)
    {
       
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'training_year' => 'required',
            'institute' => 'required',
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            if (Auth::check()) {
             
                $training_info = UserTranningInfo::Create(
                    [
                        'user_id' => Auth::id(),
                        'training_title' => $request->title,
                        'topic_covered' => $request->topic_covered,
                        'institute' => $request->institute,
                        'duration' => $request->duration,
                        'year' => $request->training_year,
                        'address' => $request->address
                    ]
                );

                if ($training_info) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Training info save successfully'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed !!!'
                    ], 200);
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'unauthenticate user! please, login to complete this action'
                ], 401);
            }
        }

    }

    //professionalSummaryStore
    public function professionalSummaryStore(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'certification' => 'required',
            'start_date' => 'required',
            'institute' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            if (Auth::check()) {

                $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
                $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

                $professional_certificate = UserProfessionalCertificate::Create(
                    [
                        'user_id' => Auth::id(),
                        'certificate_name' => $request->certification,
                        'institute' => $request->institute,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'address' => $request->address
                    ]
                );

                if ($professional_certificate) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Professional certificate info save successfully'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed !!!'
                    ], 200);
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'unauthenticate user! please, login to complete this action'
                ], 401);
            }
        }

    }

    ///getEducationDegree
    public function getEducationDegree(Request $request)
    {
       // dd($request->all());
        $degree = UserEducationDegree::where('level', $request->education_level)->get();
        return response()->json($degree);
    }
}
