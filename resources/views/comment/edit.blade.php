@extends('layouts.main')
@section('content') 
    <div class="mt-4">
        <h1>Редактировать Комментарий</h1>
        <form action="{{ route('comments.update', $comment->id) }}" method="post">
        <input type="submit" name="_token" value="{{ scrf_token() }}">
            @method('patch')
            <div class="form-group">
                <label for="text">Комментарий</label>
                <textarea class="form-control" id="text" name="text" placeholder="Введите комментарий">{{ $comment->text }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Схранить изменения</button>
        </form>
    </div>
@endsection