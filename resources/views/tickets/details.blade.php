@extends("shared.layout")

@section("title", "Ticket Details - ITS Ticketing System")

@section("site-content")
<div id="TicketDetailsArea">

    <br/>
    
    @include("errors.validation-errors")
    
    @if(isset($ticket) && !empty($ticket))

        <h4>Details</h4>
        <div class="ticket-details">
            {{ $ticket->details }}
        </div>
        <hr/>

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
                <td>Status</td>
                <td>
                    <span class="status-{{ str_replace(' ', '_', strtolower($ticket->status)) }}">
                        {{ ucwords($ticket->status) }}
                    </span>
                </td>
            </tr>
        </table>
        <hr/>
        
        <div class="ticket-comments">
            <b>Comments</b><br/>
            @if( count($ticket->comments) > 0)
                <ul class="comments">
                    @foreach($ticket->comments()->orderBy("created_at", "DESC")->get() as $comment)
                        <li class="comment">
                            <span class="commenter">By: {{ $comment->user->email }}</span> - <small><i>{{ $comment->created_at->diffForHumans() }}</i></small>
                            <span class="comment-details">{{ $comment->details }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <span class="ticket-comment-emptymessage">There are no comments for this ticket</span>
            @endif
        </div>
        <hr/>

        <form method="POST" action="{{ url('/tickets/' . $ticket->id . '/comments') }}">
            {{ csrf_field() }}
            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

            <h4>Add Comment</h4>

            <table>
                <tr>
                    <td><label for="TicketCommenter">Email</label></td>
                    <td><input type="email" name="email" value="{{ old('email', '') }}"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="TicketComment">Comment</label><br/>
                        <textarea name="details" id="TicketComment" cols="30" rows="5">{{ old('details', '') }}</textarea>
                    </td>
                </tr>
            </table>
            

            <div class="ticket-actions">
                <label>Mark ticket as</label><br />
                <input type="submit" name="status" value="pending" class="btn btn-xs status-pending"/>
                <input type="submit" name="status" value="in progress" class="btn btn-xs status-in_progress"/>
                <input type="submit" name="status" value="unresolved" class="btn btn-xs status-unresolved"/>
                <input type="submit" name="status" value="resolved" class="btn btn-xs status-resolved"/><br/><br/>
                <input type="submit" value="Add comment">
            </div>
            
        </form>
    @endif
</div>
@endsection
