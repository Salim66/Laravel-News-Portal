<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ExtraController extends Controller
{
    /**
     * Bangla Language
     */
    public function langBangla(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'bangla');
        return redirect()->back();
    }

    /**
     * English Language
     */
    public function langEnglish(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'english');
        return redirect()->back();
    }

    /**
     * Post View
     */
    public function postView($slug_en){
        $data = DB::table('posts')->where('slug_en', $slug_en)
            ->join('users', 'posts.user_id', 'users.id')
            ->select('posts.*', 'users.name')
            ->first();

        return view('main.details', compact('data'));
    }

    /**
     * Category Wise Post Search
     */
    public function categoryWisePostView($slug_en){
        $category = DB::table('categories')->where('slug_en', $slug_en)->first();
        $all_data = DB::table('posts')->where('category_id', $category->id)->orderBy('id', 'desc')->paginate(10);

        return view('main.category_wise_post', compact('all_data', 'category'));
    }

    /**
     * SubCategory Wise Post Search
     */
    public function subCategoryWisePostView($c_slug_en, $s_slug_en){
        $category = DB::table('categories')->where('slug_en', $c_slug_en)->first();
        $subcategory = DB::table('subcategories')->where('slug_en', $s_slug_en)->first();
        $all_data = DB::table('posts')->where('category_id', $category->id)->where('subcategory_id', $subcategory->id)->orderBy('id', 'desc')->paginate(10);

        return view('main.subcategory_wise_post', compact('all_data', 'category', 'subcategory'));
    }

}
