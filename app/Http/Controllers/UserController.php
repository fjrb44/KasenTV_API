<?php

namespace App\Http\Controllers;

use App\User;
use App\Video;
use App\Watch;
use App\Suscribe;
use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;
use DB;

class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('UserView')->get();;
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
    public function store(UserRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {  
        $user = DB::table('UserView')->where('id', '=', $userId)->first();
        return json_encode($user);
    }

    public function searchUser($username){
        return DB::table('UserView')
            ->where('username', 'like', '%'.$username.'%')
            ->orderBy("followers", "desc")
            ->take(4)
            ->get();
    }

    public function suscriptions($userId){
        return DB::table('UserView')
            ->select(DB::raw('UserView.*'))
            ->join('users', 'UserView.id', '=', 'users.id')
            ->join('suscribes', 'users.id', '=', 'suscribes.influencerId')
            ->where('suscribes.suscriberId', '=', $userId)
            ->orderBy("followers", "desc")
            ->get();
    }

    public function suscripted($userId, $channelId){
        return $suscription = DB::table("suscribes")
            ->where("suscriberId", "=", $userId)
            ->where("influencerId", "=", $channelId)
            ->get();
    }
    public function suscribe($userId, $channelId){
        if( empty(User::find($userId)) ) {
            return ["error" => "User does not exist"];
        }

        if( empty(User::find($channelId)) ){
            return ["error" => "Channel does not exist"];
        }

        if($userId == $channelId){
            return ["error" => "You can't suscribe yourself"];
        }

        $suscription = DB::table("suscribes")
            ->where("suscriberId", "=", $userId)
            ->where("influencerId", "=", $channelId)
            ->get();

        if(sizeof($suscription) != 0){
            return ["error" => "You can't suscribe twice"];
        }

        $suscription = new Suscribe();

        $suscription->suscriberId = $userId;
        $suscription->influencerId = $channelId;

        $suscription->save();

        return ["message" => "Data saved"];
    }

    public function unsuscribe($userId, $channelId){
        if( empty(User::find($userId)) ) {
            return ["error" => "User does not exist"];
        }

        if( empty(User::find($channelId)) ){
            return ["error" => "Channel does not exist"];
        }

        $suscription = DB::table("suscribes")
            ->where("suscriberId", "=", $userId)
            ->where("influencerId", "=", $channelId)
            ->get();

        if(sizeof($suscription)  == 0){
            return ["error" => "This suscription does not exist."];
        }

        Suscribe::where("suscriberId", "=", $userId)
            ->where("influencerId", "=", $channelId)
            ->delete();

        return ["message" => "Data deleted"];
    }

    public function watch($userId, $videoId){
        $video = Video::find($videoId);
        $user = User::find($userId);

        if(empty($video)){
            return ["error" => "Video does not exists"];
        }

        if(empty($userId)){
            return ['error' => 'User does not exists'];
        }

        $watch = Watch::Where('videoId', '=', $videoId)->where('userId', '=', $userId)->get();

        if(sizeof($watch) != 0){
            return ['error' => 'Does already exists'];
        }

        $watch = new Watch();

        $watch->userId = $userId;
        $watch->videoId = $videoId;

        $watch->save();

        return ['data' => $watch];
    }

    public function editUser(EditUserRequest $request, $userId){
        return ["Happy" => "Everyone"];
        $user = User::find($userId);
        $aux = false;
        
        if(empty($user)){
            return ["error" => "No such user"];
        }

        if($request->hasFile('logo')){
            Storage::delete("public/".$user->logo);

            $logo = $request->file('logo');
            $logoUrl = "i_".$user->id.time().$logo->getClientOriginalName();

            $logo->move(public_path("storage"), $logoUrl);
            $user->logo = $logoUrl;
            $aux = true;
        }

        if($request->hasFile('banner')){
            Storage::delete("public/".$user->banner);

            $banner = $request->file('banner');
            $bannerUrl = "i_".$user->id.time().$banner->getClientOriginalName();

            $banner->move(public_path("storage"), $bannerUrl);
            $user->banner = $bannerUrl;
            $aux = true;
        }

        if($user->username != $request->input('username')){
            $user->username = $request->input('username');
            $aux = true;
        }

        
        if($user->password != $request->input('password')){
            $user->password = $request->input('password');
            $aux = true;
        }

        if($aux){
            $video->save();
            return ["data" => "Data has been changed"];
        }
        return ["error" => "No data has been modified"];
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
