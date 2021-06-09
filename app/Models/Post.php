<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body'
    ];

   public function likesBy(User $user)
   {
       return $this->likes->contains('user_id',$user->id);
   }

    // create relation ship between Post model and User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

 
}
 