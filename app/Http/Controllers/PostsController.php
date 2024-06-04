<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Controllers\StorePostsRequest;
use App\Http\Requests\Controllers\UpdatePostsRequest;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Promise\Create;

class PostsController extends Controller
{
    public function create() 
    {
        $posts = Post::all();

        return view('posts.create', compact('posts'));
    } 

    public function store(StorePostsRequest $request) 
    {
        $data = $request->validated();

        $user = Auth::user();

    }

    public function show() 
    {
        $posts = Post::all();

        return view('posts.show', compact('posts'));
    }

    public function edit(Post $post)
    {
        $this->authorize('edit', $post);
        $posts = Post::all();

        return view('posts.edit', compact('post', 'posts'));
    }

    public function update(UpdatePostsRequest $request, Post $post) 
    {
        $this->authorize('update', $post);
        $posts = Post::all();
        $data = $request->validated();
        $user = Auth::user(); 

        $post->update($data);

        return redirect()->route('posts.show');
    } 

    public function delete($postId) 
    {
        $post = Post::find($postId);
        if ($post) {
            $this->authorize('delete', $post);
            $post->delete();
            redirect()->route('posts.show', ['post' => $postId]);
        } else {
            redirect()->route('posts.show', ['post' => $postId])->with('error', 'Запись не найдена');
        }
    }

    public function destroy(Post $post)  
    {
        $this->authorize('delete', $post);
        $post->delete();
        $users_id = $post->users_id;

        return redirect()->route('post.show');
    }


}
