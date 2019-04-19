<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resources([
    "coment" => "ComentController",
    "language" => "IdiomaController",
    "mention" => "MentionController",
    "suscribe" => "SuscribeController",
    "user" => "UsuarioController",
    "videoUser" => "VideoUserController",
    "videoVideoList" => "VideoVideoListController",
    "video" => "VideoController",
    "videoList" => "VideoListController"
]);