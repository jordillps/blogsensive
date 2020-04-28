<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Reply;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use  Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{


    public function index()
    {
        //Option 1 Mostrar només els  posts de l'usuari autenticat
        //$posts = Post::where('user_id', auth()->id())->get();

        //option 2
        //$posts = auth()->user()->posts;


        if(auth()->user()->hasRole('Admin') || auth()->user()->hasPermissionTo('View Posts') ){
            $posts = Post::all();
        }else{
            $posts = auth()->user()->posts;
        }



        return view('admin.posts.index', compact('posts'));
    }


    // public function create()
    // {

    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('admin.posts.create',compact('categories','tags'));
    // }


    public function store(Request $request)
    {
        //Validation
        $this->validate($request,[
            'title' => 'required|min:5|unique:posts'
        ]);

    // $post = Post::create([
    //     'title' => $request->get('title'),
    //     'url' => Str::slug($request->get('title'))
    //     ]);

        $post = Post::create([

             'title' => $request->get('title'),
             'user_id' => auth()->id()

            ]);

        $url = Str::slug($post->title);

        if(Post::where('url', $url)->exists()){
            $url = $url . "-{$post->id}";
        }

        $post->url = $url;

        $post->save();

        return redirect()->route('admin.posts.edit',compact('post'));
    }

    public function edit(Post $post)
    {
        //'view' nom de la funció que volem autoritzar a PostPolicy
        $this->authorize('update', $post);

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit',compact('categories','tags', 'post'));
    }


    public function update(Post $post, UpdatePostRequest $request)
    {

        //'update' nom de la funció que volem autoritzar a PostPolicy
        $this->authorize('update', $post);

        //return $request->get('category_id');

        //Another option
        //$request->get('title');
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->quote = $request->quote;
        $post->body = $request->body;
        $post->iframe = $request->iframe;
        $post->published_at = $request->get('published_at');

        //Another option
        //$post->category_id = Category::find($request->category)
        $post->category_id = $request->get('category_id');
        $post->save();

        //Tags
        //option 1
        $tags = collect($request->get('tags'))->map(function($tag){
            return Tag::find($tag)
                ? $tag
                : Tag::create(['name'=> $tag])->id;
        });


        //Option 2

        //$tags = [];

        // foreach($request->get('tags')  as $tag){
        //     if(Tag::find($tag)){
        //         array_push($tags, $tag);
        //     } else {
        //         $tag_id = Tag::create(['name'=> $tag])->id;
        //         array_push($tags, $tag_id);
        //     }
        // }

        //Option 3

        // foreach($request->get('tags')  as $tag){
        //     $tags[] = Tag::find($tag)
        //         ? $tag
        //         : Tag::create(['name'=> $tag])->id;
        // }


        //Tags es la funció del model  Post
        $post->tags()->sync($tags);


        //Reply
        // foreach($request->get('replies')  as $reply){

        //     foreach ($post->comments as $comment) {
        //         if($comment->reply == null ){
        //             Reply::create([
        //                 'body'=> $reply,
        //                 'comment_id' => $comment->id,
        //                 'user_id' => $post->user_id,
        //             ]);
        //         }
        //     }

        // }

        return redirect()->route('admin.posts.edit',compact('post'))
                ->with('flash',trans('global.postsaved'));

    }

    //Opcio amb una funció de validació
    //utilitzem request
    //Validate functtion
    // public function validatePost($request){

    //     $this->validate($request,[
    //         'title' => 'required',
    //         'excerpt' => 'required',
    //         'body' => 'required',
    //         'category' => 'required',
    //         'tags' => 'required'
    //     ]);
    // }

    public function destroy(Post $post){

        //'delete' nom de la funció que volem autoritzar a PostPolicy
        $this->authorize('delete', $post);

        //Eliminem totes les etiquetes del post
        //que volem eliminar
        $post->tags()->detach();


        //Eliminem les fotos del post
        foreach($post->photos as $photo){

            $photo->delete();

            //Borrem del servidor
            $photoPath = str_replace('storage', 'public', $photo->url);
            Storage::delete($photoPath);
        }


        $post->delete();

        return redirect()->route('admin.posts.index')
        ->with('flash',trans('global.postdeleted)'));

    }


}
