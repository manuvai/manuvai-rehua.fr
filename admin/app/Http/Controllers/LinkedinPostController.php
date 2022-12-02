<?php

namespace App\Http\Controllers;

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
        // TODO Ajouter le model de données pour les Images Linkedin
        // TODO Ajouter la gestion des images rattachées au post linkedin

        // TODO Permettre de lancer la publication si l'intervalle entre la dernière publication et la date du jour dépasse l'intervalle défini
        // TODO Créer le CRON de table
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
}
