<?php

namespace App\Http\Controllers\Resume;

use Carbon\Carbon;
use App\Models\UserSkill;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Models\UserReference;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserLanguageProficency;
use Illuminate\Support\Facades\Validator;

class OtherInformationController extends Controller
{
    public function create()
    {
        $user_detail = UserDetail::select('id','skill_description', 'extracurricular')->where('user_id', Auth::id())->first();
        $languages = UserLanguageProficency::where('user_id', Auth::id())->get();
        $references = UserReference::where('user_id', Auth::id())->get();
        $user_skills = UserSkill::where('user_id', Auth::id())->get();

        return view('resume.other_information', compact('user_detail', 'languages', 'references', 'user_skills'));
    }

    //skillStore
    public function skillStore(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'skill_name' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        }else{
            if (Auth::check()) {
                $learning_method = [
                    'self' => $request->self,
                    'job' => $request->job,
                    'education' => $request->education,
                    'training' => $request->training,
                ];

                $skill = UserSkill::create(
                    [
                        'user_id' => Auth::id(),
                        'skill' => $request->skill_name,
                        'learning_media' => $learning_method
                    ]
                );

                if ($skill) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Skill saved successfully'
                    ]);
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

    //descriptionStore
    public function descriptionStore(Request $request)
    {
        //dd($request->all());
        if(Auth::check()){
            $skill_description = UserDetail::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'skill_description' => $request->description
                ]
            );

            if ($skill_description) {
                return response()->json([
                    'success' => true,
                    'message' => 'Skill description saved successfully'
                ]);
            }  else {
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

    //extracaricularStore
    public function extracaricularStore(Request $request)
    {
        //dd($request->all());

        //dd($request->all());
        if (Auth::check()) {
            $extracurricular = UserDetail::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'extracurricular' => $request->extracurricular
                ]
            );

            if ($extracurricular) {
                return response()->json([
                    'success' => true,
                    'message' => 'Extracurrilar activities saved successfully'
                ]);
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

    //extracaricularStore
    public function languageStore(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'language' => 'required',
            'reading' => 'required',
            'writting' => 'required',
            'speaking' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        }else{

            if (Auth::check()) {
                if (isset($request->language_id) &&  $language = UserLanguageProficency::find($request->language_id)) { //update
                    //dd($request->main_category_id);
                    $language->user_id = Auth::id();
                    $language->language = $request->language;
                    $language->reading = $request->reading;
                    $language->writting =  $request->writting;
                    $language->speaking =  $request->speaking;
                  
                    $language->updated_at = Carbon::now();
                   
                    if ($language->update()) {
                        return response()->json([
                            'success' => true,
                            'message' => __('Language updated successfully!')
                        ], 200);
                    } else {
                        return response()->json([
                            'error' => true,
                            'message' => __('Failed!.')
                        ]);
                    }
                } else { //create new language proficency
                    $language_proficency = UserLanguageProficency::create([
                        'user_id' => Auth::id(),
                        'language' => $request->language,
                        'reading' => $request->reading,
                        'writting' => $request->writting,
                        'speaking' => $request->speaking
                    ]);

                    if($language_proficency){
                        return response()->json([
                            'success' => true,
                            'message' => 'Language proficency saved successfully'
                        ]);
                    }else{
                        return response()->json([
                            'error' => true,
                            'message' => 'Failed !!!'
                        ]);
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

    //referencesStore
    public function referencesStore(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {

            if (Auth::check()) {
                if (isset($request->reference_id) &&  $reference = UserReference::find($request->reference_id)) { //update
                    //dd($request->main_category_id);
                    $reference->user_id = Auth::id();
                    $reference->name = $request->name;
                    $reference->designation = $request->designation;
                    $reference->organization =  $request->organization;
                    $reference->relation =  $request->relation;
                    $reference->mobile =  $request->mobile;
                    $reference->email =  $request->email;
                    $reference->phone_res =  $request->phone_res;
                    $reference->phone_off =  $request->phone_off;
                    $reference->address =  $request->address;

                    $reference->updated_at = Carbon::now();

                    if ($reference->update()) {
                        return response()->json([
                            'success' => true,
                            'message' => __('References updated successfully!')
                        ], 200);
                    } else {
                        return response()->json([
                            'error' => true,
                            'message' => __('Failed!.')
                        ]);
                    }
                } else { //create new language proficency
                    $user_references = UserReference::create([
                        'user_id' => Auth::id(),
                        'name' => $request->name,
                        'designation' => $request->designation,
                        'organization' => $request->organization,
                        'relation' => $request->relation,
                        'mobile' => $request->mobile,
                        'email' => $request->email,
                        'phone_res' => $request->phone_res,
                        'phone_off' => $request->phone_off,
                        'address' => $request->address
                    ]);

                    if ($user_references) {
                        return response()->json([
                            'success' => true,
                            'message' => 'User references saved successfully'
                        ]);
                    } else {
                        return response()->json([
                            'error' => true,
                            'message' => 'Failed !!!'
                        ]);
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


    //##### Edit Skill ####//
    public function getSkill(Request $request)
    {
        $skill = UserSkill::find($request->skill_id);
        return response()->json($skill);
    }

    public function skillUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'skill_name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        } else {
            if (Auth::check()) {
                $learning_method = [
                    'self' => $request->self,
                    'job' => $request->job,
                    'education' => $request->education,
                    'training' => $request->training,
                ];

                $skill = UserSkill::where('id', $request->skill_id)->update(
                    [
                        'user_id' => Auth::id(),
                        'skill' => $request->skill_name,
                        'learning_media' => $learning_method
                    ]
                );

                if ($skill) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Skill Updated successfully'
                    ]);
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

    //##### Edit Language ####//
    public function getLanguage(Request $request)
    {
        $language = UserLanguageProficency::find($request->id);
        return response()->json($language);
    }

    //##### Edit References ####//
    public function getReferences(Request $request)
    {
        $reference = UserReference::find($request->id);
        return response()->json($reference);
    }


    //deleteSkill
    public function deleteSkill($id)
    {
        $skill = UserSkill::find($id);

        if($skill->delete()){
            return response()->json([
                'success' => true,
                'message' => 'Skill deleted successfully!'
            ], 200);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ], 200);
        }
   
    }

    //deleteDescription
    public function deleteDescription($id)
    {
       dd($id);
    }

    //deleteExtracurricular
    public function deleteExtracurricular($id)
    {
       dd($id);
    }

    //deleteReference
    public function deleteReference($id)
    {
        $reference = UserReference::find($id);

        if ($reference->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Skill deleted successfully!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ], 200);
        }
    }

    //deleteLanguage
    public function deleteLanguage($id)
    {
        $language = UserLanguageProficency::find($id);

        if ($language->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Skill deleted successfully!'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed!'
            ], 200);
        }
    }
}
