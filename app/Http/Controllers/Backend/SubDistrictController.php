<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubDistrictController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * SubDistrict view
     */
    public function index(){
        $all_data = DB::table('subdistricts')
            ->join('districts', 'subdistricts.district_id', 'districts.id')
            ->select('subdistricts.*', 'districts.district_en', 'districts.district_ban')
            ->orderBy('id', 'desc')->get();
        return view('backend.subdistrict.index', compact('all_data'));
    }

    /**
     * SubDistrict create page
     */
    public function create(){
        $district = DB::table('districts')->get();
        return view('backend.subdistrict.create', compact('district'));
    }

    /**
     * SubDistrict Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_ban' => 'required|unique:subdistricts|max:255',
            'district_id' => 'required',
        ]);

        $data = [];
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_ban'] = $request->subdistrict_ban;
        $data['district_id'] = $request->district_id;
        DB::table('subdistricts')->insert($data);

        $notification = [
            'message' => 'SubDistrict added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('subdistricts')->with($notification);
    }

    /**
     * SubDistrict Edit Page
     */
    public function edit($id){
        $data = DB::table('subdistricts')->where('id', $id)->first();
        $district = DB::table('districts')->get();
        return view('backend.subdistrict.edit', compact('data', 'district'));
    }


    /**
     * SubDistrict Update
     */
    public function update(Request $request, $id){
        $data = [];
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_ban'] = $request->subdistrict_ban;
        $data['district_id'] = $request->district_id;
        DB::table('subdistricts')->where('id', $id)->update($data);

        $notification = [
            'message' => 'SubDistrict updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('subdistricts')->with($notification);
    }

    /**
     * SubDistrict Delete
     */
    public function delete($id){
        DB::table('subdistricts')->where('id', $id)->delete();

        $notification = [
            'message' => 'SubDistrict deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('subdistricts')->with($notification);
    }
}
