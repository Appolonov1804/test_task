@extends('layouts.main')
@section('content') 
    <div class="mt-4">
        <h1>Добавить Комментарий</h1>
        <form action="{{ route('comments.store', $post) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="text">Комментарий</label>
                <textarea class="form-control" id="text" name="text" placeholder="Введите комментарий"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Добавить комментарий</button>
        </form>
    </div>
@endsection