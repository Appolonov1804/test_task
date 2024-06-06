<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
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

    public function store(StorePostsRequest $request, Post $post) 
    {
        $posts = Post::all();
        $data = $request->validated();

        $user = Auth::user();

        $post = $user->posts()->create($data);

        redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function main(Post $post) 
    {   
        $posts = Post::all();

        return view('posts.main', compact('posts'));
    }

    public function show(Post $post) 
    {
        $this->authorize('view', $post);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
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

        return redirect()->route('posts.show', ['post' => $post->id]);
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

    public function destroy(Post $post, $postId)  
    {
        $this->authorize('delete', $post);
        $post->delete();
        $users_id = $post->user_id;

        return redirect()->route('posts.show', ['post' => $postId]);
    }


}
