@php
    $user = Auth::user();
@endphp
@extends('layouts.app')
@section('title','Профиль')
@section('content')
<div class="profile">
    <div class="container">
        <h1 class="text-center p-3">Добавление постов</h1>
        <a href="/"><button type="button" class="btn btn-info m-3">На главную</button></a>
        <a href={{ route('profile') }}><button type="button" class="btn btn-info m-3">В профиль</button></a>
        <div class="post-actions d-flex flex-column">
            <form action={{ route('posts.store') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Тема поста(больше 3 символов)</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Описание поста(больше 12 символов)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Выберите тэги</label>
                    <select class="form-select" name="tags[]" aria-label="Default select example" multiple required>
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Фото поста</label>
                    <input class="form-control" type="file" id="formFile" name="image" required accept=".png,.jpg,.jpeg">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        <div class="messages text-center mt-3">
            @if(session("message"))
                <p class="alert alert-success" role="alert">{{ session("message") }}</p>
            @endif
        </div>
        <div class="errors text-center mt-3">
            @if ($errors->all())
              @foreach ($errors->all() as $error)
                  <p class="alert alert-danger" role="alert">{{ $error }}</p>
              @endforeach
            @endif
            @error('error')

            @enderror
        </div>
        <div>
            <h2 class="text-center p-3">Ваши посты</h2>
            <div class="posts d-flex justify-content-center col-sm-12 flex-wrap">
                @foreach ($user->posts as $post)
                <div class="col-sm-4">
                    <div class="card w-75 mb-3">
                        <img src={{ asset("img/$post->img") }} class="card-img-top" alt={{ $post->name }}>
                        <div class="card-body">
                          <h5 class="card-title text-dark">{{ $post->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Автор: {{ $post->user->name }}</li>
                        </ul>
                        <div class="card-body text-center">
                          <a href="#" class="card-link">Подробнее</a>
                          <a href={{ route('posts.edit', $post) }} class="card-link">Изменить</a>
                          <form action="{{ route('posts.destroy', $post) }}" method="get">
                            @csrf
                            @method('delete')
                            <button type="button" value={{$post->id}} class="btn-delete btn btn-danger">Удалить</button>
                          </form>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
