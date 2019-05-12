<?php

namespace App\Http\Controllers;

use App\Suscribe;
use Illuminate\Http\Request;
use App\Http\Requests\SuscribeRequest;

class SuscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Suscribe::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuscribeRequest $request)
    {
        $suscribe = new Suscribe();

        $suscribe->suscriberId = $request->input("suscriberId");
        $suscribe->influencerId = $request->input("influencerId");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function show(Suscribe $suscribe)
    {
        return $suscribe;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscribe $suscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscribe $suscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suscribe  $suscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscribe $suscribe)
    {
        //
    }
}
