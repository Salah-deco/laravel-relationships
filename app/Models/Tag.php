<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];

    // //? many to many relationship Tag hasMany Posts
    // public function posts() 
    // {
    //     return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    // }

    //! many to many relationship Tag hasMany Posts with Polymorphic relationship
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable', 'taggables'); // second parameter is pivot table name
    }
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable', 'taggables');
    }
}
