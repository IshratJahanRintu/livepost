<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'body' => 'array'
    ];

    protected $fillable=[
        'title',
        'body',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }


    public function users()
    {
        return $this->belongsToMany(User::class, "post_user", 'post_id', 'user_id');
    }
    public function getTitleUpperAttribute($value)
    {
        return strtoupper($this->title);
    }
}
