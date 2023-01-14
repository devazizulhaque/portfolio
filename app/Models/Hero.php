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


    public static function createHero($request)
    {
        $request->validate([
            'image' => ['required', 'image'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        self::$hero = new Hero();
        self::$hero->title = $request->title;
        self::$hero->description = $request->description;
        self::$hero->image = self::getImageUrl($request);
        self::$hero->save();
    }

    public static function updateHero($request, $hero){
        self::$hero = Hero::find($hero->id);
        if($request->file('image')){
            if (file_exists(self::$hero->image)) {
                unlink(self::$hero->image);
            }
            self::$hero->image = self::getImageUrl($request);
        }
        else{
            self::$hero->image = $hero->image;
        }
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);
        self::$hero->title = $request->title;
        self::$hero->description = $request->description;
        self::$hero->image = self::$hero->image;
        self::$hero->save();
    }
}
