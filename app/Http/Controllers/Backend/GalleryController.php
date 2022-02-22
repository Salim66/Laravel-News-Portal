<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
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
    public function store(Request $request){
        $this->validate($request, [
            'photo' => 'required',
            'title_en' => 'required',
            'title_ban' => 'required',
        ]);

        $data = [];
        $data['title_en'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('title_ban')->insert($data);

        $notification = [
            'message' => 'Website added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('websites')->with($notification);
    }

    /**
     * Website Edit Page
     */
    public function edit($id){
        $data = DB::table('websites')->where('id', $id)->first();
        return view('backend.website.edit', compact('data'));
    }


    /**
     * Website Update
     */
    public function update(Request $request, $id){
        $data = [];
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Website updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('websites')->with($notification);
    }

    /**
     * Website Delete
     */
    public function delete($id){
        DB::table('websites')->where('id', $id)->delete();

        $notification = [
            'message' => 'Website deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('websites')->with($notification);
    }
}
