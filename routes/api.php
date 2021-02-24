<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\postController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\PassportController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//users
Route::post('users', [userController::class, 'createUser']);
Route::put('users/{id}', [userController::class, 'updateUser']);
Route::get('users', [userController::class, 'readUsers']);
Route::get('users/{id}', [userController::class, 'readUser']);
Route::delete('users/{id}', [userController::class, 'deleteUser']);
Route::get('user/{name}', [userController::class, 'searchUser']);


//Following e Follower
Route::get('following/{id}', [userController::class, 'following']);
Route::get('follower/{id}', [userController::class, 'follower']);


//post
Route::post('post', [postController::class, 'createPost']);
Route::get('post', [postController::class, 'readPosts']);
Route::get('post/{id}', [postController::class, 'readPost']);


//evento
Route::post('event', [eventController::class, 'createEvent']);
Route::put('event/{id}', [eventController::class, 'updateEvent']);
Route::get('event', [eventController::class, 'readEvents']);
Route::get('event/{id}', [eventController::class, 'readEvent']);
Route::delete('event/{id}', [eventController::class, 'deleteEvent']);



//comments
Route::get('comment', [commentController::class, 'readComments']);
Route::get('comment/{id}', [commentController::class, 'readComment']);
Route::get('comments/{id}', [commentController::class, 'commentsList']);



//register e login
Route::post('register', [passportController::class, 'register']);
Route::post('login', [passportController::class, 'login']);

//ações que necessitam autenticação
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('logout', [passportController::class, 'logout']);
    Route::get('getDetails', [passportController::class, 'getDetails']);
    Route::post('createPost', [postController::class, 'createPost']);
    Route::put('post/{id}', [postController::class, 'updatePost']);
    Route::delete('deletePost/{id}', [postController::class, 'deletePost']);
    Route::post('create/{post_id}', [commentController::class, 'createComment']);
    Route::put('comment/{id}', [commentController::class, 'updateComment']);
    Route::delete('comment/{id}', [commentController::class, 'deleteComment']);
    //seguir ou deixar de seguir um usuario
    Route::post('follow/{id}', [userController::class, 'followUser']);
    Route::post('unfollow/{id}', [userController::class, 'unfollowUser']);
    //Listar posts de usuarios que você segue
    Route::get('readPosts', [postController::class, 'readFollowingPosts']);
    //Convidar usuario
    Route::post('inviteUser/{id}', [userController::class, 'inviteUser']);
    //Listar posts nos perfis
    Route::get('profilePosts/{id}', [postController::class, 'profilePosts']);
    //Like e dislike
    Route::post('like/{id}',[userController::class, 'like']);
    Route::post('dislike/{id}',[userController::class, 'dislike']);


});
