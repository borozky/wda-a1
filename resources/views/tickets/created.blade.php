@extends("shared.layout")

@section("title", "Ticket Details - ITS Ticketing System")

@section("site-content")
<div id="TicketDetailsArea">
    
    <h3>Ticket successfully created</h3>
    <p>Your ticket id is <b><a href="{{ url('/tickets/' . $ticket->id) }}">{{ $ticket->id }}</a></b></p>
    
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
