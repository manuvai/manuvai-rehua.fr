<?php

namespace App\Http\Controllers;

use App\Models\Cursus;
use Illuminate\Http\Request;
use App\Http\Traits\DescriptionHTMLTrait;

class CursusController extends Controller
{
    use DescriptionHTMLTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cursuses.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursuses.create', ['cursus' => new Cursus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'place' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'description' => 'required',
            'type' => 'required',
        ]);

        $cursus = new Cursus();
        $cursus->name = $request->name;
        $cursus->company = $request->company;
        $cursus->place = $request->place;
        $cursus->start_date = $request->start_date;
        $cursus->end_date = $request->end_date;
        $cursus->description = self::getDescriptionForm($request, 'description');
        $cursus->type = $request->type;
        $cursus->save();
        return redirect(route('cursuses.list'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cursus  $cursus
     * @return \Illuminate\Http\Response
     */
    public function show(Cursus $cursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cursus  $cursus
     * @return \Illuminate\Http\Response
     */
    public function edit(Cursus $cursus)
    {
        return view('cursuses.edit', ['cursus' => $cursus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cursus  $cursus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursus $cursus)
    {
        $cursus->name = $request->name;
        $cursus->company = $request->company;
        $cursus->place = $request->place;
        $cursus->start_date = $request->start_date;
        $cursus->end_date = $request->end_date;
        $cursus->description = self::getDescriptionForm($request, 'description');
        $cursus->type = $request->type;
        $cursus->update();
        return redirect(route('cursuses.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cursus  $cursus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cursus $cursus)
    {
        $cursus->delete();
        return redirect(route('cursuses.list'));
    }
}
