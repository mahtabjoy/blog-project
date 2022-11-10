<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'status'];
    private static $blogcategory;

    public static function saveBlogCategory( $request)
    {
        BlogCategory::create($request->except('_token'));
    }

    public static function updateCategory($request,$id)
    {
        BlogCategory::find($id)->update($request->except('_token'));
    }
}
