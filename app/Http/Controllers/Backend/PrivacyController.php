<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PrivacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * All privacy
     */
    public function allPrivacy(){
        $all_data = DB::table('privacies')->orderBy('id', 'desc')->get();
        return view('backend.privacy.index', compact('all_data'));
    }


    /**
     * Add privacy page
     */
    public function addPrivacy(){
        return view('backend.privacy.create');
    }


    /**
     * Store privacy
     */
    public function storePrivacy(Request $request){

        $data = [];
        $data['question_en'] = $request->question_en;
        $data['question_ban'] = $request->question_ban;
        $data['answer_en'] = $request->answer_en;
        $data['answer_ban'] = $request->answer_ban;

        DB::table('privacies')->insert($data);

        $notification = [
            'message' => 'Privacy added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.privacy')->with($notification);
    }

    /**
     * Edit privacy
     */
    public function editPrivacy($id){
        $data = DB::table('privacies')->where('id', $id)->first();
        return view('backend.privacy.edit', compact('data'));
    }

    /**
     * Update privacy
     */
    public function updatePrivacy(Request $request, $id){

        $data = [];
        $data['question_en'] = $request->question_en;
        $data['question_ban'] = $request->question_ban;
        $data['answer_en'] = $request->answer_en;
        $data['answer_ban'] = $request->answer_ban;

        DB::table('privacies')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Privacy updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('all.privacy')->with($notification);

    }

    /**
     * Delete privacy
     */
    public function deletePrivacy($id){
        DB::table('privacies')->where('id', $id)->delete();

        $notification = [
            'message' => 'Privacy deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.privacy')->with($notification);
    }
}
