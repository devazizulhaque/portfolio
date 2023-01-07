<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    private static $about, $imageUrl, $image, $imageName, $imageDirectory;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public static function getImageUrl($request, $about = null){
        self::$image = $request->file('image');
        if (self::$image){
            if ($about){
                if (file_exists($about->image)){
                    unlink($about->image);
                }
            }
            self::$imageName = self::$image->getClientOriginalName();
            self::$imageDirectory = 'about-images/';
            self::$image->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }
        else{
            if ($about){
                self::$imageUrl = $about->image;
            }
            else{
                self::$imageUrl = null;
            }
        }
        return self::$imageUrl;
    }



    public static function createAbout($request, $id = null)
    {
        About::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => self::getImageUrl($request, $id),
            ]
        );
    }
}
