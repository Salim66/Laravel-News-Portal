<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Category view
     */
    public function index(){
        $all_data = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('backend.category.index', compact('all_data'));
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

        return redirect()->route('categories')->with('success', 'Category Add Successfully');
    }
}
