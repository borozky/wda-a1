<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
    // GET: /tickets
    public function index(){
        return "all tickets";
    }

    // GET: /tickets/5
    public function details(){
        return view("tickets.details");
    }
    
    // GET: /tickets/create
    public function create(){
        return view("tickets.create");
    }

    // POST: /tickets
    public function store(Request $request){
        $this->validate($request, [
            "email" => "required|email",
            "firstname" => "required|min:2",
            "lastname" => "required",
            "comment" => "required"
        ]);

        $ticket = new Ticket();
        $ticket->email = $request->email;
        $ticket->firstname = $request->firstname;
        $ticket->lastname = $request->lastname;
        $ticket->operating_system = $request->operating_system;
        $ticket->software_issue = $request->software_issue;
        $ticket->description = $request->comment;

        if( $ticket->save() ){
            return redirect("/")->with("success", "Ticket has been added!");
        }

        // return back with errors by default
        return back()->with("danger", "Error has been occured when creating a ticket");
    }
    
}
