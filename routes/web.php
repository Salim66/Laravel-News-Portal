<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\PrivacyController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\TermsController;
use App\Http\Controllers\Backend\WebsiteSetting;
use App\Http\Controllers\Frontend\ExtraController;
use Illuminate\Support\Facades\Route;


// Frontend Routes

// Language Routes
Route::get('/lang/bangla', [ExtraController::class, 'langBangla'])->name('lang.bangla');
Route::get('/lang/english', [ExtraController::class, 'langEnglish'])->name('lang.english');

Route::get('/', function () {
    return view('main.home');
})->middleware('cache.headers:private;max_age=3600');

Route::get('/post/view/{slug_en}', [ExtraController::class, 'postView'])->name('post.view');
Route::get('/category/{slug_en}', [ExtraController::class, 'categoryWisePostView'])->name('category.wise.post');
Route::get('/category/{c_slug_en}/{s_slug_en}', [ExtraController::class, 'subCategoryWisePostView']);
Route::get('/user/{user_id}', [ExtraController::class, 'userWisePost'])->name('user.post');
Route::get('/get/subdistrict/frontend/{district_id}', [ExtraController::class, 'getSubDistrict']);
Route::post('/district-search', [ExtraController::class, 'districtSearch'])->name('district.search');
Route::get('/contact', [ExtraController::class, 'contactPage'])->name('contact.page');
Route::get('/privacy-policy', [ExtraController::class, 'privacyPolicyPage'])->name('privacy.policy.page');
Route::get('/terms-condition', [ExtraController::class, 'termsConditionPage'])->name('terms.condition.page');
Route::get('/tag/{id}/{tag_en}', [ExtraController::class, 'tagWisePostView']);
Route::post('/search', [ExtraController::class, 'searchWiseProduct'])->name('search');
Route::post('/contact-store', [ExtraController::class, 'contactStore'])->name('store.contact');
Route::post('/subscriber-store', [ExtraController::class, 'subscriberStore'])->name('subscriber.store');

Route::post('/search-date-post', [ExtraController::class, 'dateWiseSearch'])->name('date-search');


// Backend Routes

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin Logout Route
Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

// Admin Category All Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/add/category', [CategoryController::class, 'create'])->name('add.category');
Route::post('/store/category', [CategoryController::class, 'store'])->name('store.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'update'])->name('update.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'delete'])->name('delete.category');

// Admin Sub Category All Routes
Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories');
Route::get('/add/subcategory', [SubCategoryController::class, 'create'])->name('add.subcategory');
Route::post('/store/subcategory', [SubCategoryController::class, 'store'])->name('store.subcategory');
Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'edit'])->name('edit.subcategory');
Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'update'])->name('update.subcategory');
Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'delete'])->name('delete.subcategory');

// Admin Tags All Routes
Route::get('/tags', [TagController::class, 'index'])->name('tags');
Route::get('/add/tag', [TagController::class, 'create'])->name('add.tag');
Route::post('/store/tag', [TagController::class, 'store'])->name('store.tag');
Route::get('/edit/tag/{id}', [TagController::class, 'edit'])->name('edit.tag');
Route::post('/update/tag/{id}', [TagController::class, 'update'])->name('update.tag');
Route::get('/delete/tag/{id}', [TagController::class, 'delete'])->name('delete.tag');

// Admin District All Routes
Route::get('/districts', [DistrictController::class, 'index'])->name('districts');
Route::get('/add/district', [DistrictController::class, 'create'])->name('add.district');
Route::post('/store/district', [DistrictController::class, 'store'])->name('store.district');
Route::get('/edit/district/{id}', [DistrictController::class, 'edit'])->name('edit.district');
Route::post('/update/district/{id}', [DistrictController::class, 'update'])->name('update.district');
Route::get('/delete/district/{id}', [DistrictController::class, 'delete'])->name('delete.district');


// Admin Sub District All Routes
Route::get('/subdistricts', [SubDistrictController::class, 'index'])->name('subdistricts');
Route::get('/add/subdistrict', [SubDistrictController::class, 'create'])->name('add.subdistrict');
Route::post('/store/subdistrict', [SubDistrictController::class, 'store'])->name('store.subdistrict');
Route::get('/edit/subdistrict/{id}', [SubDistrictController::class, 'edit'])->name('edit.subdistrict');
Route::post('/update/subdistrict/{id}', [SubDistrictController::class, 'update'])->name('update.subdistrict');
Route::get('/delete/subdistrict/{id}', [SubDistrictController::class, 'delete'])->name('delete.subdistrict');


