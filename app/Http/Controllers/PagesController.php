<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Mail\ContactForm;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class PagesController extends Controller
{


    public function home()
    {

        //carreguem  totes les relacions en la consulta
        $posts = Post::with(['category','tags', 'owner', 'photos'])
        ->latest('published_at')
        ->paginate(2);

        //$posts = $query->paginate(2);
        // $posts = Post::paginate(2);

        //Per veure els mesos en espanyol
        DB::statement("SET lc_time_names = 'es_ES'");

        $categories = Category::all();
        $tags = Tag::all();
        $writers = User::role('Writer')->get();

        return view('pages.home', compact('posts','categories','tags', 'writers'));
    }


    public function contact(){

        return view('pages.contact');
    }


    public function contactform(Request $request){

        //Validation
        $this->validate($request,[
            'name' => 'required|min:3',
            'email'=> 'required|email',
            'subject'=> 'required|min:3',
            'message' => 'required|min:5',
        ]);

        $user_admin = User::with(['roles' => function($q){
            $q->where('name', 'Admin');
        }])->firstOrFail();


        \Mail::to($user_admin)->send(new ContactForm(
            $request['name'],
            $request['email'],
            $request['subject'],
            $request['message']));

        return back()->with('flash', trans("pages.messagesendcorrectly"));

    }





}
