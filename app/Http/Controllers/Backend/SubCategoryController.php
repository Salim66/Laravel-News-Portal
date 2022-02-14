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
     * Categroy create page
     */
    public function create(){
        return view('backend.category.create');
    }

    /**
     * Cateogry Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'category_en' => 'required|unique:categories|max:255',
            'category_ban' => 'required|unique:categories|max:255',
        ]);

        $data = [];
        $data['category_en'] = $request->category_en;
        $data['category_ban'] = $request->category_ban;
        DB::table('categories')->insert($data);

        $notification = [
            'message' => 'Category added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('categories')->with($notification);
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
