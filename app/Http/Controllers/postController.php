<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class postController extends Controller
{
    public function createPost(Request $request){
        $post = new Post;
        $post->createPost($request);
        return response()->json(['Sucesso' => $post]);
    }

    public function updatePost(Request $request, $id){
        $user = Auth::user();
        $post = Post::find($id);
        if ($post->user_id == $user->id)
        {$post->updatePost($request);
        return response()->json(['Sucesso' => $post]);}
        else {
        return response()->json('Erro', 403);
        }
    }

    public function readPosts (Request $request){
        $post = Post::all();
        return response()->json(['Sucesso' => $post]);
    }


    public function readFollowingPosts (){
        $count = 0;
        $user = Auth::user();
        $following = $user->userFollowing()->get(['following']);
        foreach ($following as $id) {
          $posts = Post::whereHas('user', function(Builder $query) use($id){
          $query->where('user_id', '=', $id->following);
          })->get();
          $todosOsPosts[$count] = $posts;
          $count++;
          }

        return response()->json([$todosOsPosts]);
    }


    public function readPost (Request $request, $id){
        $post = Post::find($id);
        return response()->json(['Sucesso' => $post]);
    }


    public function deletePost ($id){
        $user = Auth::user();
        $post = Post::find($id);
        if ($post->user_id == $user->id || $user->admin == 1)
        {Post::destroy($id);
        return response()->json(['Sucesso']);}
        else {
        return response()->json('Erro', 403);
        }
    }


      


}
