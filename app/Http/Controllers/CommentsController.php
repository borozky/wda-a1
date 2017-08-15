<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Comment;
use App\User;

class CommentsController extends Controller
{
    // POST: /tickets/{id}/comments
    public function store(Request $request, $id){
        
        // will run when trying to update the status of the ticket
        if($request->exists("status")){
            return $this->updateTicketStatus($request, $id);
        }
        
        $this->validate($request, [
            "details" => "required",
            "ticket_id" => "required|exists:tickets,id",
            "email" => "required|email"
        ]);

        // create the comment, commenters email will be saved to DB if doesn't exists
        // USERS table are required according to A1 specs
        $comment = new Comment;
        $comment->details = $request->details;
        $comment->ticket_id = $request->ticket_id;
        $user = $this->createAndGetUser($request->email);
        $comment->user_id = $user->id;

        if($comment->save()){
            return back()->with("success", "Successfully added comment");
        }
        
        return back()->with("danger", "Failed to insert comment");
    }


    private function updateTicketStatus(Request $request, $id){
        $this->validate($request, [
            "ticket_id" => "required|exists:tickets,id",
            "status" => "required"
        ]);

        $ticket = Ticket::find((int) $id);
        $ticket->status = $request->status;
        if($ticket->save()){
            return back()->with("success", "Ticket is now marked as " . strtoupper($request->status));
        }
        return back()->with("danger", "Ticket status failed to update");
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
