<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('skills/list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills/create', ['skill' => new Skill()]);
    }
    
    private static function storeFile($req, $key, $fileName = null) {

        if (is_null($fileName)) {
            $fileName = $req->file($key)->getClientOriginalName();
        }
        $filePath = $req->file($key)->storeAs('uploads', $fileName, 'public');
        return $filePath;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skill = new Skill();
        $skill->image_path = self::storeFile($request, 'image');
        $skill->title = $request->title;
        $skill->rate = $request->rate;
        $skill->save();
        return redirect(route('skills.list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit', ['skill' => $skill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        if ($request->file('image')) {
            $filePath = self::storeFile($request, 'image');
            $skill
                ->update(['image_path' => $filePath ?: '']);
        }

        $skill->title = $request->title;
        $skill->rate = $request->rate;

        return redirect(route('skills.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect(route('skills.list'));
    }
}
