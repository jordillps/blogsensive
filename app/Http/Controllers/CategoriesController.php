<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\User;

class CategoriesController extends Controller
{
    //
    public function show(Category $category){

        return view('pages.category', [
            'category' => $category->name,
            'posts' => $category->posts()->paginate(2),
            'categories' => Category::all(),
            'tags' => Tag::take(15)->get(),
            'writers' =>  User::role('Writer')->get(),
        ]);

    }
}
