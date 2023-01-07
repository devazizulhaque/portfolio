<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public static $skill, $image, $imageUrl, $directory, $imageName;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName().time().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'skill-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function createSkill($request)
    {
        $request->validate([
            'image' => ['required', 'image'],
            'name' => ['required', 'max:255'],
        ]);

        self::$skill = new Skill();
        self::$skill->name = $request->name;
        self::$skill->image = self::getImageUrl($request);
        self::$skill->save();
    }

    public static function updateSkill($request, $skill){
        self::$skill = Skill::find($skill->id);
        if($request->file('image')){
            if (file_exists(self::$skill->image)) {
                unlink(self::$skill->image);
            }
            self::$skill->image = self::getImageUrl($request);
        }
        else{
            self::$skill->image = $skill->image;
        }
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);
        self::$skill->name = $request->name;
        self::$skill->save();
    }

    public static function destroy($skill){
        self::$skill = Skill::find($skill->id);
        if (file_exists(self::$skill->image)) {
            unlink(self::$skill->image);
        }
        self::$skill->delete();
    }
}
