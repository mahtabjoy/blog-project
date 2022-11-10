<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    private $blogCategories;
    public function add_category()
    {
        return view('admin.blog_category.create');
    }
    public function new_category(Request $request)
    {
        BlogCategory::saveBlogCategory($request);
        return redirect()->back()->with('success', 'Blog Category Created Successfully');
    }
    public function manage_category()
    {
        $this->blogCategories = BlogCategory::latest()->get();
        return view('admin.blog_category.manage',[
            'blogCategories' => $this->blogCategories
        ]);
    }
    public function edit_category($id)
    {
        return view('admin.blog_category.edit',[
            'blogCategory' => BlogCategory::find($id)
        ]);
    }
    public function update_category(Request $request, $id)
    {
        BlogCategory::updateCategory($request, $id);
        return redirect('/manage_blog_category')->with('success', 'Blog Category Updated Successfully');
    }
    public function delete_category($id)
    {
        BlogCategory::find($id)->delete();
        return redirect()->back()->with('success', 'Blog Category Deleted Successfully');
    }
}
