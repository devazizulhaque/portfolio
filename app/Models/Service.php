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
            self::$imageName = time().rand(10, 1000).self::$image->getClientOriginalExtension();
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


    public static function createService($request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'image' => ['required', 'image'],
        ]);

        self::$service = new Service();
        self::$service->title = $request->title;
        self::$service->description = $request->description;
        self::$service->image = self::getImageUrl($request);
        self::$service->save();
    }

    public static function updateService($request, $service){
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        self::$service = Service::find($service->id);
        self::$service->title = $request->title;
        self::$service->description = $request->description;
        self::$service->image = self::getImageUrl($request, $service);
        self::$service->save();
    }
}
