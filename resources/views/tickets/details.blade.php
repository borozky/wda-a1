@extends("shared.layout")

@section("title", "Ticket Details - ITS Ticketing System");

@section("site-content")
<div id="TicketDetailsArea">

    <br/>
    
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
        <hr/>
        <h4>Details</h4>
        <div class="ticket-details">
            {{ $ticket->details }}
        </div>
        <hr/>

        <div class="ticket-comments">
            <b>Comments</b><br/>
            @if(!isset($ticket->comments) && empty($ticket->comments))
            <ul class="comments">
                @foreach($ticket->comments as $comment)
                    <li>{{ print_r($comment) }}</li>
                @endforeach
            </ul>
            @else
            <span class="ticket-comment-emptymessage">There are no comments for this ticket</span>
            @endif
        </div>
        <hr/>

        <form method="POST" action="url('/tickets')">
            {{ csrf_field() }}
            <label for="TicketComment">Add comment</label><br/>
            <textarea name="comment" id="TicketComment" cols="30" rows="5"></textarea><br/>

            <div class="ticket-actions">
                <label>Mark ticket as</label><br />
                
                <input type="radio" name="status" value="pending" checked="checked" id="MarkAsPending"/>
                <label for="MarkAsPending">Pending</label>
                &nbsp;
                <input type="radio" name="status" value="in-progress" id="MarkAsInProgress"/>
                <label for="MarkAsInProgress">In Progress</label>
                &nbsp;
                <input type="radio" name="status" value="unresolved" id="MarkAsUnresolved"/>
                <label for="MarkAsUnresolved">Unresolved</label>
                &nbsp;
                <input type="radio" name="status" value="resolved" id="MarkAsResolved"/>
                <label for="MarkAsResolved">Resolved</label>
                <br />
                <br />
                <input type="submit" value="Submit">
            </div>
        </form>
    @endif
</div>
@endsection
