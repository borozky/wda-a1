<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket as Ticket;

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
        return view("tickets.create");
    }


    // POST: /tickets
    public function store(Request $request){
        $this->validate($request, [
            "email"     => "required|email",
            "firstname" => "required|min:2",
            "lastname"  => "required",
            "details"   => "required"
        ]);
        
        $ticket = new Ticket;
        $ticket->email = $request->email;
        $ticket->firstname = $request->firstname;
        $ticket->lastname = $request->lastname;
        $ticket->operating_system = $request->operating_system;
        $ticket->software_issue = $request->software_issue;
        $ticket->details = $request->details;
        
        if( $ticket->save() ){
            return view("tickets.created", ["ticket" => $ticket]);
        }
        
        return back();
    }


    
}
