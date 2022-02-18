<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Post view
     */
    public function index(){
        $all_data = DB::table('posts')->orderBy('id', 'desc')->get();
        return view('backend.post.index', compact('all_data'));
    }

    /**
     * Post create page
     */
    public function create(){
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        $tag = DB::table('tags')->get();
        return view('backend.post.create', compact('category', 'district', 'tag'));
    }

    /**
     * Post Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'title_en' => 'required',
            'title_ban' => 'required',
        ]);

        $data = [];
        $data['title_en'] = $request->title_en;
        $data['title_ban'] = $request->title_ban;
        $data['user_id'] = Auth::id();
        $data['categroy_id'] = $request->categroy_id;
        $data['subcategroy_id'] = $request->subcategroy_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tag_id'] = $request->tag_id;
        $data['details_en'] = $request->details_en;
        $data['details_ban'] = $request->details_ban;
        $data['headline'] = $request->headline;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date('F');

        DB::table('tags')->insert($data);

        $notification = [
            'message' => 'Tag added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('tags')->with($notification);
    }

    /**
     * Post Edit Page
     */
    public function edit($id){
        $data = DB::table('tags')->where('id', $id)->first();
        return view('backend.tag.edit', compact('data'));
    }


    /**
     * Post Update
     */
    public function update(Request $request, $id){
        $data = [];
        $data['tag_en'] = $request->tag_en;
        $data['tag_ban'] = $request->tag_ban;
        DB::table('tags')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Tag updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('tags')->with($notification);
    }

    /**
     * Post Delete
     */
    public function delete($id){
        DB::table('tags')->where('id', $id)->delete();

        $notification = [
            'message' => 'Tag deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('tags')->with($notification);
    }


    /**
     * Get SubCategroy By Ajax
     */
    public function getSubCategory($category_id){
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response()->json($sub);
    }


    /**
     * Get SubDistrict By Ajax
     */
    public function getSubDistrict($district_id){
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }

}
