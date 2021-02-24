<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class Comment extends Model
{
    public function createComment(Request $request, $post_id){
        $user = Auth::user();
        $this->user_id = $user->id;
        $this->post_id = $post_id;
        $this->bodyText = $request->bodyText;
        $this->media = $request->media;
        $this->save();
    }



    public function updateComment(Request $request){
        if ($request->bodyText){
            $this->bodyText = $request->bodyText;
        }
        if ($request->media){
            $this->media = $request->media;
        }
        $this->save();
    }



    public function user(){
        return $this->belongsTo('App\Models\User');
    }


    public function post(){
        return $this->belongsTo('App\Models\Post');
    }


}
