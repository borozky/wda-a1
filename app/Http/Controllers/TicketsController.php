<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
    public function index(){
        return "all tickets";
    }
    
    public function create(){
        return view("tickets.create");
    }
    
    // user email, first and last names, email, operating system being used, software issue and a comment textearea to describe the issue
    
}
