<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects/create', ['project' => new Project()]);
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
        $project = new Project;
        $project->img_path = self::storeFile($request, 'image');
        $project->title = $request->title;
        $project->description = self::getDescriptionForm($request, 'description');
        $project->technologies = $request->technologies;
        $project->save();
        return redirect(route('projects.list'));
    }

    private static function getDescriptionForm(Request $request, $key) {
        
       $content = $request->$key;
       $dom = new \DomDocument();
       $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
       $imageFile = $dom->getElementsByTagName('imageFile');
 
       foreach($imageFile as $item => $image){
           $data = $image->getAttribute('src');
           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);
           $imgeData = base64_decode($data);
           $image_name= "/upload/" . time().$item.'.png';
           $path = public_path() . $image_name;
           file_put_contents($path, $imgeData);
           
           $image->removeAttribute('src');
           $image->setAttribute('src', $image_name);
        }
 
        return $dom->saveHTML();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if ($request->file('image')) {
            $filePath = self::storeFile($request, 'image');
            $project
                ->update(['img_path' => $filePath ?: '']);
        }
        $project->title = $request->title;
        $project->description = self::getDescriptionForm($request, 'description');
        $project->technologies = $request->technologies;
        $project->update();
        return redirect(route('projects.list'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect(route('projects.list'));
    }
}
