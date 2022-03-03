<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CommentController extends Controller
{
    /**
     * Comment User Store
     */
    public function commentUserStore(Request $request){
        // return $request->all();
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['type'] = 2;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $uni_image = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path('upload/user_image/'), $uni_image);
            $data['image'] = 'upload/user_image/'.$uni_image;
        }

        DB::table('users')->insert($data);

        $notification = [
            'message' => 'Registation successfull, Please login first!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Comment store
     */
    public function commentStore(Request $request){

        DB::table('comments')->insert([
            'post_id' => $request-> post_id,
            'user_id' => Auth::id(),
            'text'    => $request->text
        ]);

        $notification = [
            'message' => 'Comment added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Show all comments
     */
    public function commentShowAll($id){
        $comment = DB::table('comments')->where('post_id', $id)
            ->join('users', 'comments.user_id', 'users.id')
            ->select('comments.*', 'users.image', 'users.name')
            ->latest()->get();
        $comment_reply = DB::table('comments')->where('comment_id', '!=', null)
            ->join('users', 'comments.user_id', 'users.id')
            ->select('comments.*', 'users.image', 'users.name')
            ->get();

        $auth = Auth::check();

        $route = route("login");
    //    return response()->json($route);
        return response()->json([
            'comment'       => $comment,
            'comment_reply' => $comment_reply,
            'auth'          => $auth,
            'route'          => $route,
        ]);



    }

    /**
     * Reply comment store
     */
    public function commentReplyStore(Request $request){
        Comment::create([
            'post_id'    => $request-> post_id,
            'user_id'    => Auth::id(),
            'comment_id' => $request->comment_id,
            'text'       => $request->text
        ]);

        return response()->json([
            'success' => 'Comment reply successfully'
        ]);
    }
}
