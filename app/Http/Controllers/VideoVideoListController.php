<?php

namespace App\Http\Controllers;

use App\Video_VideoList;
use Illuminate\Http\Request;

class VideoVideoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Video_VideoList::all();
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
     * @param  \App\Video_VideoList  $video_VideoList
     * @return \Illuminate\Http\Response
     */
    public function show(Video_VideoList $video_VideoList)
    {
        //
        return $video_VideoList;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video_VideoList  $video_VideoList
     * @return \Illuminate\Http\Response
     */
    public function edit(Video_VideoList $video_VideoList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video_VideoList  $video_VideoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video_VideoList $video_VideoList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video_VideoList  $video_VideoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video_VideoList $video_VideoList)
    {
        //
    }
}
