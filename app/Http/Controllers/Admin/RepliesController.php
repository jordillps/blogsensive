<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Reply;
use App\Http\Requests\StoreReplyRequest;

class RepliesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(StoreReplyRequest $request, Comment $comment)
     {


        $request->validated();


        $reply = Reply::create([

            'body' => $request->get('reply'),
            'comment_id' => $comment->id,
            'user_id' => auth()->user()->id
        ]);

        $reply->save();

        return back()->with('flash', trans('global.commentreplied'));



     }


     public function destroy(Reply $reply)
    {
        //Borrem de la base de dades
        $reply->delete();

        return back()->with('flash', trans('global.deletedreply'));
    }
}
