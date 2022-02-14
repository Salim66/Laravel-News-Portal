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
}
