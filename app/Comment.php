<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;
use App\User;

class Comment extends Model
{
    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
