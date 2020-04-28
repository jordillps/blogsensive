<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\User;

class TagsController extends Controller
{
    //
    public function show(Tag $tag){

        return view('pages.tag', [
            'tag' => $tag->name,
            'posts' => $tag->posts()->paginate(2),
            'categories' => Category::all(),
            'tags' => Tag::take(15)->get(),
            'writers' =>  User::role('Writer')->get(),
        ]);
    }
}
