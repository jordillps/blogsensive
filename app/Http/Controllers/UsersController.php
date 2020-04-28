<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\User;

class UsersController extends Controller
{
    //
    public function show(User $user){

        return view('pages.writer', [
            'user' => $user->name,
            'posts' => $user->posts()->paginate(2),
            'categories' => Category::all(),
            'tags' =>  Tag::take(15)->get(),
            'writers'=> User::role('Writer')->get(),
        ]);

    }
}
