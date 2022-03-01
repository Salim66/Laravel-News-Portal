<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Add Wirte page
     */
    public function addWriter(){
        return view('backend.role.create');
    }
}
