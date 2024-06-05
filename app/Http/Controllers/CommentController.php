<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Controllers\StoreCommentRequest;
use App\Http\Requests\Controllers\UpdateCommentRequest;

class CommentController extends Controller
{

    public function create(Post $post)
    {
        $comments = Comment::all();

        return view('comments.create', compact('post'));
    }

   
    public function store(StoreCommentRequest $request, Post $post, Comment $comment)
    {
        $data = $request->validated();

        $user = Auth::user();

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => $user->id, 
            'comment' => $data['comment'],
        ]);
        return redirect()->route('posts.show', ['post' => $post->id]);

    }

    
    public function edit(Comment $comment)
    {
        $this->authorize('edit', $comment);
        $comments = Comment::all();

        return view('comments.edit', compact('comment', 'comments'));

    }

   
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        $comments = Comment::all();
        $data = $request->validated();
        $user = Auth::user();

        $comment->update($data);
        
        return redirect()->route('posts.show');
    }

    public function delete($commentId) 
    {
       $comment = Comment::find($commentId);
       if ($comment) {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('posts.show', ['comment' => $commentId]);
       } else {
        return redirect()->route('posts.show', ['comment' => $commentId])->with('error', 'Комментарий не найден');
       }
    }
    
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        $Users_id = $comment->user_id;

        return redirect()->route('posts.show');
    }
}
