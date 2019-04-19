<?php

namespace App\Http\Controllers;

use App\Video_Tag;
use Illuminate\Http\Request;

class VideoTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Video_Tag::all();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video_Tag  $video_Tag
     * @return \Illuminate\Http\Response
     */
    public function show(Video_Tag $video_Tag)
    {
        //
        return $video_Tag;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video_Tag  $video_Tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Video_Tag $video_Tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video_Tag  $video_Tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video_Tag $video_Tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video_Tag  $video_Tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video_Tag $video_Tag)
    {
        //
    }
}
