<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    //
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'url';
    }


    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    //Mutadores
    //Funciona quan fem un migrate: refresh
    public function setNameAttribute($name){

        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }
}
