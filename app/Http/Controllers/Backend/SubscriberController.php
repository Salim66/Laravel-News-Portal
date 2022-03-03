<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * All Subscriber
     */
    public function allSubscriber(){
        $all_data = DB::table('subscribers')->orderBy('id', 'desc')->get();
        return view('backend.subscriber.index', compact('all_data'));
    }

    /**
     * Delete Subscriber
     */
    public function deleteSubscriber($id){
        DB::table('subscribers')->where('id', $id)->delete();

        $notification = [
            'message' => 'Subscriber deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
