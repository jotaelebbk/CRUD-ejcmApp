<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class Post extends Model
{
    public function createPost(Request $request){
        $user = Auth::user();
        $this->user_id=$user->id;
        $this->bodyText = $request->bodyText;
        $this->media = $request->media;
        $this->like = $request->like;
        $this->comment = $request->comment;
        $this->retweet = $request->retweet;
        $this->save();
    }

    
    
    
    public function updatePost(Request $request){
        if ($request->bodyText){
            $this->bodyText = $request->bodyText;
        }
        if ($request->media){
            $this->media = $request->media;
        }
        if ($request->like){
            $this->like = $request->like;
        }
        if ($request->comment){
            $this->comment = $request->comment;
        }
        if ($request->retweet){
            $this->condition = $request->condition;
        }
        $this->save();
    }

    
    
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }


    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }


    public function userLikes(){
        return $this->belongsToMany('App\Models\User', 'likes', 'post_id', 'user_id');
    }


}
