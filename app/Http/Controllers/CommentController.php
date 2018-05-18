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

    	return redirect()->route('forum.show', $forum->slug)->withInfo('Komentar berhasil ditambahkan');
    }
}
