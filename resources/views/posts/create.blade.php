@extends('layouts.main')
@section('content') 
        <h1>Добавить пост</h1>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="inputText">Заголовок</label>
                <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Введите заголовок">
            </div>
            <div class="form-group">
                <label for="inputText">Статья</label>
                <textarea class="form-control" id="inputText" name="text" placeholder="Введите текст"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Добавить статью</button>
        </form>
@endsection 