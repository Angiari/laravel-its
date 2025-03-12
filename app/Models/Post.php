<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Tag;

class Post extends Model
{
    use softDeletes;

    public function user(){
       return $this->belongsTo(User::class, 'user_id');
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
