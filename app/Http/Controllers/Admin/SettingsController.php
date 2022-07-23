<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\File;

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

        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        $social_link = [
            'facebook' => $request->facebook ?? '',
            'instagram' => $request->instagram ?? '',
            'youtube' => $request->youtube ?? '',
            'dribble' => $request->dribble ?? '',
            'twitter' => $request->twitter ?? ''
        ];

        $website = [
            'website_1' => $request->website_1 ?? '',
            'website_2' => $request->website_2 ?? '',
            'website_3' => $request->website_3 ?? ''
        ];

        if (isset($request->id) &&  $setting = Setting::find($request->id)) { //update

            $setting->company_name = $request->name;
            $setting->title = $request->title;
            $setting->motto = $request->motto;
            $setting->email = $request->email;
            $setting->phone = $request->phone;
            $setting->copyright = $request->copyright;
            $setting->description = $request->description;
            $setting->website = $website;
            $setting->social_link = $social_link;
            $setting->playstore_link = $request->playstore;
            $setting->address = $request->address;

            //logo upload
            if ($request->file('logo')) {

                //logo
                $logo = $request->file('logo');
                $logo_name = time() . '.' . $logo->getClientOriginalExtension();

                $destinationPath = \public_path('/uploads/company/');

                //resize logo
                $imgFile = Image::make($logo->getRealPath());
                $imgFile->resize(300, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $logo_name, 80);


                //unlink old logo
                $photo_path = \base_path() . '/public' . $setting->logo;
                //dd($photo_path);
                if (\File::exists($photo_path)) {
                    unlink($photo_path);
                }

                $setting->logo = '/uploads/company/' . $logo_name;
                
            }

            //Header logo upload
            if ($request->file('header_logo')) {

                //logo
                $header_logo = $request->file('header_logo');
                $header_logo_name = time() . '.' . $header_logo->getClientOriginalExtension();

                $destinationPath = \public_path('/uploads/company/');

                //resize logo
                $imgFile = Image::make($header_logo->getRealPath());
                $imgFile->resize(300, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $header_logo_name, 80);

                //unlink old logo
                $photo_path = \base_path() . '/public' . $setting->header_logo;
                //dd($photo_path);
                if (\File::exists($photo_path)) {
                    unlink($photo_path);
                }

                $setting->header_logo = '/uploads/company/' . $header_logo_name;
                
            }
            //footer_logo upload
            if ($request->file('footer_logo')) {

                //logo
                $logo = $request->file('footer_logo');
                $logo_name = time() . '.' . $logo->getClientOriginalExtension();

                $destinationPath = \public_path('/uploads/company/');

                //resize logo
                $imgFile = Image::make($logo->getRealPath());
                $imgFile->resize(300, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $logo_name, 80);


                //unlink old logo
                $photo_path = \base_path() . '/public' . $setting->footer_logo;
                //dd($photo_path);
                if (\File::exists($photo_path)) {
                    unlink($photo_path);
                }

                $setting->footer_logo = '/uploads/company/' . $logo_name;
                
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
            $setting->website = $website;
            $setting->social_link = $social_link;
            $setting->playstore_link = $request->playstore;
            $setting->address = $request->address;

            //logo upload
            if ($request->file('logo')) {

                //logo
                $logo = $request->file('logo');
                $logo_name = time() . '.' . $logo->getClientOriginalExtension();

                $destinationPath = \public_path('/uploads/company/');

                //resize logo
                $imgFile = Image::make($logo->getRealPath());
                $imgFile->resize(300, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $logo_name, 80);


                $setting->logo = '/uploads/company/' . $logo_name;
            }

            //header logo upload
            if ($request->file('header_logo')) {

                //logo
                $logo = $request->file('header_logo');
                $logo_name = time() . '.' . $logo->getClientOriginalExtension();

                $destinationPath = \public_path('/uploads/company/');

                //resize logo
                $imgFile = Image::make($logo->getRealPath());
                $imgFile->resize(300, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $logo_name, 80);


                $setting->logo = '/uploads/company/' . $logo_name;
            }

            //footer logo upload
            if ($request->file('footer_logo')) {

                //logo
                $logo = $request->file('footer_logo');
                $logo_name = time() . '.' . $logo->getClientOriginalExtension();

                $destinationPath = \public_path('/uploads/company/');

                //resize logo
                $imgFile = Image::make($logo->getRealPath());
                $imgFile->resize(300, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $logo_name, 80);


                $setting->logo = '/uploads/company/' . $logo_name;
            }

            if ($setting->save()) {
                return redirect()->back()->with('success', 'Settings save successfully');
            }
        }

    }
}
