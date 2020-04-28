<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'body','author','author_email', 'post_id'
     ];

    public function reply(){ //$comment->reply
        return $this->hasOne(Reply::class);
    }

}
