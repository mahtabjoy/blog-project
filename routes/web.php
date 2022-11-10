<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogSubCategoryController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Front\FrontController;




Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/article/{slug}', [FrontController::class, 'articleDetails'])->name('article-details');
Route::get('/service/{slug}', [FrontController::class, 'serviceDetails'])->name('service-details');
Route::get('/category-wise-blogs/{id}', [FrontController::class, 'categoryBlogs'])->name('categoryWise-blogs');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //normal blog category route
    Route::get('/add_blog_category', [BlogCategoryController::class, 'add_category'])->name('add_blog_category');
    Route::post('/new_blog_category', [BlogCategoryController::class, 'new_category'])->name('new_blog_category');
    Route::get('/manage_blog_category', [BlogCategoryController::class, 'manage_category'])->name('manage_blog_category');
    Route::get('/edit_blog_category/{id}', [BlogCategoryController::class, 'edit_category'])->name('edit_blog_category');
    Route::post('/update_blog_category/{id}', [BlogCategoryController::class, 'update_category'])->name('update_blog_category');
    Route::get('/delete_blog_category/{id}', [BlogCategoryController::class, 'delete_category'])->name('delete_blog_category');
    //blog sub category resource route
    Route::resource('blog_sub_categories', BlogSubCategoryController::class);
    // blogs resource route
    Route::resource('blogs', BlogsController::class);
    //route for ajax
    Route::get('/get-sub-category-by-category-id/{id}', [BlogsController::class, 'getSubCategory'])->name('get-sub-category-by-category-id');
    //service resource route
    Route::resource('services', ServiceController::class);

    Route::resource('articles', ArticleController::class);
});
