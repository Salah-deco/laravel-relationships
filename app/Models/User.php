<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'project_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address() {
        // return $this->hasOne(Address::class); //? SELECT * FRPOM addresses WHERE addresses.user_id = id (DEFAULT)
        // return $this->hasOne(Address::class, 'uid'); //? SELECT * FROM addresses WHERE addresses.uid = users.id
        return $this->hasOne(Address::class, 'uid', 'user_id'); //? SELECT * FROM addresses WHERE addresses.uid = users.user_id
    }

    //? One to many relationship User hasMany Address
    public function addresses() {
        return $this->hasMany(Address::class, 'uid', 'user_id');
    }

    //? One to many relationship User hasMany Posts   
    public function posts() {
        return $this->hasMany(Post::class, 'user_id', 'user_id');
    }

    public function project() 
    {
        return $this->belongsTo(Project::class);
    }
    public function tasks() 
    {
        return $this->hasMany(Task::class, 'user_id', 'user_id');
    }
}
