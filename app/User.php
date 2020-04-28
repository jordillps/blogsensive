<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable

{
     use Notifiable;
     use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts(){
        return $this->hasMany(Post::class);
    }




    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }


    public function scopeAllowed($query){

        if(auth()->user()->can('view',auth()->user(),$this))
        {
           return $query;
        }

        return $query->where('id', auth()->id());

    }


    public function getRolesDisplayNames(){

        // return $this->roles->pluck('display_name')->implode(', ');
        return $this->roles->pluck('display_name');
    }




}
