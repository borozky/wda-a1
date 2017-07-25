<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>ITS Ticketing System</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css" />
        <link rel="stylesheet" href="{{ asset('style.css', env('REDIRECT_HTTPS')) }}" />
        @yield("head-scripts")
    </head>
    <body>
        <div class="site-wrapper">
            <div class="site-header">
                @include("shared/site-header")
            </div>
            <div class="site-content">
                @yield("site-content")
            </div>
            <div class="site-footer">
                @include("shared/site-footer")
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        @yield("footer-scripts")
    </body>
</html>