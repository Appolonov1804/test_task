@extends('layouts.main')

@section('content')

<div>
    @if($posts->count())
        <ul>
        @foreach($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            <a href="{{ route('comments.create', $post->id) }}">Оставить комментарий</a>
        </li>
        @endforeach
        </ul>
    @else 
    <p>Постов пока нет</p>
    @endif
</div>


@endsection
