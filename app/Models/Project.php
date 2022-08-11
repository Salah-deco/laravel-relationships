<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title'    
    ];

    public function users() 
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }

    public function tasks() 
    {
        return $this->hasManyThrough(
            Task::class, 
            Team::class, 
            'project_id', 
            'user_id', 
            'id', 
            'user_id');
    }

    public function task()
    {
        return $this->hasOneThrough(
            Task::class, 
            Team::class, 
            'project_id', 
            'user_id', 
            'id', 
            'user_id'
        );
    }
}
