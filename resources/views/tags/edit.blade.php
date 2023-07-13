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
            <form action={{ route('tags.update',$tag) }} method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Тема поста(больше 3 символов)</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $tag->name }}" name="name" required>
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
        </div>
      </div>
    </div>
</div>
@endsection

