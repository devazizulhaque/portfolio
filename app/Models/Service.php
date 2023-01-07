<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    private static $service, $imageUrl, $image, $imageName, $imageDirectory;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public static function getImageUrl($request, $service = null){
        self::$image = $request->file('image');
        if (self::$image){
            if ($service){
                if (file_exists($service->image)){
                    unlink($service->image);
                }
            }
            self::$imageName = time().'.'.self::$image->getClientOriginalExtension();
            self::$imageDirectory = 'service-images/';
            self::$image->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }
        else{
                if ($service){
                    self::$imageUrl = $service->image;
                }
               else{
                   self::$imageUrl = null;
               }
        }
        return self::$imageUrl;
    }


    public static function createService($request, $service = null)
    {
        Service::updateOrCreate(
            ['id' => $service],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => self::getImageUrl($request, $service),
            ]
        );
    }
}
