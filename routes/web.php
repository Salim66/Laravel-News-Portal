<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

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
