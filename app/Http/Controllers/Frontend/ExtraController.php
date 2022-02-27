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

}
