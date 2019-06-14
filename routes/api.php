<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get("/videos", "VideoController@index"); // Get tendencies
Route::get("/videos/{videoId}", "VideoController@show"); // Get the video
Route::get("/videos/{videoId}/comments", "VideoController@comments"); // Get video comments
Route::post("/user/{userId}/videos/{videoId}/newComment", 'ComentController@store'); // Create a new Comment
Route::get("/videos/search/{search}", "VideoController@search"); // Get searched videos
// Route::get("/videos/{videoId}/comments/{commentId}/reply", "VideoController@show"); // Get comment replies
Route::get("/user/{userId}", "UserController@show"); // Get user data
Route::get("/user/{userId}/home", "VideoController@home"); // Get home videos of userId
Route::get("/user/{userId}/recomend/{videoId}", "VideoController@recomendations"); // Video recomendations
Route::get("/user/{userId}/videos", "VideoController@userVideos"); // Get videos from user
Route::get("/user/{userId}/suscriptions", "UserController@suscriptions"); // Get the users who are followed by userId
Route::get("/user/{userId}/videos/search/{search}", "VideoController@userVideosSearch"); // Get videos from user
Route::get("/user/search/{username}", "UserController@searchUser");

Route::get("/user/{userId}/channel/{channelId}/suscripted", "UserController@suscripted"); // Return the suscription from userId to channelId

Route::post("/user/{userId}/channel/{channelId}/suscribe", "UserController@suscribe"); // Suscribe the user to the channel
Route::post("/user/{userId}/channel/{channelId}/unsuscribe", "UserController@unsuscribe"); // Unsuscribe the user to the channel

Route::get("/category", "CategoryController@index");
Route::get("/category/{categoryId}", "CategoryController@show");
Route::get("/category/{categoryId}/videos", "CategoryController@videos");