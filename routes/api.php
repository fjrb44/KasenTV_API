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

/*
Route::resources([
    "coment" => "ComentController",
    "language" => "LanguageController",
    "mention" => "MentionController",
    "suscribe" => "SuscribeController",
    "user" => "UserController",
    "videoUser" => "WatchController",
    "videoVideoList" => "VideoVideoListController",
    "video" => "VideoController",
    "videoList" => "VideoListController",
    "tag" => "TagController",
    "videoTag" => "VideoTagController",
    "category" => "CategoryController"
]);
*/

Route::get("/videos", "VideoController@index"); // Get tendencies
Route::get("/{userId}/videos", "VideoController@home"); // Get home videos of userId
Route::get("/videos/{videoId}", "VideoController@show"); // Get the video
Route::get("/{userId}/videos/{videoId}", "VideoController@recomendations"); // Video recomendations
Route::get("/videos/{videoId}/comments", "VideoController@comments"); // Get video comments
// Route::get("/videos/{videoId}/comments/{commentId}/reply", "VideoController@show"); // Get comment replies
Route::get("/user/{userId}/videos", "VideoController@userVideos"); // Get videos from user
Route::get("/user/{userId}", "UserController@show"); // Get user data
Route::get("/videos/search/{search}", "VideoController@search"); // Get searched videos