@extends("shared.layout")

@section("site-content")

<div id="CreateTicketArea">
<!-- // user email, first and last names, email, operating system being used, software issue and a comment textearea to describe the issue -->
<h1>Submit a ticket</h1>

@include("errors.validation-errors")

<form action="{{ url('/tickets') }}" method="POST" enctype="multipart/form-data" style="display:inline-block">
    
    {{ csrf_field() }}
    
    <table>
        <tr>
            <td><label for="TicketEmail">Your email</label></td>
            <td><input type="email" name="email" id="TicketEmail" value="{{ old('email', '') }}"></td>
        </tr>
        <tr>
            <td><label for="TicketFirstName">Firstname</label></td>
            <td><input type="text" name="firstname" id="TicketFirstName" value="{{ old('firstname', '') }}"></td>
        </tr>
        <tr>
            <td><label for="TicketLastName">Last name</label></td>
            <td><input type="text" name="lastname" id="TicketLastName" value="{{ old('lastname', '') }}"></td>
        </tr>
        <tr>
            <td><label for="TicketOperatingSystem">Operating System</label></td>
            <td>
                <select name="operating_system" id="TicketOperatingSystem">
                    <option value="-" selected="selected">-- Select OS --</option>
                    <option value="windows">Windows</option>
                    <option value="mac">Mac</option>
                    <option value="lunux">Linux</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="TicketSoftwareIssue">Software Issues</label></td>
            <td>
                <select name="software_issue" id="TicketSoftwareIssue">
                    <option value="-" selected="selected">-- Select Common Issues --</option>
                    <option value="12323">PHPStorm</option>
                    <option value="12324">Cloud 9 Setup</option>
                    <option value="12325">Laravel Setup</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="TicketComment">Details</label><br>
                <textarea name="details" id="TicketComment" cols="50" rows="5" placeholder="Your ticket details">{{ old('details', '') }}</textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="TicketImages">Images</label><br/>
                <input type="file" name="images" multiple="multiple" id="TicketImages"/>
            </td>
        </tr>
    </table>
    <p style="text-align:right">
        <input type="submit" value="Submit ticket">
    </p>
</form>
</div>

@endsection