// Admin Post All Routes
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/add/post', [PostController::class, 'create'])->name('add.post');
Route::post('/store/post', [PostController::class, 'store'])->name('store.post');
Route::get('/edit/post/{id}', [PostController::class, 'edit'])->name('edit.post');
Route::post('/update/post/{id}', [PostController::class, 'update'])->name('update.post');
Route::get('/delete/post/{id}', [PostController::class, 'delete'])->name('delete.post');
Route::get('/get/subcategory/{category_id}', [PostController::class, 'getSubCategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class, 'getSubDistrict']);


// Admin Social Settings Routes
Route::get('/social/setting/', [SettingsController::class, 'socialSetting'])->name('social.setting');
Route::post('/update/social/{id}', [SettingsController::class, 'socialSettingUpdate'])->name('update.social');


// Admin Seo Settings Routes
Route::get('/seo/setting/', [SettingsController::class, 'seoSetting'])->name('seo.setting');
Route::post('/update/seo/{id}', [SettingsController::class, 'seoSettingUpdate'])->name('update.seo');


// Admin Prayer Settings Routes
Route::get('/prayer/setting/', [SettingsController::class, 'prayerSetting'])->name('prayer.setting');
Route::post('/update/prayer/{id}', [SettingsController::class, 'prayerSettingUpdate'])->name('update.prayer');


// Admin LiveTv Settings Routes
Route::get('/livetv/setting/', [SettingsController::class, 'livetvSetting'])->name('livetv.setting');
Route::post('/update/livetv/{id}', [SettingsController::class, 'livetvSettingUpdate'])->name('update.livetv');
Route::get('/livetv/active/{id}', [SettingsController::class, 'livetvActive'])->name('active.livetv');
Route::get('/livetv/deactive/{id}', [SettingsController::class, 'livetvDeactive'])->name('deactive.livetv');


// Admin Notice Settings Routes
Route::get('/notice/setting/', [SettingsController::class, 'noticeSetting'])->name('notice.setting');
Route::post('/update/notice/{id}', [SettingsController::class, 'noticeSettingUpdate'])->name('update.notice');
Route::get('/notice/active/{id}', [SettingsController::class, 'noticeActive'])->name('active.notice');
Route::get('/notice/deactive/{id}', [SettingsController::class, 'noticeDeactive'])->name('deactive.notice');


// Admin Website Settings Routes
Route::get('/websites', [SettingsController::class, 'index'])->name('websites');
Route::get('/add/website', [SettingsController::class, 'create'])->name('add.website');
Route::post('/store/website', [SettingsController::class, 'store'])->name('store.website');
Route::get('/edit/website/{id}', [SettingsController::class, 'edit'])->name('edit.website');
Route::post('/update/website/{id}', [SettingsController::class, 'update'])->name('update.website');
Route::get('/delete/website/{id}', [SettingsController::class, 'delete'])->name('delete.website');


// Admin Photo Gallery Routes
Route::get('/photos/gallery', [GalleryController::class, 'photoGallery'])->name('photo.gallery');
Route::get('/add/photos/gallery', [GalleryController::class, 'addPhotoGallery'])->name('add.photo.gallery');
Route::post('/store/photos/gallery', [GalleryController::class, 'storePhotoGallery'])->name('store.photo.gallery');
Route::get('/edit/photos/gallery/{id}', [GalleryController::class, 'editPhotoGallery'])->name('edit.photo.gallery');
Route::post('/update/photos/gallery/{id}', [GalleryController::class, 'updatePhotoGallery'])->name('update.photo.gallery');
Route::get('/delete/photos/gallery/{id}', [GalleryController::class, 'deletePhotoGallery'])->name('delete.photo.gallery');


// Admin Photo Gallery Routes
Route::get('/videos/gallery', [GalleryController::class, 'videoGallery'])->name('video.gallery');
Route::get('/add/videos/gallery', [GalleryController::class, 'addVideoGallery'])->name('add.video.gallery');
Route::post('/store/videos/gallery', [GalleryController::class, 'storeVideoGallery'])->name('store.video.gallery');
Route::get('/edit/videos/gallery/{id}', [GalleryController::class, 'editVideoGallery'])->name('edit.video.gallery');
Route::post('/update/videos/gallery/{id}', [GalleryController::class, 'updateVideoGallery'])->name('update.video.gallery');
Route::get('/delete/videos/gallery/{id}', [GalleryController::class, 'deleteVideoGallery'])->name('delete.video.gallery');


// Admin Ads Routes
Route::get('/ads/list', [AdsController::class, 'adsList'])->name('ads.list');
Route::get('/add/ads', [AdsController::class, 'addAds'])->name('add.ads');
Route::post('/store/ads', [AdsController::class, 'storeAds'])->name('store.ads');
Route::get('/edit/ads/{id}', [AdsController::class, 'editAds'])->name('edit.ads');
Route::post('/update/ads/{id}', [AdsController::class, 'updateAds'])->name('update.ads');
Route::get('/delete/ads/{id}', [AdsController::class, 'deleteAds'])->name('delete.ads');


// Admin User roles Routes
Route::get('/all/writer', [RoleController::class, 'allWriter'])->name('all.writer');
Route::get('/add/writer', [RoleController::class, 'addWriter'])->name('add.writer');
Route::post('/store/writer', [RoleController::class, 'storeWriter'])->name('store.writer');
Route::get('/edit/writer/{id}', [RoleController::class, 'editWriter'])->name('edit.writer');
Route::post('/update/writer/{id}', [RoleController::class, 'updateWriter'])->name('update.writer');
Route::get('/delete/writer/{id}', [RoleController::class, 'deleteWriter'])->name('delete.writer');


// Admin Website Setting Routes
Route::get('/website/setting/', [WebsiteSetting::class, 'websiteSetting'])->name('website.setting');
Route::post('/update/website/setting/{id}', [WebsiteSetting::class, 'updateWebsiteSetting'])->name('update.websetting');


// Admin Account Password
Route::get('/account/setting', [AdminController::class, 'accountSetting'])->name('account.setting');
Route::get('/edit/profile', [AdminController::class, 'editProfile'])->name('edit.profile');
Route::post('/update/profile/{id}', [AdminController::class, 'updateProfile'])->name('update.profile');
Route::get('/change/password', [AdminController::class, 'changePassword'])->name('change.password');
Route::post('/update/password', [AdminController::class, 'updatePassword'])->name('update.password');

// Gat All Contact Routes
Route::get('/all-contacts', [ContactController::class, 'allContacts'])->name('all-contacts');
Route::get('/delete-contacts/{id}', [ContactController::class, 'deleteContact'])->name('delete.contact');

// Gat All Subscriber Routes
Route::get('/all-subscriber', [SubscriberController::class, 'allSubscriber'])->name('all-subscriber');
Route::get('/delete-subscriber/{id}', [SubscriberController::class, 'deleteSubscriber'])->name('delete.subscriber');


// Admin User roles Routes
Route::get('/all/privacy', [PrivacyController::class, 'allPrivacy'])->name('all.privacy');
Route::get('/add/privacy', [PrivacyController::class, 'addPrivacy'])->name('add.privacy');
Route::post('/store/privacy', [PrivacyController::class, 'storePrivacy'])->name('store.privacy');
Route::get('/edit/privacy/{id}', [PrivacyController::class, 'editPrivacy'])->name('edit.privacy');
Route::post('/update/privacy/{id}', [PrivacyController::class, 'updatePrivacy'])->name('update.privacy');
Route::get('/delete/privacy/{id}', [PrivacyController::class, 'deletePrivacy'])->name('delete.privacy');


// Admin User roles Routes
Route::get('/all/terms', [TermsController::class, 'allTerms'])->name('all.terms');
Route::get('/add/terms', [TermsController::class, 'addTerms'])->name('add.terms');
Route::post('/store/terms', [TermsController::class, 'storeTerms'])->name('store.terms');
Route::get('/edit/terms/{id}', [TermsController::class, 'editTerms'])->name('edit.terms');
Route::post('/update/terms/{id}', [TermsController::class, 'updateTerms'])->name('update.terms');
Route::get('/delete/terms/{id}', [TermsController::class, 'deleteTerms'])->name('delete.terms');
