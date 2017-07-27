@extends("shared.layout")

@section("title", "Ticket Details - ITS Ticketing System");

@section("site-content")
<div id="TicketDetailsArea">
    <h3>Ticket details</h3>
    
    @if(isset($ticket) && !empty($ticket))
        <table class="ticket-information">
            <tr>
                <td>From</td>
                <td>{{ $ticket->firstname . " " . $ticket->lastname }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $ticket->email }}</td>
            </tr>
        </table>
        <h4>Description</h4>
        <div class="ticket-details">
            {{ $ticket->details }}
        </div>
        
        <hr/>
        
        <form method="POST" action="#">
            <label for="TicketComment">Add comment</label><br/>
            <textarea name="comment" id="TicketComment" cols="30" rows="5"></textarea><br/>
            <input type="submit" value="Add comment">
            
        </form>
        <div class="ticket-actions">
            
        </div>
    @endif
</div>
@endsection
