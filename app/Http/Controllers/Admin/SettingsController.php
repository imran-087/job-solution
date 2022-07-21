<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function storeorupdate(Request $request)
    {
        //dd($request->all());

        $social_link = [
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube
        ];

        if (isset($request->id) &&  $setting = Setting::find($request->id)) { //update

            $setting->company_name = $request->name;
            $setting->title = $request->title;
            $setting->motto = $request->motto;
            $setting->email = $request->email;
            $setting->phone = $request->phone;
            $setting->copyright = $request->copyright;
            $setting->description = $request->description;
            $setting->website = $request->website;
            $setting->social_link = $social_link;
            $setting->playstore_link = $request->playstore;

            //logo upload
            if ($request->file('logo')) {

                //logo
                $logo = $request->file('logo');
                $logo_name = time() . '.' . $logo->getClientOriginalExtension();

                $destinationPath = \public_path('/uploads/company/');

                //resize logo
                $imgFile = Image::make($logo->getRealPath());
                $imgFile->resize(200, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $logo_name, 80);


                //unlink old logo
                // $photo_path = \base_path() . '/public' . $user->avatar;
                // //dd($photo_path);
                // if (File::exists($photo_path)) {
                //     unlink($photo_path);
                // }

                $setting->logo = '/uploads/company/' . $logo_name;
                
            }

            if($setting->update()){
                return redirect()->back()->with('success', 'Settings updated successfully');
            }
        }else{

            $setting = new Setting();

            $setting->company_name = $request->name;
            $setting->title = $request->title;
            $setting->motto = $request->motto;
            $setting->email = $request->email;
            $setting->phone = $request->phone;
            $setting->copyright = $request->copyright;
            $setting->description = $request->description;
            $setting->website = $request->website;
            $setting->social_link = $social_link;
            $setting->playstore_link = $request->playstore;

            //logo upload
            if ($request->file('logo')) {

                //logo
                $logo = $request->file('logo');
                $logo_name = time() . '.' . $logo->getClientOriginalExtension();

                $destinationPath = \public_path('/uploads/company/');

                //resize logo
                $imgFile = Image::make($logo->getRealPath());
                $imgFile->resize(200, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $logo_name, 80);


                //unlink old logo
                // $photo_path = \base_path() . '/public' . $user->avatar;
                // //dd($photo_path);
                // if (File::exists($photo_path)) {
                //     unlink($photo_path);
                // }

                $setting->logo = '/uploads/company/' . $logo_name;
            }

            if ($setting->save()) {
                return redirect()->back()->with('success', 'Settings save successfully');
            }
        }

    }
}
