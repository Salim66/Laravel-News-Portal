<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * All Contact
     */
    public function allContacts(){
        $all_data = DB::table('contacts')->orderBy('id', 'desc')->get();
        return view('backend.contact.index', compact('all_data'));
    }

    /**
     * Delete Contact
     */
    public function deleteContact($id){
        DB::table('contacts')->where('id', $id)->delete();

        $notification = [
            'message' => 'Contact deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
