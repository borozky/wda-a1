@extends("shared.layout")

@section("site-content")

@section("entry-header")
    <div class="entry-header">
        <div class="container">
            <h3 class="entry-title">Submit a new ticket</h3>
        </div>
    </div>
@endsection

<div id="CreateTicketArea">
<!-- // user email, first and last names, email, operating system being used, software issue and a comment textearea to describe the issue -->

    @include("errors.validation-errors")

    <form action="{{ url('/tickets') }}" method="POST" enctype="multipart/form-data" style="display:inline-block" novalidate="novalidate">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="TicketEmail">Your email</label><br/>
            <input type="email" name="email" id="TicketEmail" class="form-control input-xs" value="{{ old('email', '') }}" required>
        </div>

        <div class="form-group">
            <label for="TicketFirstName">Firstname</label>
            <input type="text" name="firstname" id="TicketFirstName" class="form-control input-xs"  value="{{ old('firstname', '') }}" required>
        </div>

        <div class="form-group">
            <label for="TicketLastName">Last name</label>
            <input type="text" name="lastname" id="TicketLastName" class="form-control input-xs"  value="{{ old('lastname', '') }}" required>
        </div>

        <div class="form-group">
            <label for="TicketOperatingSystem">Operating System</label>
            <select name="operating_system" id="TicketOperatingSystem" class="form-control input-xs" >
                <option value="-" selected="selected">-- Select OS --</option>
                <option value="windows">Windows</option>
                <option value="mac">Mac</option>
                <option value="lunux">Linux</option>
            </select>
        </div>

        <div class="form-group">
            <label for="TicketSoftwareIssue">Software Issues</label>
            <select name="software_issue" id="TicketSoftwareIssue" class="form-control input-xs" >
                <option value="-" selected="selected">-- Select Common Issues --</option>
                <option value="12323">PHPStorm</option>
                <option value="12324">Cloud 9 Setup</option>
                <option value="12325">Laravel Setup</option>
            </select>
        </div>

        <div class="form-group">
            <label for="TicketComment">Details</label><br>
            <textarea name="details" class="form-control input-xs"  id="TicketComment" rows="5" placeholder="Your ticket details" required>{{ old('details', '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="TicketImages">Images</label><br/>
            <input type="file" name="images" multiple="multiple" id="TicketImages" style="display: inline-block;width: 100%;"/>
        </div>

        <p style="text-align:right">
            <input type="submit" value="Submit ticket" class="btn btn-success">
        </p>
    </form>
</div><!-- end #CreateTicketArea -->

@endsection

@section("footer-scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script>
        $(function(){
            $("form").validate();
        });
    </script>
@endsection