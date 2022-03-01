<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Image;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Add List view
     */
    public function adsList(){
        $all_data = DB::table('ads')->orderBy('id', 'desc')->get();
        return view('backend.ads.ads_list', compact('all_data'));
    }

    /**
     * Ads create page
     */
    public function addAds(){
        return view('backend.ads.create-ads');
    }

    /**
     * Ads Store
     */
    public function storeAds(Request $request){
        $this->validate($request, [
            'link' => 'required',
            'ads' => 'required',
            'type' => 'required',
        ]);

        $data = [];
        $data['link'] = $request->link;

        if($request->type == 2){

            if($request->hasFile('ads')){
                $image = $request->file('ads');
                $image_one = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(736, 90)->save('image/ads/' . $image_one);

                $data['type'] = 2;
                $data['ads'] = 'image/ads/' . $image_one;

                DB::table('ads')->insert($data);

                $notification = [
                    'message' => 'Ads added successfully',
                    'alert-type' => 'success',
                ];

                return redirect()->route('ads.list')->with($notification);

            }else {
                $notification = [
                    'message' => 'Please insert image',
                    'alert-type' => 'error',
                ];

                return redirect()->back()->with($notification);
            }

        }else {

            if($request->hasFile('ads')){
                $image = $request->file('ads');
                $image_one = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(356, 279)->save('image/ads/' . $image_one);

                $data['type'] = 1;
                $data['ads'] = 'image/ads/' . $image_one;

                DB::table('ads')->insert($data);

                $notification = [
                    'message' => 'Ads added successfully',
                    'alert-type' => 'success',
                ];

                return redirect()->route('ads.list')->with($notification);

            }else {
                $notification = [
                    'message' => 'Please insert image',
                    'alert-type' => 'error',
                ];

                return redirect()->back()->with($notification);
            }

        }



    }

    /**
     * Ads Edit Page
     */
    public function editAds($id){
        $data = DB::table('ads')->where('id', $id)->first();
        return view('backend.ads.edit_ads', compact('data'));
    }


    /**
     * Ads Update
     */
    public function updateAds(Request $request, $id){

        $data = [];
        $data['link'] = $request->link;

        $old_image = $request->old_photo;

        if($request->type == 2){

            if($request->hasFile('ads')){
                $image = $request->file('ads');
                $image_one = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(736, 90)->save('image/ads/' . $image_one);

                $data['type'] = 2;
                $data['ads'] = 'image/ads/' . $image_one;

                DB::table('ads')->where('id', $id)->update($data);

                if(file_exists($old_image) && !empty($old_image)){
                    unlink($old_image);
                }

                $notification = [
                    'message' => 'Ads updated successfully',
                    'alert-type' => 'success',
                ];

                return redirect()->route('ads.list')->with($notification);

            }else {
                $data['ads'] = $old_image;

                DB::table('ads')->where('id', $id)->update($data);

                $notification = [
                    'message' => 'Ads updated successfully',
                    'alert-type' => 'info',
                ];

                return redirect()->route('ads.list')->with($notification);
            }

        }else {

            if($request->hasFile('ads')){
                $image = $request->file('ads');
                $image_one = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(356, 279)->save('image/ads/' . $image_one);

                $data['type'] = 1;
                $data['ads'] = 'image/ads/' . $image_one;

                DB::table('ads')->where('id', $id)->update($data);

                if(file_exists($old_image) && !empty($old_image)){
                    unlink($old_image);
                }

                $notification = [
                    'message' => 'Ads updated successfully',
                    'alert-type' => 'success',
                ];

                return redirect()->route('ads.list')->with($notification);

            }else {
                $data['ads'] = $old_image;

                DB::table('ads')->where('id', $id)->update($data);

                $notification = [
                    'message' => 'Ads updated successfully',
                    'alert-type' => 'info',
                ];

                return redirect()->route('ads.list')->with($notification);
            }

        }



    }

    /**
     * Ads Delete
     */
    public function deleteAds($id){
        $data = DB::table('ads')->where('id', $id)->first();

        if(file_exists($data->ads) && !empty($data->ads)){
            unlink($data->ads);
        }

        DB::table('ads')->where('id', $id)->delete();

        $notification = [
            'message' => 'Ads deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('ads.list')->with($notification);
    }


}
