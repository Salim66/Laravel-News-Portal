<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tag view
     */
    public function index(){
        $all_data = DB::table('tags')->orderBy('id', 'desc')->get();
        return view('backend.tag.index', compact('all_data'));
    }

    /**
     * Tag create page
     */
    public function create(){
        return view('backend.tag.create');
    }

    /**
     * Tag Store
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
     * Tag Edit Page
     */
    public function edit($id){
        $data = DB::table('tags')->where('id', $id)->first();
        return view('backend.tag.edit', compact('data'));
    }


    /**
     * Tag Update
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
     * Tag Delete
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
