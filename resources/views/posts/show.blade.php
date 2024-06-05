@extends('layouts.main')

@section('content')
    <div>
        <a href="{{ route('posts.edit', $post->id) }}">Редактировать</a>
    </div>
    <div>
        <form action="{{ route('posts.delete', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-danger">
        </form>
    </div>
    <div>
        <div>{{ $post->title }}. {{ $post->text }}</div>
    </div>

    <div class="mt-4">
        <h4>Комментарии:</h4>
        @if ($post->comments->count() > 0)
            <ul>
                @foreach ($post->comments as $comment)
                    <li>
                        {{ $comment->comment }}
                        @if($comment->users_id === auth()->id())
                            <div>
                                <a href="{{ route('comments.edit', $comment->id) }}">Редактировать</a>
                            </div>
                            <div>
                                <form action="{{ route('comments.delete', $comment->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Удалить">
                                </form>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>Комментариев пока нет.</p>
        @endif
    </div>
@endsection
