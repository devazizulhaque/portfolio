<?php

namespace App\Http\Controllers;

use App\Http\Resources\HeroResource;
use App\Models\Hero;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heros = HeroResource::collection(Hero::all());
        return Inertia::render('Hero/Index', compact('heros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Hero/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hero::createHero($request);
        return redirect()->route('heros.index')->with('message', 'Hero create successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hero $hero)
    {
        return Inertia::render('Hero/Edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hero $hero)
    {
        Hero::updateHero($request, $hero);
        return redirect()->route('heros.index')->with('message', 'Hero update successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero = Hero::find($id);
        if (file_exists($hero->image)){
            unlink($hero->image);
        }
        $hero->delete();
        return redirect()->route('heros.index')->with('message', 'Hero delete successfully...');
    }
}
