<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    /**
     * Social Settings Edit
     */
    public function socialSetting(){
        $data = DB::table('socials')->first();
        return view('backend.setting.social', compact('data'));
    }

    /**
     * Social Settings Update
     */
    public function socialSettingUpdate(Request $request, $id){
        $data = [];
        $data['facebook'] = $request->facebook;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        DB::table('socials')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Social setting updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }


    /**
     * Seo Settings Edit
     */
    public function seoSetting(){
        $data = DB::table('seos')->first();
        return view('backend.setting.seo', compact('data'));
    }

    /**
     * Seo Settings Update
     */
    public function seoSettingUpdate(Request $request, $id){
        $data = [];
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;
        DB::table('seos')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Seo setting updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }


    /**
     * Prayer Settings Edit
     */
    public function prayerSetting(){
        $data = DB::table('prayers')->first();
        return view('backend.setting.prayer', compact('data'));
    }

    /**
     * Prayer Settings Update
     */
    public function prayerSettingUpdate(Request $request, $id){
        $data = [];
        $data['fojr'] = $request->fojr;
        $data['johor'] = $request->johor;
        $data['asor'] = $request->asor;
        $data['magrib'] = $request->magrib;
        $data['eaha'] = $request->eaha;
        $data['jummah'] = $request->jummah;
        DB::table('prayers')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Prayer setting updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }


    /**
     * LiveTv Settings Edit
     */
    public function livetvSetting(){
        $data = DB::table('livetvs')->first();
        return view('backend.setting.livetv', compact('data'));
    }

    /**
     * LiveTv Settings Update
     */
    public function livetvSettingUpdate(Request $request, $id){
        $data = [];
        $data['embed_code'] = $request->embed_code;
        DB::table('livetvs')->where('id', $id)->update($data);

        $notification = [
            'message' => 'LiveTV setting updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }
}
