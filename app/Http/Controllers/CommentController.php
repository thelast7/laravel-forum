<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function addComment(Request $request, Forum $forum)
    {
    	$request->validate([
    		'content' => 'required|min:3'
    	]);
    	$comment = New Comment;
    	// $commentCount = Comment::count();
    	$comment->user_id = Auth::user()->id;
    	$comment->content = $request->content;

    	$forum->comments()->save($comment);
        return back()->withInfo('Komentar telah ditambahkan');

    	// return redirect()->route('forum.show', $forum->slug)->withInfo('Komentar berhasil ditambahkan');
    }

    public function replyComment(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|min:3'
        ]);
        $reply = New Comment;
        // $commentCount = Comment::count();
        $reply->user_id = Auth::user()->id;
        $reply->content = $request->content;

        $comment->comments()->save($reply);

        return back()->withInfo('Komentar balasan telah ditambahkan');
        // return redirect()->route('reply.show', $reply->slug)->withInfo('Komentar balasan berhasil ditambahkan');
    }
}
