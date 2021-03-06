<?php

namespace App\Http\Controllers;

use App\VideoVideoList;
use Illuminate\Http\Request;
use App\Http\Requests\VideoVideoListRequest;

class VideoVideoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideoVideoList::all();
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
    public function store(VideoVideoListRequest $request)
    {
        $videoVideoList = new VideoVideoList();

        $videoVideoList->videListId = $request->input("videoListId");
        $videoVideoList->videoId = $request->input("videoId");

        $videoVideoList->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideoVideoList  $videoVideoList
     * @return \Illuminate\Http\Response
     */
    public function show(VideoVideoList $videoVideoList)
    {
        return $videoVideoList;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoVideoList  $videoVideoList
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoVideoList $videoVideoList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoVideoList  $videoVideoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoVideoList $videoVideoList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoVideoList  $videoVideoList
     * @return \Illuminate\Http\Response
     */
    public function destroy($videoListId, $videoId)
    {
        VideoVideoList::where("videoListId", $videoListId)->where("videoId", $videoId)->delete();
    }
}
