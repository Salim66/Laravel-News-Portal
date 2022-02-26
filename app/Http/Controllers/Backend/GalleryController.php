<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Image;

class GalleryController extends Controller
{
    //////////////// Photo Gallery /////////////////
    /**
     * Photo Gallery view
     */
    public function photoGallery(){
        $all_data = DB::table('photos')->orderBy('id', 'desc')->get();
        return view('backend.gallery.photos', compact('all_data'));
    }

    /**
     * Photo create page
     */
    public function addPhotoGallery(){
        return view('backend.gallery.create-photo');
    }

    /**
     * Photo Store
     */
    public function storePhotoGallery(Request $request){
        $this->validate($request, [
            'photo' => 'required',
            'title_en' => 'required',
            'title_ban' => 'required',
            'type' => 'required',
        ]);

        $data = [];
        $data['title_en'] = $request->title_en;
        $data['title_ban'] = $request->title_ban;
        $data['type'] = $request->type;
        $data['post_date'] = date('d-m-Y');


        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $image_one = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1000, 650)->save('image/photogallery/' . $image_one);

            $data['photo'] = 'image/photogallery/' . $image_one;

            DB::table('photos')->insert($data);

            $notification = [
                'message' => 'Photo gallery added successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('photo.gallery')->with($notification);

        }else {
            $notification = [
                'message' => 'Please insert photo',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
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



    //////////////// Video Gallery /////////////////
    /**
     * Video Gallery view
     */
    public function videoGallery(){
        $all_data = DB::table('videos')->orderBy('id', 'desc')->get();
        return view('backend.gallery.videos', compact('all_data'));
    }

    /**
     * Video create page
     */
    public function addVideoGallery(){
        return view('backend.gallery.create-video');
    }

    /**
     * Video Store
     */
    public function storeVideoGallery(Request $request){
        $this->validate($request, [
            'video' => 'required',
            'title_en' => 'required',
            'title_ban' => 'required',
        ]);

        $data = [];
        $data['title_en'] = $request->title_en;
        $data['title_ban'] = $request->title_ban;
        $data['video'] = $request->video;
        $data['post_date'] = date('d-m-Y');


        DB::table('videos')->insert($data);

        $notification = [
            'message' => 'Video gallery added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('video.gallery')->with($notification);

    }

    /**
     * Video Edit Page
     */
    public function editVideoGallery($id){
        $data = DB::table('videos')->where('id', $id)->first();
        return view('backend.gallery.edit_video', compact('data'));
    }


    /**
     * Video Update
     */
    public function updateVideoGallery(Request $request, $id){

        $data = [];
        $data['title_en'] = $request->title_en;
        $data['title_ban'] = $request->title_ban;
        $data['video'] = $request->video;
        $data['post_date'] = date('d-m-Y');

        DB::table('videos')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Video gallery updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('video.gallery')->with($notification);

    }

    /**
     * Video Delete
     */
    public function deleteVideoGallery($id){
        DB::table('videos')->where('id', $id)->delete();

        $notification = [
            'message' => 'Video gallery deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('video.gallery')->with($notification);
    }

}
