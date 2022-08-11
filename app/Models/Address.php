<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['uid', 'country'];

    public function owner() {
        // if foreign key is not specified, it will be name of function + _id (e.g. owner_id)
        return $this->belongsTo(User::class, 'uid', 'user_id');
    }
}
