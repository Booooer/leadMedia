<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Intervention\Image\ImageManager;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "password",
        "slug",
        "description",
        "img",
        "user_id"
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
