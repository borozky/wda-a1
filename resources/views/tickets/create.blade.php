@extends("shared.layout")

@section("site-content")

<!-- // user email, first and last names, email, operating system being used, software issue and a comment textearea to describe the issue -->
<h1>Submit a ticket</h1>
<form>
    <table>
        <tr>
            <td><label for="TicketEmail">Your email</label></td>
            <td><input type="email" name="email" id="TicketEmail"></td>
        </tr>
        <tr>
            <td><label for="TicketFirstName">Firstname</label></td>
            <td><input type="text" name="firstname" id="TicketFirstName"></td>
        </tr>
        <tr>
            <td><label for="TicketLastName">Last name</label></td>
            <td><input type="text" name="lastname" id="TicketLastName"></td>
        </tr>
        <tr>
            <td><label for="TicketOperatingSystem">Operating System</label></td>
            <td>
                <select name="operating-system" id="TicketOperatingSystem">
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
                <select name="software-issue" id="TicketSoftwareIssue">
                    <option value="-" selected="selected">-- Select Common Issues --</option>
                    <option value="12323">PHPStorm</option>
                    <option value="12324">Cloud 9 Setup</option>
                    <option value="12325">Laravel Setup</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="TicketComment">Comment</label><br>
                <textarea name="comment" id="TicketComment" cols="50" rows="5" placeholder="Your comment"></textarea>
            </td>
        </tr>
        
    </table>
    <p>
        
        
    </p>
    
    
    
    
    
    <input type="submit" value="Submit ticket">
</form>

@endsection