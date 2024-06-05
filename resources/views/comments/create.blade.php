@extends('layouts.main')
@section('content')
    <div class="mt-4">
        <h1>Добавить Комментарий</h1>
        <form action="{{ route('comments.store', ['post' => $post->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="inputText">Комментарий</label>
                <textarea class="form-control" id="inputText" name="comment" placeholder="Введите комментарий"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Добавить комментарий</button>
        </form>
    </div>
@endsection
