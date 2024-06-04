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

    public function create()
    {
        $comments = Comment::all();

        return view('comments.create');
    }

   
    public function store(StoreCommentRequest $request, Post $post)
    {
        $data = $request->validated();

        $user = Auth::user();

        $comment = new Comment;
        $comment->text = $data['text'];
        $comment->users_id = $user->id;
        $comment->post->id = $post->id;
        $comment->save();

        return redirect()->route('posts.show', $post->id);

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
        $Users_id = $comment->users_id;

        return redirect()->route('posts.show');
    }
}
