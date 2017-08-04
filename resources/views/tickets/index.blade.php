@extends("shared.layout")
@section("title", "All Tickets - ITS Ticketing System")

@section("entry-header")
    <div class="entry-header">
        <div class="container">
            <h3 class="entry-title">All tickets</h3>
        </div>
    </div>
@endsection

@section("site-content")
<div id="TicketsIndexArea">

    @if(isset($tickets) && !empty($tickets))
        <table>
            
            <tr>
                <th>#</th>
                <th>Sender</th>
                <th>Details</th>
                <th>Status</th>
            </tr>
            
            @foreach($tickets as $key => $ticket)
                <tr>
                    <td>
                        <a href="{{ url('/tickets/' . $ticket->id) }}">{{ sprintf("%08d", $ticket->id) }}</a>
                    </td>
                    <td class="ticket-sender">
                        <b class="sender-fullname">{{ $ticket->firstname . " " . $ticket->lastname }}</b><br />
                        <i class="sender-email">{{ $ticket->email }}</i>
                    </td>
                    <td class="ticket-details">{{ $ticket->details }}</td>
                    <td class="ticket-status">
                        <span class="status-{{ str_replace(' ', '_', $ticket->status) }}">{{ $ticket->status }}</span><br/>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h4>There are currently no tickets available</h4>
    @endif
</div>
@endsection
