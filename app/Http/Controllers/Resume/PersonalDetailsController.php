<?php

namespace App\Http\Controllers\Resume;

use Carbon\Carbon;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserCareerInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PersonalDetailsController extends Controller
{
    public function create()
    {
        $user_detail = UserDetail::where('user_id', Auth::id())->first();
        $career_info = UserCareerInfo::where('user_id', Auth::id())->first();

        return view('resume.personal', compact(['user_detail', 'career_info']));
    }

    //personal details store
    public function personalDetailStore(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'primary_mobile' => 'required',
            'blood_group' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            if(Auth::check()){
                //date formate
                $date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');

                
                $user_detail = UserDetail::updateOrCreate(
                    ['user_id' => Auth::id()],
                    [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'father_name' => $request->father_name,
                    'mother_name' => $request->mother_name,
                    'email' => $request->email,
                    'date_of_birth' => $date_of_birth,
                    'gender' => $request->gender,
                    'religion' => $request->religion,
                    'marital_status' => $request->marital_status,
                    'nationality' => $request->nationality ?? 'bangladeshi',
                    'national_id' => $request->national_id,
                    'passport_no' => $request->passport_no,
                    'passport_issue_date' => $request->passport_issue_date,
                    'primary_mobile' => $request->primary_mobile,
                    'secondary_mobile' => $request->secondary_mobile,
                    'blood_group' => $request->blood_group
                    ]
                );

                if ($user_detail) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Persoal detail save successfully'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed !!!'
                    ], 200);
                }
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'unauthenticate user! please, login to complete this action'
                ], 401);
            }
            
        }

    }

    //address details store
    public function addressDetailStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'p_country' => 'required',
            'p_state' => 'required',
            'p_city' => 'required',
            'p_address' => 'required',
            'country' => [$request->present_permanent == 'same' ? 'nullable' : 'required'],
            'state' => [$request->present_permanent == 'same' ? 'nullable' : 'required'],
            'city' => [$request->present_permanent == 'same' ? 'nullable' : 'required'],
            'address' => [$request->present_permanent == 'same' ? 'nullable' : 'required'],
        ]);

        if($validator->fails()){
             return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        }else{
            $present = [
                'country' => $request->p_country,
                'state' => $request->p_state,
                'city' => $request->p_city,
                'address' => $request->p_address,
            ];

            if($request->present_permanent != 'same'){
                $permanent = [
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'address' => $request->address,
                ];
            }else{
                $permanent = 'sameaspresent';
            }

            if(Auth::check()){
               
                $user_detail = UserDetail::updateOrCreate(
                    ['user_id' => Auth::id()],
                    [
                        'present_address' => $present,
                        'permanent_address' => $permanent ?? 'sameaspresent',
                    ]
                );
                if ($user_detail) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Address save successfully'
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

    //careerApplicationInfoStore
    public function careerApplicationInfoStore(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'career_objective' => 'required',
            'job_level' => 'required',
            'job_nature' => 'required',
            // 'present_salary' => 'numeric',
            // 'expected_salary' => 'numeric'
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            if (Auth::check()) {

                $user_career_info = UserCareerInfo::updateOrCreate(
                    ['user_id' => Auth::id()],
                    [
                        'objective' => $request->career_objective,
                        'present_salary' => $request->present_salary,
                        'expected_salary' => $request->expected_salary,
                        'job_level' => $request->job_level,
                        'job_nature' => $request->job_nature
                    ]
                );
                if ($user_career_info) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Carrer info save successfully'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed !!!'
                    ], 200);
                }
                
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'unauthenticate user! please, login to complete this action'
                ], 401);
            }
        }

    }

    //otherReleventInfoStore
    public function otherReleventInfoStore(Request $request)
    {
        //dd($request->all());
    
        if (Auth::check()) {

            $user_career_info = UserCareerInfo::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'career_summary' => $request->career_summary,
                    'special_qualification' => $request->special_qualification,
                    'keyword' => $request->keyword,
                   
                ]
            );
            if ($user_career_info) {
                return response()->json([
                    'success' => true,
                    'message' => 'Carrer info save successfully'
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

    //disabilitInfoStore
    public function disabilitInfoStore(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'disability_id' => [$request->disability == 'yes' ? 'required' : 'nullable']
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            if (Auth::check()) {

                $user_career_info = UserDetail::updateOrCreate(
                    ['user_id' => Auth::id()],
                    [
                        'disability' => $request->disability ?? 'no',
                        'show_on_resume' => $request->show_on_resume ?? 'no',
                        'disability_id' => $request->disability_id,
                        'disability_see' => $request->see,
                        'disability_hear' => $request->hear,
                        'disability_remember' => $request->remember,
                        'disability_physical' => $request->physical,
                        'disability_communicate' => $request->communicate,
                        'disability_care' => $request->take_care,
                       
                    ]
                );
                if ($user_career_info) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Disability info save successfully'
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
}
