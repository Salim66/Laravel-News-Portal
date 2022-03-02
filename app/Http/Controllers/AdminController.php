<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    /**
     * Account Setting
     */
    public function accountSetting(){
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        return view('admin.account.profile', compact('data'));
    }
}
