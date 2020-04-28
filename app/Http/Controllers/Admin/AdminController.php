<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //      $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $num_posts = Post::count();
        $num_users = User::count();
        $num_tags = Tag::count();
        $num_categories = Category::count();

        return view('admin.dashboard',[
            'num_posts' =>  $num_posts,
            'num_users' =>  $num_users,
            'num_tags' =>  $num_tags,
            'num_categories' =>  $num_categories,
        ]);

    }


}
