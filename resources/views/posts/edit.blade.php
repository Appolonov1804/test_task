@extends('layouts.main')

@section('content')
    <h1>Редактировать пост</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="inputTitle">Заголовок</label>
            <input type="text" class="form-control" id="inputTitle" placeholder="Введите заголовок" name="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="inputText">Статья</label>
            <textarea class="form-control" id="inputText" name="text" placeholder="Введите комментарий">{{ $post->text }}</textarea>
        </div>
        <input type="hidden" name="user_id" value="{{ $post->user_id }}">
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection
