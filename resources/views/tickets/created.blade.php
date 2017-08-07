@extends("shared.layout")

@section("title", "Ticket Details - ITS Ticketing System");

@section("site-content")
<div id="TicketDetailsArea">
    
    <div class="alert alert-success">
        <div class="container">
            <h3>The ticket has been submitted</h3>
        </div>
    </div>
    
    <table class="ticket-information">
        <tr>
            <td>From</td>
            <td>{{ $ticket->firstname . " " . $ticket->lastname }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $ticket->email }}</td>
        </tr>
        <tr>
            <td>Operating System</td>
            <td>{{ $ticket->operating_system }}</td>
        </tr>
        <tr>
            <td>Software Issue</td>
            <td>{{ $ticket->software_issue }}</td>
        </tr>
    </table>
    
    <h4>Description</h4>
    <div class="ticket-details">
        {{ $ticket->details }}
    </div>
    
</div>
@endsection
