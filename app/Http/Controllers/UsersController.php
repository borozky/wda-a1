<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function staff(Request $request){
        $request->session()->forget("staff_email");
        return view("users.staff");
    }

    public function signin(Request $request){
        $this->validate($request, [
            "staff_email" => "required|email"
        ]);
        
        $user = User::where("email", $request->staff_email)->first();
        if( $user == null){
            $user = new User;
            $user->email = $request->staff_email;
            $user->save();
        }

        session(["staff_email" => $request->staff_email]);
        return redirect("/tickets");
    }

    public function logout(Request $request){
        $request->session()->flush();

        if($request->has("return_url") && strpos($request->return_url, "/logout") == -1 ){
            return redirect($request->return_url);
        }

        return redirect("/");

    }

}
