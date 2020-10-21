<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    //

    protected $dates = ['published_at'];

    //Per carregar totes les dades quan fem una consulta
    //protected $with = ['category','tags', 'owner', 'photos'];

    protected $fillable = [
       'title','url','excerpt','quote','body','iframe','published_at','category_id', 'user_id'
    ];

    //si no volem utilitzar la id per a
    //mostrar el post
    function getRouteKeyName()
    {
        return 'url';
    }

    public function category(){ //$post->category->name
        return $this->belongsTo(Category::class);
    }

    public function tags(){ //$post->tag->name
        return $this->belongsToMany(Tag::class);
    }

    public function photos(){ //$post->photo->name
        return $this->hasMany(Photo::class);
    }


    public function owner(){ //$post->owner->name
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){ //$post->comment->body
        return $this->hasMany(Comment::class);
    }

    // Option 2
    // public function user(){ //$post->user->name
    //     return $this->belongsTo(User::class);
    // }


    //Exemple query scope
    function scopePublished($query){

        $query->whereNotNull('published_at')
        ->where('published_at', '<=', Carbon::now())
        ->latest('published_at');

    }

    //Mutador para calcular publiched_at
    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)
        ? $category
        : Category::create(['name'=> $category])->id;
    }

    public function isPublished(){

        return (bool) !is_null($this->published_at) && $this->published_at <= today();
    }

    //Mètode que s'utilitza per les politiques dels posts
    public function scopeAllowed($query){

        if(auth()->user()->can('view', $this))
        {
           return $query;
        }

        return $query->where('user_id', auth()->id());

    }

    public function scopeByYearAndMonth($query){

        return  $query->selectRaw('year(published_at) as year')
            ->selectRaw('monthname(published_at) as monthname')
            ->selectRaw('month(published_at) as month')
            ->selectRaw('count(*) posts')
            ->groupBy('year', 'monthname', 'month')
            ->orderByRaw('year(published_at)','monthname(published_at)', 'month(published_at)');

    }



}



