<?php

namespace App\Http\Controllers;

use App\Coment;
use Illuminate\Http\Request;
use App\Http\Requests\ComentRequest;

class ComentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Coment::all();
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
    public function store(ComentRequest $request)
    {
        $coment = new Coment;

        $coment->text = $request->input('text');
        $coment->responseId = $request->input('responseId');
        
        $coment->save();

        return ["message" => "Data saved"];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function show(Coment $coment)
    {
        return $coment;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function edit(Coment $coment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function update(ComentRequest $request, $id)
    {
        $coment = Coment::find($id);

        $coment->text = $coment->text."\n\nEdit: ".$request->input("text");
        $coment->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coment $coment)
    {
        //
    }
}
