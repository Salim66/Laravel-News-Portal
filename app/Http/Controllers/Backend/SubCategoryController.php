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
        $all_data = DB::table('subcategories')->orderBy('id', 'desc')->get();
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
     * Category Edit Page
     */
    public function edit($id){
        $data = DB::table('categories')->where('id', $id)->first();
        return view('backend.category.edit', compact('data'));
    }


    /**
     * Category Update
     */
    public function update(Request $request, $id){
        $data = [];
        $data['category_en'] = $request->category_en;
        $data['category_ban'] = $request->category_ban;
        DB::table('categories')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Category updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('categories')->with($notification);
    }

    /**
     * Category Delete
     */
    public function delete($id){
        DB::table('categories')->where('id', $id)->delete();

        $notification = [
            'message' => 'Category deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('categories')->with($notification);
    }
}
