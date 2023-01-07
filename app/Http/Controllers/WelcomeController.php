<?php

namespace App\Http\Controllers;

use App\Http\Resources\AboutResource;
use App\Http\Resources\HeroResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\SkillResource;
use App\Models\About;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Skill;
use Inertia\Inertia;
use App\Models\Hero;
use App\Models\Service;
use App\Http\Resources\ServiceResource;

class WelcomeController extends Controller
{
    public function index()
    {
        $skills = SkillResource::collection(Skill::all());
        $projects = ProjectResource::collection(Project::with('skill')->get());
        $heros = HeroResource::collection(Hero::all());
        $abouts = AboutResource::collection(About::all());
        $services = ServiceResource::collection(Service::all());

        return Inertia::render('Welcome', compact('skills', 'projects', 'heros', 'abouts', 'services'));
    }
}
