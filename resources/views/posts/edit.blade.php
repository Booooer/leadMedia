@php
    $user = Auth::user();
@endphp
@extends('layouts.app')
@section('title','Профиль')
@section('content')
<div class="profile">
    <div class="container">
        <h1 class="text-center p-3">Изменение поста</h1>
        <a href="/"><button type="button" class="btn btn-info m-3">На главную</button></a>
        <a href={{ route('profile') }}><button type="button" class="btn btn-info m-3">В профиль</button></a>
        <div class="post-actions d-flex flex-column">
            <form action={{ route('posts.update',$post) }} method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Тема поста(больше 3 символов)</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $post->name }}" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Описание поста(больше 12 символов)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="description" required>{{ $post->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Выберите тэги</label>
                    <select class="form-select" name="tags[]" aria-label="Default select example" multiple required>
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                      </select>
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
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
      </div>
    </div>
</div>
@endsection
