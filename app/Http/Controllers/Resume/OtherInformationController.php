<?php

namespace App\Http\Controllers\Resume;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserLanguageProficency;
use App\Models\UserReference;
use App\Models\UserSkill;
use Illuminate\Support\Facades\Auth;
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
            'skill_name' => 'required',
            'learning_method' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        }else{
            if (Auth::check()) {
                $skill = UserSkill::Create(
                    [
                        'user_id' => Auth::id(),
                        'skill' => $request->skill_name,
                        'learning_media' => json_encode($request->learning_method)
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
            }else{
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
                $user_references = UserReference::create([
                    'user_id' => Auth::id(),
                    'name' => $request->name,
                    'designation' => $request->designation,
                    'organization' => $request->organization,
                    'relation' => $request->relation,
                    'mobile' => $request->mobile,
                    'phone_res' => $request->phone_res,
                    'phone_off' => $request->phone_off,
                    'address' => $request->address
                ]);

                if ($user_references) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Language proficency saved successfully'
                    ]);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'Failed !!!'
                    ]);
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'unauthenticate user! please, login to complete this action'
                ], 401);
            }
        }
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
