<?php

namespace App\Http\Controllers;

use App\Mention;
use Illuminate\Http\Request;
use App\Http\Requests\MentionRequest;

class MentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Mention::all();
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
    public function store(MentionRequest $request)
    {
        $mention = new Mention();

        $mention->userId = $request->input("userId");
        $mention->videoId = $request->input("videoId");
        $mention->comentId = $request->input("comentId");

        $mention->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function show(Mention $mention)
    {
        return $mention;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function edit(Mention $mention)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mention $mention)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mention $mention)
    {
        //
    }
}
