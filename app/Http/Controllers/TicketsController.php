<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;
use App\Http\Requests\UpdateTicketStatusRequest;

use App\Ticket as Ticket;
use App\Comment;

class TicketsController extends Controller
{

    // GET: /tickets
    public function index(Request $request){
        $tickets = Ticket::orderBy("created_at", "DESC")->get();
        return view("tickets.index", ["tickets" => $tickets]);
    }
    

    // GET: /tickets/search
    public function search(Request $request){
        $tickets = [];
        if($request->has("search")){
            $tickets[] = Ticket::all()->first();
        }
        
        return view("tickets.search", ["tickets" => $tickets]);
    }
    

    // GET: /tickets/5
    public function details($id){
        $ticket = Ticket::find($id);

        return view("tickets.details", ["ticket" => $ticket]);
    }
    

    // GET: /tickets/create
    public function create(){
        $operating_system = ["Windows", "Mac OS", "Linux", "iOS", "Android OS", "other"];
        $software_issues = [
            "Google services setup", 
            "Service accounts", 
            "Telephone and voicemail",
            "Storage",
            "Cloud storage increase",
            "Wifi Setup",
            "Printing",
            "Equipment issues",
            "Lost item",
            "Misconfigured software",
            "other"];
        return view("tickets.create", compact("operating_system", "software_issues"));
    }


    // POST: /tickets
    public function store(TicketRequest $request){
        $ticket = new Ticket;
        $ticket->email = $request->email;
        $ticket->firstname = $request->firstname;
        $ticket->lastname = $request->lastname;
        $ticket->operating_system = $request->operating_system;
        $ticket->software_issue = $request->software_issue;
        $ticket->details = $request->details;
        
        if( $ticket->save() ){
            return view("tickets.created", compact("ticket"))->with("success", "Ticket has successfully created (ticket id: {$ticket->id})");
        }
        
        return back()->with("danger", "Something went wrong while submitting a ticket");;
    }
    
    
    public function updateTicketStatus(UpdateTicketStatusRequest $request, $id){
        $ticket = Ticket::find((int) $id);
        $ticket->status = $request->status;
        
        if( $ticket->save() ){
            return back()->with("success", "Ticket is now marked as " . strtoupper($request->status));
        }
        
        return back()->with("danger", "Ticket status failed to update");
    }


    
}
