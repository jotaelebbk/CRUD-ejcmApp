<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Auth;


class userController extends Controller
{
    public function createUser(Request $request){
        $user = new User;
        $user->createUser($request);
        return response()->json(['Sucesso' => $user]);
    }
    
    
    
    public function updateUser(Request $request, $id){
        $user = User::find($id);
        $user->updateUser($request);
        return response()->json(['Sucesso' => $user]);
    }
    
    
    
    public function readUsers (Request $request){
        $user = User::all();
        return response()->json(['Sucesso' => $user]);
    }
    
    
    
    public function readUser (Request $request, $id){
        $user = User::find($id);
        return response()->json(['Sucesso' => $user]);
    }
    
    
    
    public function deleteUser (Request $request, $id){
        User::destroy($id);
        return response()->json(['Sucesso']);
    }


    
    
    public function searchUser ($name){
      $user = User::where('name','=',$name)->get();
      return response()->json([$user]);
    }

  
  
  
    public function followUser ($id){
    $user = Auth::user();
    $user->userFollowing()->attach($id);
    return response()->json(['Sucesso', 200]);
  }
  
  
  
  public function unfollowUser ($id){
    $user = Auth::user();
    $user->userFollowing()->detach($id);
    return response()->json(['Sucesso', 200]);
  }


  public function inviteUser ($id){
    $user = Auth::user();
    $user->userInvites()->attach($id);
    return response()->json(['Sucesso', 200]);
  }

//Lista das pessoas que o usuario segue
  public function following ($id){
    $user = User::find($id);
    $following = $user->userFollowing()->get();
    return response()->json([$following]);
  }


  //Lista das pessoas que seguem o usuario
  public function follower ($id){
    $user = User::find($id);
    $follower = $user->userFollower()->get();
    return response()->json([$follower]);


  }
  public function like($id){
    $user = Auth::user();
    $user->likes()->attach($id);
    $post = Post::find($id);
    $post->like++;
    $post->save();  
    return response()->json(['Sucesso', 200]);

  }

  public function dislike($id){
    $user = Auth::user();
    $user->likes()->detach($id);
    $post = Post::find($id);
    $post->like--;
    $post->save();
    return response()->json(['Sucesso', 200]);
  }

  


}
