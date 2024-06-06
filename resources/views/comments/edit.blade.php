@extends('layouts.main')
@section('content') 
    <div class="mt-4">
        <h1>Редактировать Комментарий</h1>
        <form action="{{ route('comments.update', ['comment' => $comment->id, 'post' => $comment->post_id]) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="inputText">Комментарий</label>
                <textarea class="form-control" id="inputText" name="comment" placeholder="Введите комментарий">{{ $comment->comment }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
@endsection
