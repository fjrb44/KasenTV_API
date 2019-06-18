<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\NewVideoRequest;
use App\Http\Requests\VideoEditRequest;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Video;
use App\Watch;
use App\Suscribe;
use DB;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'signup']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or password does not exist'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function signup(SignUpRequest $request){
        
        $user = new User;

        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->email = $request->input('email');

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $imageUrl = "i_".$user->id.time();
    
            $image->move(public_path("storage"), $imageUrl);
            
            $user->logo = $imageUrl;
        }

        $user->save();

        return ["data" => $user];
    }

    public function editUser(EditUserRequest $request){
        //$user = User::find($userId);
        $user = Auth::User();
        $aux = false;

        if(empty($user)){
            return ["error" => "No such user"];
        }
        
        if($request->hasFile('logo')){
            if($user->banner != "100x100.png"){
                Storage::delete("public/".$user->logo);
            }
            
            $logo = $request->file('logo');
            $logoUrl = "i_".$user->id.time();
            
            $logo->move(public_path("storage"), $logoUrl);
            $user->logo = $logoUrl;
            $aux = true;
        }
        
        if($request->hasFile('banner')){
            if($user->banner != "1200x400.png"){
                Storage::delete("public/".$user->banner);
            }
            
            $banner = $request->file('banner');
            $bannerUrl = "i_".$user->id.time();
            
            $banner->move(public_path("storage"), $bannerUrl);
            $user->banner = $bannerUrl;
            $aux = true;
        }
        
        if($user->username != $request->input('username') && !empty($request->input('username'))){
            $user->username = $request->input('username');
            $aux = true;
        }
        
        
        if($user->password != $request->input('password') && !empty($request->input('password'))){
            $user->password = $request->input('password');
            $aux = true;
        }

        if($aux){
            $user->save();
            return ["data" => "Data has been changed"];
        }
        return ["error" => "No data has been modified"];
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()->username,
            'userId' => auth()->user()->id
        ]);
    }
    
    public function suscribe($channelId){
        $userId = Auth::user()->id;

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

    public function unsuscribe($channelId){
        $userId = Auth::user()->id;

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

    public function watch($videoId){
        $video = Video::find($videoId);
        $user = Auth::user();
        $userId = $user->id;

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

    public function videoStore(NewVideoRequest $request){
        $video = new Video();

        if($request->hasFile('url')){
            $urlVideo = $request->file('url');
            $url = "v_".$video->id.time();

            $urlVideo->move(public_path("storage"), $url);

            $video->url = $url;
        }

        if($request->hasFile('imageUrl')){
            $urlImage = $request->file('imageUrl');
            $imageUrl = "i_".$video->id.time();
            
            $urlImage->move(public_path("storage"), $imageUrl);

            $video->imageUrl = $imageUrl;
        }

        $video->description = $request->input('description');
        $video->title = $request->input('title');
        $video->userId = Auth::user()->id;
        $video->categoryId = $request->input('categoryId');
        
        $video->save();

        return ["message" => "Data saved", "data" => $video];
    }

    public function videoEdit(VideoEditRequest $request, $videoId){
        $video = Video::find($videoId);
        $aux = false;

        if(empty($video)){
            return ["error" => "Video not found"];
        }

        if($video->userId != Auth::user()->id){
            return ["error" => "You are not allowed to modify this video"];
        }
        
        if($request->hasFile('imageUrl')){
            Storage::delete("public/".$video->imageUrl);

            $urlImage = $request->file('imageUrl');
            $imageUrl = "i_".$video->id.time();
            
            $urlImage->move(public_path("storage"), $imageUrl);

            $video->imageUrl = $imageUrl;

            $aux = true;
        }

        if($video->description != $request->input("description") && !empty($request->input('description'))){
            $video->description = $request->input('description');
            $aux = true;
        }

        if($video->description != $request->input("description") && !empty($request->input('description'))){
            $video->title = $request->input('title');
            $aux = true;
        }
        
        if($video->categoryId != $request->input("categoryId") && !empty($request->input('categoryId'))){
            if(Category::find($request->input('categoryId'))){
                $video->categoryId = $request->input('categoryId');
                $aux = true;
            }
        }
        
        if($aux){
            $video->save();

            return ["data" => "The changes has been correctly made"];
        }

        return ["error" => "No data has been change"];
    }
}