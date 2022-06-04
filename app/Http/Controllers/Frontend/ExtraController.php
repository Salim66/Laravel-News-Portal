<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class ExtraController extends Controller
{
    /**
     * Bangla Language
     */
    public function langBangla(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'bangla');
        return redirect()->back();
    }

    /**
     * English Language
     */
    public function langEnglish(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'english');
        return redirect()->back();
    }

    /**
     * Post View
     */
    public function postView($slug_en){
        $data = DB::table('posts')->where('slug_en', $slug_en)
            ->join('users', 'posts.user_id', 'users.id')
            ->select('posts.*', 'users.name')
            ->first();

        return view('main.details', compact('data'));
    }

    /**
     * Category Wise Post Search
     */
    public function categoryWisePostView($slug_en){
        $category = DB::table('categories')->where('slug_en', $slug_en)->first();
        $all_data = DB::table('posts')->where('category_id', $category->id)->orderBy('id', 'desc')->paginate(10);

        return view('main.category_wise_post', compact('all_data', 'category'));
    }

    /**
     * User Wise Post Search
     */
    public function userWisePost($user_id){
        $user = DB::table('users')->where('id', $user_id)->first();
        $all_data = DB::table('posts')->where('user_id', $user->id)->orderBy('id', 'desc')->paginate(10);

        return view('main.user_wise_post', compact('all_data', 'user'));
    }

    /**
     * SubCategory Wise Post Search
     */
    public function subCategoryWisePostView($c_slug_en, $s_slug_en){
        $category = DB::table('categories')->where('slug_en', $c_slug_en)->first();
        $subcategory = DB::table('subcategories')->where('slug_en', $s_slug_en)->first();
        $all_data = DB::table('posts')->where('category_id', $category->id)->where('subcategory_id', $subcategory->id)->orderBy('id', 'desc')->paginate(10);

        return view('main.subcategory_wise_post', compact('all_data', 'category', 'subcategory'));
    }

    /**
     * Tag Wise Post Search
     */
    public function tagWisePostView($id, $tag_en){
        $tag = DB::table('tags')->where('id', $id)->first();
        $all_data = DB::table('posts')->where('tag_id', $tag->id)->orderBy('id', 'desc')->paginate(10);

        return view('main.tag_wise_post', compact('all_data', 'tag'));
    }

    /**
     * Get SubDistrict By Ajax
     */
    public function getSubDistrict($district_id){
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }

    /**
     * District Wise Search
     */
    public function districtSearch(Request $request){
        $this->validate($request, [
            'district_id' => 'required',
        ],[
            'district_id.required' => 'Please select any district'
        ]);

        $district = DB::table('districts')->where('id', $request->district_id)->first();
        $subdistrict = DB::table('subdistricts')->where('id', $request->subdistrict_id)->first();
        $all_data = DB::table('posts')->where('district_id', $request->district_id)->orWhere('subdistrict_id', $request->subdistrict_id)->orderBy('id', 'desc')->paginate(10);

        return view('main.district_wise_post', compact('all_data', 'district', 'subdistrict'));
    }

    /**
     * Date Wise Search
     */
    public function dateWiseSearch(Request $request){

        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $start_date = date('d-m-Y', strtotime($request->start_date));
        $end_date = date('d-m-Y', strtotime($request->end_date));

        // return $start_date . '  ' . $end_date;

        // $all_data = DB::table('posts')->where('post_date', $select_date)->orderBy('id', 'desc')->get();

        $all_data = DB::table('posts')->whereBetween('post_date', [$start_date, $end_date])->get();

        return view('main.date_wise_post', compact('all_data', 'start_date', 'end_date'));

    }

    /**
     * Contact Page
     */
    public function contactPage(){
        $data = DB::table('websitesettings')->first();
        return view('main.contact', compact('data'));
    }

    /**
     * Privacy Policy Page
     */
    public function privacyPolicyPage(){
        $all_data = DB::table('privacies')->orderBy('id', 'desc')->get();
        return view('main.privacy', compact('all_data'));
    }

    /**
     * Terms Condition Page
     */
    public function termsConditionPage(){
        $all_data = DB::table('terms')->orderBy('id', 'desc')->get();
        return view('main.terms', compact('all_data'));
    }

    /**
     * Search Wise Product
     */
    public function searchWiseProduct(Request $request){
        $search = $request->search;
       $all_data = DB::table('posts')->where('title_en', 'LIKE', '%'.$search.'%')->orWhere('title_ban', 'LIKE', '%'.$search.'%')->latest()->paginate(10);
       return view('main.search', [
           'all_data' => $all_data,
           'search' => $search,
       ]);
    }

    /**
     * Contact Message Store
     */
    public function contactStore(Request $request){
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        DB::table('contacts')->insert($data);

        $notification = [
            'message' => 'You message send successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Subscriber Store
     */
    public function subscriberStore(Request $request){
        $data = [];
        $data['email'] = $request->email;

        Subscriber::create($data);

        $notification = [
            'message' => 'Your request successfully done',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);

    }


}
