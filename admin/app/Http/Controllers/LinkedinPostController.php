<?php

namespace App\Http\Controllers;

use App\Models\LinkedinMediaPost;
use App\Models\LinkedinPost;
use Illuminate\Http\Request;

class LinkedinPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO Permettre de lancer la publication si l'intervalle entre la dernière publication et la date du jour dépasse l'intervalle défini
        // TODO Créer le CRON de table
        // TODO Prévoir un système de logging -> Discord ? Email ?
        return view('linkedin-posts.list');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('linkedin-posts/create', ['linkedinPost' => new LinkedinPost()]);
    }

    public function storeMedia(Request $request) {
        $request->validate([
            'media_file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $mediaPost = new LinkedinMediaPost();
        $mediaPost->title = $request->title;
        $mediaPost->description = $request->description;
        $mediaPost->post_id = $request->post_id;
        $mediaPost->path = self::storeFile($request, 'media_file');
        $mediaPost->save();
        return redirect(route('linkedin-posts.edit', ['linkedinPost' => $request->post_id]));

    }

    private static function storeFile($req, $key, $fileName = null) {
        if (is_null($fileName)) {
            $fileExtension = $req->file($key)->getClientOriginalExtension();
            $fileName = md5(date('Y-m-d H:i:s:u'));
            while (file_exists(storage_path() . 'app/public/' . $fileName)) {
                $fileName = md5(date('Y-m-d H:i:s:u'));

            }
            $fileName = $fileName . '.'. $fileExtension;
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
        $linkedinPost = new LinkedinPost();
        $linkedinPost->title = $request->title;
        $linkedinPost->description = $request->description;
        $linkedinPost->scheduled_date = $request->scheduled_date;
        $linkedinPost->state = $request->state;
        $linkedinPost->save();
        return redirect(route('linkedin-posts.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LinkedinPost  $linkedinPost
     * @return \Illuminate\Http\Response
     */
    public function show(LinkedinPost $linkedinPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LinkedinPost  $linkedinPost
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkedinPost $linkedinPost)
    {
        return view('linkedin-posts.edit', ['linkedinPost' => $linkedinPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LinkedinPost  $linkedinPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinkedinPost $linkedinPost)
    {
        $linkedinPost->title = $request->title;
        $linkedinPost->description = $request->description;
        $linkedinPost->scheduled_date = $request->scheduled_date;
        $linkedinPost->state = $request->state;
        $linkedinPost->update();

        return redirect(route('linkedin-posts.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LinkedinPost  $linkedinPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkedinPost $linkedinPost)
    {
        $linkedinPost->delete();
        return redirect(route('linkedin-posts.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LinkedinPost  $linkedinPost
     * @return \Illuminate\Http\Response
     */
    public function destroyMedia(LinkedinMediaPost $linkedinMediaPost)
    {
        $linkedinPostID = $linkedinMediaPost->post_id;
        $linkedinMediaPost->delete();
        return redirect(route('linkedin-posts.edit', ['linkedinPost' => $linkedinPostID]));
    }
}
