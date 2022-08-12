<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'commentable_id',
        'commentable_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id')
            ->withDefault([
                'name' => 'Guest'
            ]); // with default if user not found
    }

    public function commentable()
    {
        return $this->morphTo();
    }
    // subject same as commentable
    public function subject()
    {
        return $this->morphTo('commentable');
    }
}
