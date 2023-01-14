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

    public static function createAbout($request)
    {
        $request->validate([
            'image' => ['required', 'image'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);
            
        self::$about = new About();
        self::$about->title = $request->title;
        self::$about->description = $request->description;
        self::$about->image = self::getImageUrl($request);
        self::$about->save();
    }

    public static function updateAbout($request, $about){
        self::$about = About::find($about->id);
        if($request->file('image')){
            if (file_exists(self::$about->image)) {
                unlink(self::$about->image);
            }
            self::$about->image = self::getImageUrl($request);
        }
        else{
            self::$about->image = $about->image;
        }
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);
        self::$about->title = $request->title;
        self::$about->description = $request->description;
        self::$about->image = self::$about->image;
        self::$about->save();
    }
}
