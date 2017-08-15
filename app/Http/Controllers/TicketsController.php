<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $operating_system = [
            "windows" => "Windows",
            "linux" => "Linux",
            "mac" => "Mac OS"
        ];
        
        $software_issues = [
            "c9 setup" => "Cloud 9 Setup"
        ];
        
        return view("tickets.create", compact("operating_system", "software_issues"));
    }


    // POST: /tickets
    public function store(Request $request){
        $this->validate($request, [
            "email"     => "required|email",
            "firstname" => "required",
            "lastname"  => "required|min:2",
            "details"   => "required|min:10"
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
