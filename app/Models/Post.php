<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id')
            ->withDefault([
                'name' => 'Guest'
            ]); // with default if user not found
    }

    // //? One to many relationship Post hasMany Tags
    // public function tags() {
    //     return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id') // second parameter is pivot table name
    //         ->using(PostTag::class)
    //         ->withTimestamps() // add created_at and updated_at columns
    //         ->withPivot('status'); // with pivot column status
    //     // return $this->belongsToMany(Tag::class);
    // }

    //! Many to many relationship Post hasMany Tags with Polymorphic relationship
    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function comments() 
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function comment() 
    {
        return $this->morphOne(Comment::class, 'commentable')
                    ->latestOfMany();
    }
}
