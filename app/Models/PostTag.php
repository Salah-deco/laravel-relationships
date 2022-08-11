<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    use HasFactory;

    protected $table = 'post_tag';
    protected $fillable = [
        'post_id',
        'tag_id',
        'status'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            error_log('creating');
            $post = Post::find($model->post_id);
            $tag = Tag::find($model->tag_id);
            if ($tag == null || $post == null) {
                error_log('tag or post not found');
            }

            
            error_log('post: ' . $post->title);
            error_log('tag: ' . $tag->name);
        });
    
        static::created(function ($model) {
            error_log('created');
        });

        static::deleted(function ($model) {
            error_log('deleted');
        });
    }
}
