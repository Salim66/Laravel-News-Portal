<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialSettingsController extends Controller
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

}
