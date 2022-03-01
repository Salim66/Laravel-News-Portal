<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Image;

class WebsiteSetting extends Controller
{
    /**
     * Website Setting
     */
    public function websiteSetting(){
        $data = DB::table('websitesettings')->first();
        return view('backend.setting.website', compact('data'));
    }

    /**
     * Update Website Setting
     */
    public function updateWebsiteSetting(Request $request, $id){

        $data = [];
        $data['address_en'] = $request->address_en;
        $data['address_ban'] = $request->address_ban;
        $data['email'] = $request->email;
        $data['phone_en'] = $request->phone_en;
        $data['phone_ban'] = $request->phone_ban;
        $data['footer_desc_en'] = $request->footer_desc_en;
        $data['footer_desc_ban'] = $request->footer_desc_ban;


        $old_image = $request->old_logo;

        $image = $request->file('logo');
        if($image){

            $image_one = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(80, 80)->save('image/logo/' . $image_one);

            $data['logo'] = 'image/logo/' . $image_one;

            DB::table('websitesettings')->where('id', $id)->update($data);

            if(file_exists($old_image) && !empty($old_image)){
                unlink($old_image);
            }

            $notification = [
                'message' => 'Website updated successfully',
                'alert-type' => 'info',
            ];

            return redirect()->back()->with($notification);

        }else {

            $data['logo'] = $old_image;

            DB::table('websitesettings')->where('id', $id)->update($data);

            $notification = [
                'message' => 'Website updated successfully',
                'alert-type' => 'info',
            ];

            return redirect()->back()->with($notification);
        }
    }
}
