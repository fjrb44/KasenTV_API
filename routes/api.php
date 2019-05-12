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
Route::get('/me', function (Request $request) {
    return (array) $request->user();
})->middleware('auth:api');
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

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