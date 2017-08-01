<div class="site-navigation">
    <div class="container">
        <ul>
            <li><a href="{{ url('/') }}">Home Page</a></li>
            <li><a href="{{ url('/faq') }}">FAQ</a></li>
            @if(session()->exists("staff_email"))
                <li>Logged in as {{ session("staff_email") }}</li>
                <li><a href="{{ url('/logout') }}">Exit</a></li>
            @endif
        </ul>
    </div>
</div>