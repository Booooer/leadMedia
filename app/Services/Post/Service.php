<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;

class Service
{
    public function store($request, $post){
        $new_post = $post->create([
            "name" => $request->name,
            "description" => $request->description,
            "img" => $request->file('image')->getClientOriginalName(),
            "user_id" => Auth::id()
        ]);

        $tags = Tag::find($request->tags);
        $new_post->tags()->attach($tags);
    }

    public function update($request, $post){
        $post = Post::find($post);
        $post->tags()->detach();

        $post->update([
            "name" => $request->name,
            "description" => $request->description,
        ]);

        $tags = Tag::find($request->tags);
        $post->tags()->attach($tags);

        return $post;
    }

    public function saveImage($request){
        $image_name = $request->file('image')->getClientOriginalName();
        $manager = new ImageManager(['driver' => 'imagick']);
        $image = $manager->make($request->file('image'))->crop(300,300);

        $image->save("storage/img/$image_name");
    }

    public function deleteImage($post){
        Storage::disk('public')->delete('img/'.$post->img);
    }

    public function test()
    {
        if(1 === 0)
        {

        }
    }
}
