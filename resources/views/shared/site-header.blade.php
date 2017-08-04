<nav class="navbar">
    <div id="Navtop" class="visible-xs">
        <div class="container">
            <a href="{{ url('/tickets/create') }}" class="btn btn-xs btn-success pull-right"><i class="fa fa-plus"></i>&nbsp; Create a ticket</a>
        </div>
    </div>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand">ITS Ticketing System</a>
        </div>
        <div id="Navbar" class="collapse navbar-collapse">
            @include("shared.site-navigation")
        </div><!--/.nav-collapse -->
    </div>
</nav>