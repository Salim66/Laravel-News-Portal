<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * SubCategory view
     */
    public function index(){
        $all_data = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_en', 'categories.category_ban')
            ->orderBy('id', 'desc')->get();
        return view('backend.subcategory.index', compact('all_data'));
    }

    /**
     * SubCategroy create page
     */
    public function create(){
        $category = DB::table('categories')->get();
        return view('backend.subcategory.create', compact('category'));
    }

    /**
     * SubCateogry Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_ban' => 'required|unique:subcategories|max:255',
            'category_id' => 'required',
        ]);

        $data = [];
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_ban'] = $request->subcategory_ban;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->insert($data);

        $notification = [
            'message' => 'SubCategory added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('subcategories')->with($notification);
    }

    /**
     * SubCategory Edit Page
     */
    public function edit($id){
        $data = DB::table('subcategories')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        return view('backend.subcategory.edit', compact('data', 'category'));
    }


    /**
     * SubCategory Update
     */
    public function update(Request $request, $id){
        $data = [];
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_ban'] = $request->subcategory_ban;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->where('id', $id)->update($data);

        $notification = [
            'message' => 'SubCategory updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('subcategories')->with($notification);
    }

    /**
     * Category Delete
     */
    public function delete($id){
        DB::table('subcategories')->where('id', $id)->delete();

        $notification = [
            'message' => 'SubCategory deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('subcategories')->with($notification);
    }
}
