<?php

namespace App\Http\Controllers;

use App\Watch;
use Illuminate\Http\Request;
use App\Http\Requests\WatchRequest;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Watch::all();
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
    public function store(WatchRequest $request)
    {
        $watch = new Watch();

        $watch->userId = $request->input("userId");
        $watch->videoId = $request->input("videoId");

        if(empty($request->input("time"))){
            $watch->time = 0;
        }else{
            $watch->time = $request->input("time");
        }

        $watch->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function show($userId, $videoId)
    {
        return Watch::where("userId", $userId)->where("videoId", $videoId)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function edit(Watch $watch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Watch $watch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Watch $watch)
    {
        //
    }
}
