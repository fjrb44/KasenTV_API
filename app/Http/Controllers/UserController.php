<?php

namespace App\Http\Controllers;

use App\User;
use App\Suscribe;
use Illuminate\Http\Request;
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
        $user = new User();

        $user->username = $request->input("username");
        $user->email = $request->input("email");
        $user->google_data = $request->input("google_data");
        
        if(empty($request->input("languageId"))){
            $user->languageId = 1;
        }else{
            $user->languageId = $request->input("languageId");
        }

        $user->save();
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
            ->orderBy("followers")
            ->take(4)
            ->get();
    }

    public function suscriptions($userId){
        return DB::table('UserView')
            ->select(DB::raw('UserView.*'))
            ->join('users', 'UserView.id', '=', 'users.id')
            ->join('suscribes', 'users.id', '=', 'suscribes.influencerId')
            ->where('suscribes.suscriberId', '=', $userId)
            ->orderBy("followers")
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
