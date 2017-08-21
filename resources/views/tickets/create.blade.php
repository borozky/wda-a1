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
    @include("errors.validation-errors")

    <form action="{{ url('tickets') }}" method="POST" style="display:inline-block" novalidate="novalidate">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="TicketEmail">Your email</label>
            <span class="required"></span>
            <input type="email" name="email" id="TicketEmail" class="form-control input-xs" value="{{ old('email', '') }}" required>
        </div>

        <div class="form-group">
            <label for="TicketFirstName">Firstname</label>
            <span class="required"></span>
            <input type="text" name="firstname" id="TicketFirstName" class="form-control input-xs"  value="{{ old('firstname', '') }}" required="required">
        </div>

        <div class="form-group">
            <label for="TicketLastName">Last name</label>
            <span class="required"></span>
            <input type="text" name="lastname" id="TicketLastName" class="form-control input-xs"  value="{{ old('lastname', '') }}" required="required" minlength="2">
        </div>

        <div class="form-group">
            <label for="TicketOperatingSystem">Operating System</label>
            <select name="operating_system" id="TicketOperatingSystem" class="form-control input-xs" >
                <option value="-" selected="selected">-- Select OS --</option>
                @foreach($operating_system as $item)
                    <option value="{{ $item }}"{{ old('operating_system') == $item ? " selected" : " " }}>{{ $item }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="TicketSoftwareIssue">Software Issues</label>
            <select name="software_issue" id="TicketSoftwareIssue" class="form-control input-xs" >
                <option value="-" selected="selected">-- Select Common Issues --</option>
                @foreach($software_issues as $item)
                    <option value="{{ $item }}"{{ old('software_issue') == $item ? " selected" : " " }}>{{ $item }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <span class="required"></span>
            <label for="TicketComment">Details</label><br>
            <textarea name="details" class="form-control input-xs"  id="TicketComment" rows="5" placeholder="Your ticket details" required="required" minlength="10">{{ old('details', '') }}</textarea>
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
        $(document).ready(function(){
            $("form").validate();
        });
    </script>
@endsection