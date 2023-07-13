<?php

namespace App\Services\Tag;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class Service
{
    public function store($request,$tag){
        $tag->create([
            "name" => $request->name,
            "slug" => Str::slug($request->name)
        ]);
    }

    public function update($request, $tag){
        $tag->update([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
        ]);
    }

    public function deleteImage($post){
        Storage::disk('public')->delete('img/'.$post->img);
    }
}
