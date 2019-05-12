<?php

namespace App\Http\Controllers;

use App\VideoList;
use Illuminate\Http\Request;
use App\Http\Requests\VideoListRequest;

class VideoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideoList::all();
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
    public function store(VideoListRequest $request)
    {
        $videoList = new VideoList();

        $videoList->name = $request->input("name");
        $videoList->userId = $request->input("userId");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideoList  $videoList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return VideoList::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoList  $videoList
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoList $videoList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoList  $videoList
     * @return \Illuminate\Http\Response
     */
    public function update(EditVideoListRequest $request, $id)
    {
        $videoList = VideoList::find($id);

        $videoList->name = $request->input("name");

        $videoList->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoList  $videoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoList $videoList)
    {
        VideoList::find($id)->delete();
    }
}
