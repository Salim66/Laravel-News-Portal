<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    /**
     * District view
     */
    public function index(){
        $all_data = DB::table('districts')->orderBy('id', 'desc')->get();
        return view('backend.district.index', compact('all_data'));
    }

    /**
     * District create page
     */
    public function create(){
        return view('backend.district.create');
    }

    /**
     * District Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'district_en' => 'required|unique:districts|max:255',
            'district_ban' => 'required|unique:districts|max:255',
        ]);

        $data = [];
        $data['district_en'] = $request->district_en;
        $data['district_ban'] = $request->district_ban;
        DB::table('districts')->insert($data);

        $notification = [
            'message' => 'District added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('districts')->with($notification);
    }

    /**
     * District Edit Page
     */
    public function edit($id){
        $data = DB::table('districts')->where('id', $id)->first();
        return view('backend.district.edit', compact('data'));
    }


    /**
     * District Update
     */
    public function update(Request $request, $id){
        $data = [];
        $data['district_en'] = $request->district_en;
        $data['district_ban'] = $request->district_ban;
        DB::table('districts')->where('id', $id)->update($data);

        $notification = [
            'message' => 'District updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('districts')->with($notification);
    }

    /**
     * District Delete
     */
    public function delete($id){
        DB::table('districts')->where('id', $id)->delete();

        $notification = [
            'message' => 'District deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('districts')->with($notification);
    }
}
