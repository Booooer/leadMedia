@extends('layouts.app')
@section('title','Все посты')
@section('content')
{{-- modals --}}
@include('layouts.auth_modal')
{{--  --}}
<div class="content">
    <div class="container">
        <h1 class="m-5 pt-4">Все посты</h1>
        <div class="posts d-flex justify-content-center col-sm-12 flex-wrap">
        @foreach ($posts as $post)
        <div class="col-sm-4">
            <div class="card w-75 mb-3">
                <img src={{ asset("storage/img/$post->img") }} class="card-img-top" alt={{ $post->name }}>
                <div class="card-body">
                  <h5 class="card-title">{{ $post->name }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Автор: {{ $post->user->name }}</li>
                </ul>
                <div class="card-body">
                  <a href={{ route('posts.show',$post) }} class="card-link">Подробнее</a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection

