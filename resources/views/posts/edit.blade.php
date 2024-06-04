@extends('layouts.main')
@section('content') 
        <h1>Редактировать пост</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="post">
        <input type="submit" name="_token" value="{{ scrf_token() }}">
            @method('patch')
            <div class="form-group">
                <label for="text">Заголовок</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Введите заголовок" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="text">Статья</label>
                <textarea class="form-control" id="text" name="inputText" placeholder="Введите комментарий" name="text" value="{{ $post->text }}"></textarea>
            </div>
            <input type="hidden" name="users_id" value="{{ $post->users_id }}">
            <button type="submit" class="btn btn-primary">Схранить изменения</button>
        </form>
@endsection