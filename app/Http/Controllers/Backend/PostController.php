<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;

class PostController extends Controller
{
    /**
     * Post view
     */
    public function index(){
        $all_data = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.category_en')
            ->orderBy('id', 'desc')->get();
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
            'image' => 'required',
        ]);

        $data = [];
        $data['title_en'] = $request->title_en;
        $data['title_ban'] = $request->title_ban;
        $data['slug_en'] = str_replace(' ', '-', $request->title_en);
        $data['slug_ban'] = str_replace(' ', '-', $request->title_ban);
        $data['user_id'] = Auth::id();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
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


        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_one = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1000, 650)->save('image/postimg/' . $image_one);

            $data['image'] = 'image/postimg/' . $image_one;

            DB::table('posts')->insert($data);

            $notification = [
                'message' => 'Post added successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('posts')->with($notification);

        }else {
            $notification = [
                'message' => 'Please insert image',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }


    }

    /**
     * Post Edit Page
     */
    public function edit($id){
        $data = DB::table('posts')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        $tag = DB::table('tags')->get();
        return view('backend.post.edit', compact('data', 'category', 'district', 'tag'));
    }


    /**
     * Post Update
     */
    public function update(Request $request, $id){

        $data = [];
        $data['title_en'] = $request->title_en;
        $data['title_ban'] = $request->title_ban;
        $data['slug_en'] = str_replace(' ', '-', $request->title_en);
        $data['slug_ban'] = str_replace(' ', '-', $request->title_ban);
        $data['user_id'] = Auth::id();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tag_id'] = $request->tag_id;
        $data['details_en'] = $request->details_en;
        $data['details_ban'] = $request->details_ban;
        $data['headline'] = $request->headline;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;

        $old_image = $request->old_image;

        $image = $request->file('image');
        if($image){

            $image_one = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1000, 650)->save('image/postimg/' . $image_one);

            $data['image'] = 'image/postimg/' . $image_one;

            DB::table('posts')->where('id', $id)->update($data);

            if(file_exists($old_image) && !empty($old_image)){
                unlink($old_image);
            }

            $notification = [
                'message' => 'Post updated successfully',
                'alert-type' => 'info',
            ];

            return redirect()->route('posts')->with($notification);

        }else {

            $data['image'] = $old_image;

            DB::table('posts')->where('id', $id)->update($data);

            $notification = [
                'message' => 'Post updated successfully',
                'alert-type' => 'info',
            ];

            return redirect()->route('posts')->with($notification);
        }

    }

    /**
     * Post Delete
     */
    public function delete($id){
        $data =  DB::table('posts')->where('id', $id)->first();

        if(file_exists($data->image) && !empty($data->image)){
            unlink($data->image);
        }

        DB::table('posts')->where('id', $id)->delete();

        $notification = [
            'message' => 'Post deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('posts')->with($notification);
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
