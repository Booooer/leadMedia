@extends('layouts.app')
@section('title','Все посты')
@section('content')
{{-- modals --}}
@include('layouts.auth_modal')
{{--  --}}
<div class="content">
    <div class="container">
        <h1 class="m-5 pt-4">{{ $post->name }}</h1>
        <div class="post d-flex justify-content-start">
            <img class="rounded" src={{ asset("storage/img/$post->img") }} alt="{{$post->name}}">
            <div class="p-4">
                <p><span class="fw-bold">Описание:</span> {{ $post->description }}</p>
                <p><span class="fw-bold">Автор:</span> {{ $post->user->name }}</p>
                <p><span class="fw-bold">Последняя правка:</span> {{ $post->updated_at }}</p>
                <p class="d-flex">
                    <span class="fw-bold">Теги: &nbsp;</span>
                    @foreach ($post->tags as $tag)
                        <span class="badge bg-primary text-wrap">{{ $tag->name }}</span>&nbsp;
                    @endforeach
                </p>
            </div>
        </div>
        <a href="/"><button type="button" class="btn btn-info m-3">На главную</button></a>
    </div>
</div>
@endsection

