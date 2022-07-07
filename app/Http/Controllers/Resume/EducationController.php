<?php

namespace App\Http\Controllers\Resume;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAcademicInfo;
use App\Models\UserEducationDegree;
use App\Models\UserProfessionalCertificate;
use App\Models\UserTrainingInfo;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    public function create()
    {
        $years = Year::select('year')->get();

        $academic_infos = UserAcademicInfo::where('user_id', Auth::id())->get();
        $training_infos = UserTrainingInfo::where('user_id', Auth::id())->get();
        $professional_certificate = UserProfessionalCertificate::where('user_id', Auth::id())->get();

        return view('resume.education', compact('academic_infos','training_infos', 'years', 'professional_certificate'));
    }

    ///getAcademicData
    public function getAcademicData(Request $request)
    {
        //dd($request->id);
        $academy = UserAcademicInfo::find($request->id);
        return response()->json($academy);
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
                if (isset($request->academy_id) &&  $academy = UserAcademicInfo::find($request->academy_id)) { //update
                    //dd($request->main_category_id);
                    $academy->user_id = Auth::id();
                    $academy->degree_level = $request->level_of_education;
                    $academy->degree_name = $request->degree;
                    $academy->major = $request->major;
                    $academy->institute_name = $request->institute_name;
                    $academy->board = $request->board;
                    $academy->result =  $request->result;
                    $academy->marks =  $request->marks;
                    $academy->cgpa =  $request->cgpa;
                    $academy->scale =  $request->scale;
                    $academy->passing_year =  $request->passing_year;
                    $academy->course_duration =  $request->course_duration;
                    $academy->achivement =  $request->achivement;

                    $academy->updated_at = Carbon::now();

                    if ($academy->update()) {
                        return response()->json([
                            'success' => true,
                            'message' => __('Academic info updated successfully!')
                        ], 200);
                    } else {
                        return response()->json([
                            'error' => true,
                            'message' => __('Failed!.')
                        ]);
                    }
                } else { //create new language proficency
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
                            'message' => 'Academic info save successfully'
                        ], 200);
                    } else {
                        return response()->json([
                            'error' => true,
                            'message' => 'Failed !!!'
                        ], 200);
                    }
                } 
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'unauthenticate user! please, login to complete this action'
                ], 401);
            }
        }

    }

    ///getTraninngData
    public function getTrainingData(Request $request)
    {
        //dd($request->id);
        $training = UserTrainingInfo::find($request->id);
        return response()->json($training);
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

                if (isset($request->training_id) &&  $training = UserTrainingInfo::find($request->training_id)) { //update
                    //dd($request->main_category_id);
                    $training->user_id = Auth::id();
                    $training->training_title = $request->title;
                    $training->institute = $request->institute;
                    $training->topic_covered = $request->topic_covered;
                    $training->duration = $request->duration;
                    $training->year = $request->year;
                    $training->address =  $request->address;

                    $training->updated_at = Carbon::now();

                    if ($training->update()) {
                        return response()->json([
                            'success' => true,
                            'message' => __('Training info updated successfully!')
                        ], 200);
                    } else {
                        return response()->json([
                            'error' => true,
                            'message' => __('Failed!.')
                        ]);
                    }
                } else { //create new language proficency
             
                    $training_info = UserTrainingInfo::Create(
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

                if (isset($request->certificate_id) &&  $certificate = UserProfessionalCertificate::find($request->certificate_id)) { //update
                    //dd($request->main_category_id);
                    $certificate->user_id = Auth::id();
                    $certificate->certificate_name = $request->certification;
                    $certificate->institute = $request->institute;
                    $certificate->start_date =  $start_date;
                    $certificate->end_date =  $end_date;
                    $certificate->address =  $request->address;
                   
                    $certificate->updated_at = Carbon::now();

                    if ($certificate->update()) {
                        return response()->json([
                            'success' => true,
                            'message' => __('Professional certificate updated successfully!')
                        ], 200);
                    } else {
                        return response()->json([
                            'error' => true,
                            'message' => __('Failed!.')
                        ]);
                    }
                } else { //create new language proficency

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
                } 
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'unauthenticate user! please, login to complete this action'
                ], 401);
            }
        }

    }

    ///getProfessionalCertificate
    public function getProfessionalCertificate(Request $request)
    {
        //dd($request->id);
        $certificate = UserProfessionalCertificate::find($request->id);
        return response()->json($certificate);
    }

    ///getEducationDegree
    public function getEducationDegree(Request $request)
    {
       // dd($request->all());
        $degree = UserEducationDegree::where('level', $request->education_level)->get();
        return response()->json($degree);
    }


    //deleteAcademy
    public function deleteAcademy($id)
    {
        $academy = UserAcademicInfo::find($id);

        if ($academy->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Academy deleted successfully!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ], 200);
        }
    }

    //deleteTraining
    public function deleteTraining($id)
    {
        $training = UserTrainingInfo::find($id);

        if ($training->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Training deleted successfully!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ], 200);
        }
    }

    //deleteCertificate
    public function deleteCertificate($id)
    {
        $certificate = UserProfessionalCertificate::find($id);

        if ($certificate->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Certificate deleted successfully!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ], 200);
        }
    }
}
