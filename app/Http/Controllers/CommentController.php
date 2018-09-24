<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Comment;

class CommentController extends Controller
{
    public function newComment(CommentFormRequest $request)
    {
    	Comment::create([
    		'content' => $request->content,
    		'post_id' => $request->post_id,
    		'post_type' => $request->post_type,
    	]);
        
    	// back(): redirect users back to the previous page
    	return redirect()->back()->with('status', 'Your comment has been created');
    }
}
