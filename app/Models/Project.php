<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill_id',
        'name',
        'image',
        'project_url',
    ];

    public static $project, $image, $imageUrl, $directory, $imageName;

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName().'-'.time().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'project-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function createProject($request){
        $request->validate([
            'image' => ['required', 'image'],
            'name' => ['required', 'max:255'],
            'skill_id' => ['required', 'integer'],
        ]);

        self::$project = new Project();
        self::$project->skill_id = $request->skill_id;
        self::$project->name = $request->name;
        self::$project->project_url = $request->project_url;
        self::$project->image = self::getImageUrl($request);
        self::$project->save();
    }

    public static function updateProject($request, $project){
        self::$project = Project::find($project->id);
        if($request->file('image')){
            if (file_exists(self::$project->image)) {
                unlink(self::$project->image);
            }
            self::$project->image = self::getImageUrl($request);
        }
        else{
            self::$project->image = $project->image;
        }
        $request->validate([
            'name' => ['required', 'max:255'],
            'skill_id' => ['required', 'integer'],
        ]);
        self::$project->skill_id = $request->skill_id;
        self::$project->name = $request->name;
        self::$project->project_url = $request->project_url;
        self::$project->image = self::$project->image;
        self::$project->save();
    }

    public static function destroy($project){
        self::$project = Project::find($project->id);
        if (file_exists($project->image)) {
            unlink($project->image);
        }
        $project->delete();
    }
}
