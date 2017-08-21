<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

use App\Ticket;
use App\Comment;
use App\User;

class CommentsController extends Controller
{
    
    // POST: /tickets/{id}/comments
    public function store(CommentRequest $request, $id){

        $comment = new Comment;
        $comment->details = $request->details;
        $comment->ticket_id = $request->ticket_id;
        
        // save email information in the users table, then associate the user email to the comment
        $user = $this->createAndGetUser($request->email);
        $comment->user_id = $user->id;

        if($comment->save()){
            return back()->with("success", "Successfully added comment");
        }
        
        return back()->with("danger", "Failed to insert comment");
    }

    private function createAndGetUser($email){
        $user = User::where("email", $email)->first();

        if($user == null){
            $user = new User;
            $user->email = $email;
            $user->save();
        }

        return $user;
    }
}
