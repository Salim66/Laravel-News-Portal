<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Admin Logout
     */
    public function adminLogout(){

        Auth::logout();
        return redirect()->route('login')->with('success', 'Your are successfully logout :) ');

    }
}
