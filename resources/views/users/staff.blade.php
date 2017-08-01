@extends("shared.layout")

@section("title", "Enter staff email - ITS Ticketing System")

@section("site-content")
    <div id="StaffEntryArea">

        <h3>Enter staff email</h3>
        <p>Please enter a staff email to view all tickets</p>

        @include("errors.validation-errors")
        <br/>

        <form action="{{ url('/staff') }}" method="POST">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td><label for="StaffEmail">Staff Email</label></td>
                    <td>
                        <input type="email" name="staff_email" id="StaffEmail">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="View All Tickets">
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection

