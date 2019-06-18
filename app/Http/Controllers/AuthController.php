<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use App\Video;

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
            $imageUrl = "i_".$user->id.time().$image->getClientOriginalName();
    
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
}