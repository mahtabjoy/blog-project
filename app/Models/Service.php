<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    private static $service, $serviceImage, $imageName, $imageUrl, $imageDirectory;

    public static function saveImage($request, $existImage = null)
    {
        self::$serviceImage = $request->file('image');
        if (self::$serviceImage){
            if ($existImage) {
                if (file_exists($existImage)) {
                    unlink($existImage);
                }
            }
            self::$imageName = 'biztrox_'.time().'.'.self::$serviceImage->getClientOriginalExtension();
            self::$imageDirectory = 'admin/assets/images/upload-images/services/';
            self::$serviceImage->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        } else {
            self::$imageUrl = $existImage;
        }
        return self::$imageUrl;
    }
    public static function createOrUpdate($request)
    {
        self::$service =new Service();
        self::$service->ser_title = $request->ser_title;
        self::$service->description = $request->description;
        self::$service->image = self::saveImage($request);
        self::$service->slug = str_replace(' ','-', $request->ser_title);;
        self::$service->status = $request->status;
        self::$service->save();
    }

    public static function saveOrUpdate($request,$id)
    {
        self::$service =Service::find($id);
        self::$service->ser_title = $request->ser_title;
        self::$service->description = $request->description;
        self::$service->image = self::saveImage($request, self::$service->image);
        self::$service->slug = str_replace(' ','-', $request->title);;
        self::$service->status = $request->status;
        self::$service->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


