<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * All terms
     */
    public function allTerms(){
        $all_data = DB::table('terms')->orderBy('id', 'desc')->get();
        return view('backend.terms.index', compact('all_data'));
    }


    /**
     * Add terms page
     */
    public function addTerms(){
        return view('backend.terms.create');
    }


    /**
     * Store terms
     */
    public function storeTerms(Request $request){

        $data = [];
        $data['question_en'] = $request->question_en;
        $data['question_ban'] = $request->question_ban;
        $data['answer_en'] = $request->answer_en;
        $data['answer_ban'] = $request->answer_ban;

        DB::table('terms')->insert($data);

        $notification = [
            'message' => 'Terms added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.terms')->with($notification);
    }

    /**
     * Edit terms
     */
    public function editTerms($id){
        $data = DB::table('terms')->where('id', $id)->first();
        return view('backend.terms.edit', compact('data'));
    }

    /**
     * Update terms
     */
    public function updateTerms(Request $request, $id){

        $data = [];
        $data['question_en'] = $request->question_en;
        $data['question_ban'] = $request->question_ban;
        $data['answer_en'] = $request->answer_en;
        $data['answer_ban'] = $request->answer_ban;

        DB::table('terms')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Terms updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('all.terms')->with($notification);

    }

    /**
     * Delete terms
     */
    public function deleteTerms($id){
        DB::table('terms')->where('id', $id)->delete();

        $notification = [
            'message' => 'Terms deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.terms')->with($notification);
    }
}
