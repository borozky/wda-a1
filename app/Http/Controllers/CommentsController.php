<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $id){

        // will run when trying to update the status of the ticket
        if($request->exists("status")){
            return $this->updateTicketStatus($request, $id);
        }
        
        $this->validate($request, [
            "details" => "required",
            "ticket_id" => "required|exists:tickets,id",
            "status" => "required"
        ]);

        $comment = new Comment;
        $comment->details = $request->details;
        $comment->ticket_id = $id;
        $comment->user_id = 1;

        if( ! $comment->save()){
            return back();
        }

        $ticket = Ticket::find((int) $id);
        $ticket->status = $request->status;
        if($ticket->save()){
            return back()->with("success", "Successfully added comment");
        }

        return back()->with("danger", "Failed to insert comment");
  
    }

    public function updateTicketStatus(Request $request, $id){
        $this->validate($request, [
            "ticket_id" => "required|exists:tickets,id",
            "status" => "required"
        ]);

        $ticket = Ticket::find((int) $id);
        $ticket->status = $request->status;
        if($ticket->save()){
            return back()->with("success", "Ticket is now marked as { strtoupper($request->status) }");
        }
        return back()->with("danger", "Ticket status failed to update");
    }
}
