<?php

namespace App\Http\Controllers;

use App\VideoTag;
use Illuminate\Http\Request;
use App\Http\Requests\VideoTagRequest;

class VideoTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideoTag::all();
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
    public function store(VideoTagRequest $request)
    {
        $videoTag = new VideoTag();

        $videoTag->videoId = $request->input("videoId");
        $videoTag->tagId = $request->input("tagId");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideoTag  $videoTag
     * @return \Illuminate\Http\Response
     */
    public function show(VideoTag $videoTag)
    {
        return $videoTag;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoTag  $videoTag
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoTag $videoTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoTag  $videoTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoTag $videoTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoTag  $videoTag
     * @return \Illuminate\Http\Response
     */
    public function destroy($videoId, $tagId)
    {
        VideoTag::where("videoId", $videoId)->where("tagId", $tagId)->delete();
    }
}
