<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    public function createEvent(Request $request){
        $this->teams = $request->teams;
        $this->numberOfTeams = $request->numberOfTeams;
        $this->eventName = $request->eventName;
        $this->category = $request->category;
        $this->eventPrivacy = $request->eventPrivacy;
        $this->save();
    }

    
    
    
    public function updateEvent(Request $request){
        if ($request->teams){
            $this->teams = $request->teams;  
        }
        if ($request->numberOfTeams){
            $this->numberOfTeams = $request->numberOfTeams;
        }
        if ($request->eventName){
            $this->eventName = $request->eventName;
        }
        if ($request->category){
            $this->category = $request->category;
        }
        if ($request->eventPrivacy){
            $this->eventPrivacy = $request->eventPrivacy;
        }
        $this->save();
    }
    
    
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    
}
