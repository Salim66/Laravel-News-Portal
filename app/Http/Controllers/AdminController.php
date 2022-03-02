<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    /**
     * Edit Profile
     */
    public function editProfile(){
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        return view('admin.account.edit_profile', compact('data'));
    }

    /**
     * Update Profile
     */
    public function updateProfile(Request $request, $id){

        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['mobile'] = $request->mobile;
        $data['position'] = $request->position;
        $data['gender'] = $request->gender;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $uni_image = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path('upload/user_image/'), $uni_image);
            $data['image'] = 'upload/user_image/'.$uni_image;
            if(file_exists($request->old_image) && !empty($request->old_image)){
                unlink($request->old_image);
            }
        }

        DB::table('users')->where('id', $id)->update($data);

        $notification = [
            'message' => 'User profile updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('account.setting')->with($notification);

    }

    /**
     * Change Password Page
     */
    public function changePassword(){
        return view('admin.account.change_password');
    }

    /**
     * Update Password
     */
    public function updatePassword(Request $request){
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hasPassword = Auth::user()->password;

        if(Hash::check($request->current_password, $hasPassword)){
            $user = User::findOrFail(Auth::id());
            $user->password = Hash::make($request->password);
            $user->update();
            Auth::logout();

            $notification = [
                'message' => 'Password change successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('login')->with($notification);

        }else {

            $notification = [
                'message' => 'Password does not match!',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);

        }

    }
}
