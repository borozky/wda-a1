<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;
use App\Comment;

class User extends Model
{
    protected $fillable = ["email"];
    
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
