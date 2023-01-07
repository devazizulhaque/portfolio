<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    private static $hero, $imageUrl, $image, $imageName, $imageDirectory;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public static function getImageUrl($request, $hero = null){
        self::$image = $request->file('image');
        if (self::$image){
            if ($hero){
                if (file_exists($hero->image)){
                    unlink($hero->image);
                }
            }
            self::$imageName = time().'.'.self::$image->getClientOriginalExtension();
            self::$imageDirectory = 'hero-images/';
            self::$image->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }
        else{
                if ($hero){
                    self::$imageUrl = $hero->image;
                }
               else{
                   self::$imageUrl = null;
               }
        }
        return self::$imageUrl;
    }


    public static function createHero($request, $hero = null)
    {
        Hero::updateOrCreate(
            ['id' => $hero],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => self::getImageUrl($request, $hero),
            ]
        );
    }
}
