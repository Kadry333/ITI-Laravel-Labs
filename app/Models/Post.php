<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'created_at',
        'image',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    

    public function setImageAttribute($file)
    {
        if ($file instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['image'] = $file->store('posts', 'public');
        } else {
            $this->attributes['image'] = $file;
        }
    }
}
