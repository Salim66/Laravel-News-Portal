<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    /**
     * All Writer
     */
    public function allWriter(){
        $all_data = DB::table('users')->where('type', 0)->get();
        return view('backend.role.index', compact('all_data'));
    }


    /**
     * Add Writer page
     */
    public function addWriter(){
        return view('backend.role.create');
    }


    /**
     * Store Writer
     */
    public function storeWriter(Request $request){

        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['tag'] = $request->tag;
        $data['district'] = $request->district;
        $data['post'] = $request->post;
        $data['setting'] = $request->setting;
        $data['website'] = $request->website;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;
        $data['type'] = 0;

        DB::table('users')->insert($data);

        $notification = [
            'message' => 'User added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('add.writer')->with($notification);
    }
}
