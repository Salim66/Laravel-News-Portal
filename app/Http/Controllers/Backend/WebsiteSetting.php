<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WebsiteSetting extends Controller
{
    /**
     * Website Setting
     */
    public function websiteSetting(){
        $data = DB::table('websitesettings')->first();
        return view('backend.setting.website', compact('data'));
    }
}
