<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Image;

class AdsController extends Controller
{
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
     * Photo Edit Page
     */
    public function editPhotoGallery($id){
        $data = DB::table('photos')->where('id', $id)->first();
        return view('backend.gallery.edit_photo', compact('data'));
    }


    /**
     * Photo Update
     */
    public function updatePhotoGallery(Request $request, $id){

        $data = [];
        $data['title_en'] = $request->title_en;
        $data['title_ban'] = $request->title_ban;
        $data['type'] = $request->type;
        $data['post_date'] = date('d-m-Y');

        $old_photo = $request->old_photo;

        $image = $request->file('photo');
        if($image){

            $image_one = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1000, 650)->save('image/photogallery/' . $image_one);

            $data['photo'] = 'image/photogallery/' . $image_one;

            DB::table('photos')->where('id', $id)->update($data);

            if(file_exists($old_photo) && !empty($old_photo)){
                unlink($old_photo);
            }

            $notification = [
                'message' => 'Photo gallery updated successfully',
                'alert-type' => 'info',
            ];

            return redirect()->route('photo.gallery')->with($notification);

        }else {

            $data['photo'] = $old_photo;

            DB::table('photos')->where('id', $id)->update($data);

            $notification = [
                'message' => 'Photo gallery updated successfully',
                'alert-type' => 'info',
            ];

            return redirect()->route('photo.gallery')->with($notification);
        }
    }

    /**
     * Photo Delete
     */
    public function deletePhotoGallery($id){
        DB::table('photos')->where('id', $id)->delete();

        $notification = [
            'message' => 'Photo gallery deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('photo.gallery')->with($notification);
    }


}
