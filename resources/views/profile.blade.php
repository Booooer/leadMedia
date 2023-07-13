@php
    $user = Auth::user();
@endphp
@extends('layouts.app')
@section('title','Профиль')
@section('content')
<div class="profile">
    <div class="container">
        <h1 class="p-3">Привет, {{$user->name}}</h1>
        <div class="profile-actions">
            <div class="d-flex mb-3">
                <a href={{ route('posts.create') }}><button type="button" class="btn btn-primary">Добавить пост</button></a>&nbsp;
                <a href={{ route('tags.create') }}><button type="button" class="btn btn-primary">Добавить тег</button></a>&nbsp;
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Изменение тэга
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach ($tags as $tag)
                        <li><a class="dropdown-item" href={{ route('tags.edit',$tag) }}>{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                  </div>
                  &nbsp;
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                      Удаление тэга
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        @foreach ($tags as $tag)
                        <form action={{ route('tags.destroy',$tag)}} method="post">
                            @csrf
                            @method('delete')
                            <li><button class="dropdown-item" type="submit">{{ $tag->name }}</button></li>
                        </form>
                        @endforeach
                    </ul>
                  </div>
            </div>
            <a href="/"><button type="button" class="btn btn-info">На главную</button></a>
            <a href={{ route('logout') }}><button type="button" class="btn btn-danger">Выйти из аккаунта</button></a>
        </div>
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
                          <a href={{ route('posts.show', $post) }} class="card-link">Подробнее</a>
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
@endsection
