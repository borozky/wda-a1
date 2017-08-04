<ul class="nav navbar-nav navbar-right">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/faq') }}">FAQ</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ url('/tickets') }}">View all tickets</a></li>
            @if( ! empty(session("staff_email")))
                <li><a href="{{ url('/logout') }}">Logout</a></li>
            @endif
        </ul>
    </li>
    <li class="hidden-xs">
        <a href="{{ url('/tickets/create') }}" id="CreateTicket" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Create a ticket</a>
    </li>
</ul>