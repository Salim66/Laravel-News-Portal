<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Social Settings Edit
     */
    public function socialSetting(){
        $data = DB::table('socials')->first();
        return view('backend.setting.social', compact('data'));
    }

    /**
     * Social Settings Update
     */
    public function socialSettingUpdate(Request $request, $id){
        $data = [];
        $data['facebook'] = $request->facebook;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        DB::table('socials')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Social setting updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }


    /**
     * Seo Settings Edit
     */
    public function seoSetting(){
        $data = DB::table('seos')->first();
        return view('backend.setting.seo', compact('data'));
    }

    /**
     * Seo Settings Update
     */
    public function seoSettingUpdate(Request $request, $id){
        $data = [];
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;
        DB::table('seos')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Seo setting updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }


    /**
     * Prayer Settings Edit
     */
    public function prayerSetting(){
        $data = DB::table('prayers')->first();
        return view('backend.setting.prayer', compact('data'));
    }

    /**
     * Prayer Settings Update
     */
    public function prayerSettingUpdate(Request $request, $id){
        $data = [];
        $data['fojr'] = $request->fojr;
        $data['johor'] = $request->johor;
        $data['asor'] = $request->asor;
        $data['magrib'] = $request->magrib;
        $data['eaha'] = $request->eaha;
        $data['jummah'] = $request->jummah;
        DB::table('prayers')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Prayer setting updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }


    /**
     * LiveTv Settings Edit
     */
    public function livetvSetting(){
        $data = DB::table('livetvs')->first();
        return view('backend.setting.livetv', compact('data'));
    }

    /**
     * LiveTv Settings Update
     */
    public function livetvSettingUpdate(Request $request, $id){
        $data = [];
        $data['embed_code'] = $request->embed_code;
        DB::table('livetvs')->where('id', $id)->update($data);

        $notification = [
            'message' => 'LiveTV setting updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Live Tv active
     */
    public function livetvActive($id){
        DB::table('livetvs')->where('id', $id)->update(['status' => 1]);
        $notification = [
            'message' => 'LiveTV active successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Live Tv DeActive
     */
    public function livetvDeactive($id){
        DB::table('livetvs')->where('id', $id)->update(['status' => 0]);
        $notification = [
            'message' => 'LiveTV DeActive successfully',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }


    /**
     * Notice Settings Edit
     */
    public function noticeSetting(){
        $data = DB::table('notices')->first();
        return view('backend.setting.notice', compact('data'));
    }

    /**
     * Notice Settings Update
     */
    public function noticeSettingUpdate(Request $request, $id){
        $data = [];
        $data['notice_en'] = $request->notice_en;
        $data['notice_ban'] = $request->notice_ban;
        DB::table('notices')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Notice setting updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Notice Tv active
     */
    public function noticeActive($id){
        DB::table('notices')->where('id', $id)->update(['status' => 1]);
        $notification = [
            'message' => 'Notice active successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Notice Tv DeActive
     */
    public function noticeDeactive($id){
        DB::table('notices')->where('id', $id)->update(['status' => 0]);
        $notification = [
            'message' => 'Notice DeActive successfully',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }







    ////////////// Websites //////////////
    /**
     * Website view
     */
    public function index(){
        $all_data = DB::table('websites')->orderBy('id', 'desc')->get();
        return view('backend.website.index', compact('all_data'));
    }

    /**
     * Website create page
     */
    public function create(){
        return view('backend.website.create');
    }

    /**
     * Website Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'website_name' => 'required',
            'website_link' => 'required',
        ]);

        $data = [];
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->insert($data);

        $notification = [
            'message' => 'Website added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('websites')->with($notification);
    }

    /**
     * Website Edit Page
     */
    public function edit($id){
        $data = DB::table('websites')->where('id', $id)->first();
        return view('backend.website.edit', compact('data'));
    }


    /**
     * Website Update
     */
    public function update(Request $request, $id){
        $data = [];
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->where('id', $id)->update($data);

        $notification = [
            'message' => 'Website updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('websites')->with($notification);
    }

    /**
     * Website Delete
     */
    public function delete($id){
        DB::table('websites')->where('id', $id)->delete();

        $notification = [
            'message' => 'Website deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('websites')->with($notification);
    }
}
