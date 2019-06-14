<?php

namespace App\Http\Controllers;

use App\Video;
use App\Suscribe;
use App\Mention;
use Illuminate\Http\Request;
use App\Http\Requests\NewVideoRequest;
use App\Http\Requests\EditVideoRequest;
use DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Devuelve los videos mas vistos
    public function index(){

        return DB::table('VideoView')
            ->orderBy("visualizations")
            ->take(50)
            ->get();
    }

    // Devuelve todos los videos de aquellos a los que este suscrito el usuario con el id pasado por parametro
    public function home($userId){
        $homeVideos = DB::table('VideoView')
            ->whereIn('userId', function($query) use ($userId){
                $query->select(DB::raw("influencerId"))
                    ->from('suscribes')
                    ->where('suscriberId', '=', "$userId");
            })
            ->orderBy("visualizations")
            ->take(50)
            ->get();
        
        // $homeVideos = response()->json($homeVideos);

        if(sizeof($homeVideos) == 0){
            $homeVideos = DB::table('VideoView')
                ->orderBy("visualizations")
                ->take(50)
                ->get();
        }

        return $homeVideos;
    }

    public function recomendations($userId, $videoId){
        $recomendations = DB::table('VideoView')
            ->whereIn('userId', function($query) use ($userId){
                $query->select(DB::raw("influencerId"))
                    ->from('suscribes')
                    ->where('suscriberId', '=', "$userId");
            })
            ->where('id', "!=", $videoId)    
            ->orderBy("visualizations")
            ->take(5)
            ->get();
        
        if(sizeof($recomendations) == 0){
            $recomendations = DB::table('VideoView')
                ->orderBy("visualizations")
                ->take(5)
                ->get();
        }
        return $recomendations;
    }

    public function comments($videoId){
        return Mention::select(DB::raw('users.id as userId, users.username, users.logo, coments.*'))
            ->join('coments', 'mentions.comentId', "=", "coments.id")
            ->join('users', 'mentions.userId', '=', 'users.id')
            ->where('videoId', '=', $videoId)
            ->get();
    }

    public function search($search){
        return DB::table('VideoView')
            ->where('title', 'like', '%'.$search.'%')
            ->orWhere('username', 'like', '%'.$search.'%')
            ->orderBy("visualizations")
            ->take(50)
            ->get();
    }

    public function userVideos($userId){
        return DB::table('VideoView')->where('userId', '=', $userId)->take(50)->get();
    }

    public function userVideosSearch($userId, $search){
        return DB::table('VideoView')
            ->where('userId', '=', $userId)
            ->where('title', 'like', '%'.$search.'%')
            ->take(50)
            ->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function create()
    {
        //
    }
    */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewVideoRequest $request){
        $video = new Video();

        if($request->hasFile('url')){
            $urlVideo = $request->file('url');
            $url = "v_".$video->id.time().$urlVideo->getClientOriginalName();

            $file->move(public_path("storage"), $url);

            $video->url = $url;
        }

        if($request->hasFile('imageUrl')){
            $urlImage = $request->file('imageUrl');
            $imageUrl = "i_".$video->id.time().$urlImage->getClientOriginalName();
            
            $file->move(public_path("storage"), $imageUrl);

            $video->imageUrl = $imageUrl;
        }

        $video->description = $request->input('description');
        $video->title = $request->input('title');
        $video->userId = $request->input('userId');
        $video->categoryId = $request->input('categoryId');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Video::find($id);
        $video = DB::table('VideoView')->where('id', '=', $id)->first();
        return json_encode($video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(EditVideoRequest $request, $id)
    {
        $video = Video::find($id);
        $aux = false;
        
        if($request->hasFile('logo')){
            Storage::delete("public/".$video->logo);

            $image = $request->file('imageUrl');
            $imageUrl = "i_".$empresa->id.time().$image->getClientOriginalName();

            $image->move(public_path("storage"), $imageUrl);
            $video->imageUrl = $imageUrl;
            $aux = true;
        }

        if($video->description != $request->input('description')){
            $video->description = $request->input('description');
            $aux = true;
        }

        
        if($video->title != $request->input('title')){
            $video->title = $request->input('title');
            $aux = true;
        }
        
        if($video->categoryId != $request->input('categoryId')){
            $video->categoryId = $request->input('categoryId');
            $aux = true;
        }

        if($aux){
            $video->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $video = Video::find($id);

        if(!empty($video)){
            Storage::delete("public/".$video->url);
            Storage::delete("public/".$video->imageUrl);

            $video->description = "";
            $video->url = "";
            $video->imageUrl = "";
            $video->title = "";
            $video->userId = 0;
            $video->categoryId = 0;

            $video->save();
        }

    }
}
