<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    private static $article, $articleImage, $imageName, $imageDirectory, $imageUrl;

    public static function saveImage($request, $existImage = null)
    {
        self::$articleImage = $request->file('image');
        if (self::$articleImage)
        {
            if ($existImage)
            {
                if (file_exists($existImage))
                {
                    unlink($existImage);
                }
            }
            self::$imageName = 'biztrox_'.time().'.'.self::$articleImage->getClientOriginalExtension();
            self::$imageDirectory = 'admin/assets/images/uploaded_images/articles/';
            self::$articleImage->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }
        else
        {
            self::$imageUrl = $existImage;
        }
        return self::$imageUrl;
    }

    public static function createOrUpdate($request)
    {
        self::$article                         = new Article();
        self::$article->art_title             = $request->art_title;
        self::$article->image                  = self::saveImage($request);
        self::$article->description            = $request->description;
        self::$article->user_id                = auth()->id();
        self::$article->slug                   = str_replace(' ', '-', $request->art_title);
        self::$article->status                 = $request->status;
        self::$article->save();
    }
    public static function saveOrUpdate($request, $id)
    {
        self::$article                         = Article::find($id);
        self::$article->art_title             = $request->art_title;
        self::$article->image                  = self::saveImage($request, self::$article->image);
        self::$article->description            = $request->description;
        self::$article->user_id                = auth()->id();
        self::$article->slug                   = str_replace(' ', '-', $request->art_title);
        self::$article->status                 = $request->status;
        self::$article->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
