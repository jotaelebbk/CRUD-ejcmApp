<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;




class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function createUser(Request $request){
        $this->name = $request->name;
        $this->email = $request->email;
        $this->contact = $request->contact;
        $this->lolUsername = $request->lolUsername;
        $this->lolEmail = $request->lolEmail;
        $this->password = bcrypt($request->password);
        $this->admin = $request->admin;
        $this->save();
    }
    
    
    
    public function updateUser(Request $request){
        if ($request->name){
            $this->name = $request->name;
        }
        if ($request->email){
            $this->email = $request->email;
        }
        if ($request->contact){
            $this->contact = $request->contact;
        }
        if ($request->lolUsername){
            $this->lolUsername = $request->lolUsername;
        }
        if ($request->lolEmail){
            $this->lolEmail = $request->lolEmail;
        }
        if ($request->password){
            $this->password = $request->password;
        }
        $this->save();

    }

    
    public function userInvites(){
        return $this->belongsToMany('App\Models\User', 'invites', 'makeInvite', 'invited' );
        }

    
    
    public function userInvited(){
         return $this->belongsToMany('App\Models\User', 'invites', 'invited', 'makeInvite' );
    }

     
    
    public function post(){
         return $this->hasMany('App\Models\Post');
    }

     
    
    public function event(){
         return $this->hasMany('App\Models\Event');
    }
    
    
    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }

    
    
    public function userFollower(){
        return $this->belongsToMany('App\Models\User','follows', 'following', 'follower');
    }


    public function userFollowing(){
        return $this->belongsToMany('App\Models\User','follows', 'follower', 'following');
    }


    public function likes(){
        return $this->belongsToMany('App\Models\Post', 'likes', 'user_id', 'post_id');
    }





}
