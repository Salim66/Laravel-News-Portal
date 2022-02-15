<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
            'tag_en' => 'required|unique:tags|max:255',
            'tag_ban' => 'required|unique:tags|max:255',
        ]);

        $data = [];
        $data['tag_en'] = $request->tag_en;
        $data['tag_ban'] = $request->tag_ban;
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
}
