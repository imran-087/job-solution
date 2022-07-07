<?php

namespace App\Http\Controllers\Resume;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use App\Models\UserExperience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmploymentController extends Controller
{
    public function create()
    {
        $user_detail = UserDetail::select('ba_no', 'number', 'ranks', 'type', 'trade', 'course', 'date_of_commision', 'date_of_retirement')
            ->where('user_id', Auth::id())->first();
        $employment_history = UserExperience::where('user_id', Auth::id())->get();

        return view('resume.employment', compact('user_detail', 'employment_history'));
    }

    ///getEmploymentHistory
    public function getEmploymentHistory(Request $request)
    {
        //dd($request->id);
        $employment = UserExperience::find($request->id);
        return response()->json($employment);
    }


    //employmentHistoryStore
    public function employmentHistoryStore(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            //'end_date' => [ $request->currently_working == 'yes' ? 'nullable' : 'required' ],
            'expertise' => 'required',
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            if (Auth::check()) {

                $from_date = Carbon::parse($request->start_date)->format('Y-m-d');
                $to_date = Carbon::parse($request->end_date)->format('Y-m-d');

                $area_of_expertise = [
                    'expertise' => $request->expertise,
                    'duration' => $request->duration
                ];

                if (isset($request->employment_id) &&  $employment = UserExperience::find($request->employment_id)) { //update
                    //dd($request->main_category_id);
                    $employment->user_id = Auth::id();
                    $employment->company_name = $request->company_name;
                    $employment->company_business = $request->company_business;
                    $employment->designation = $request->designation;
                    $employment->department = $request->department;
                    $employment->responsibilities =  $request->responsibilities;
                    $employment->from_date =  $from_date;
                    $employment->to_date =  $to_date;
                    $employment->area_of_expertise =  $area_of_expertise;
                    $employment->currently_working  =  $request->currently_working ?? 'no';
                    $employment->address =  $request->address;

                    $employment->updated_at = Carbon::now();

                    if ($employment->update()) {
                        return response()->json([
                            'success' => true,
                            'message' => __('Employment info updated successfully!')
                        ], 200);
                    } else {
                        return response()->json([
                            'error' => true,
                            'message' => __('Failed!.')
                        ]);
                    }
                } else { //create new language proficency

                    $user_experience = UserExperience::Create(
                        [
                            'user_id' => Auth::id(),
                            'company_name' => $request->company_name,
                            'company_business' => $request->company_business,
                            'designation' => $request->designation,
                            'department' => $request->department,
                            'responsibilities' => $request->responsibilities,
                            'from_date' => $from_date,
                            'to_date' => $to_date,
                            'area_of_expertise' => $area_of_expertise,
                            'currently_working' => $request->currently_working ?? 'no',
                            'address' => $request->address
                        ]
                    );

                    if ($user_experience) {
                        return response()->json([
                            'success' => true,
                            'message' => 'Experience info save successfully'
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

    //retiredArmyStore
    public function retiredArmyStore(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'ba_no' => 'required',
            'number' => 'required',
            'ranks' => 'required',
            'type' => 'required',
            'arms' => 'required',
            'comission_date' => 'required',
            'retirement_date' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            if (Auth::check()) {

                $retirement_date = Carbon::parse($request->retirement_date)->format('Y-m-d');
                $comission_date = Carbon::parse($request->comission_date)->format('Y-m-d');

                $user_detail = UserDetail::updateOrcreate(
                    ['user_id' => Auth::id()],
                    [
                        'ba_no' => $request->ba_no,
                        'number' => $request->number,
                        'ranks' => $request->ranks,
                        'type' => $request->type,
                        'arms' => $request->arms,
                        'trade' => $request->trade,
                        'course' => $request->course,
                        'date_of_retirement' => $retirement_date,
                        'date_of_commision' => $comission_date,

                    ]
                );
                if ($user_detail) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Experience info save successfully'
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


    //deleteExperience
    public function deleteExperience($id)
    {
        $experience = UserExperience::find($id);

        if ($experience->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Experience deleted successfully!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ], 200);
        }
    }

}
