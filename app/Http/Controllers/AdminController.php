<?php

namespace App\Http\Controllers;


use App\Models\EventGuest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function dashboard()
    {
        $guest=EventGuest::count();
        $confirmed=EventGuest::sum("checkin_count");
        $mail_sent=EventGuest::where("mail_sent",1)->count();
        return view("admin.home.dashboard")
            ->with("guest",$guest)
            ->with("confirmed",$confirmed)
            ->with("mail_sent",$mail_sent);
    }

  /*  public function profile()
    {
        return view("admin.setting.profile");
    }*/

    public function profileUpdate(Request $request)
    {


        if ($request['password'] != null) {
            $data = [
                "name" => $request['name'],
                "email" => $request['email'],
                "password" => Hash::make($request['password']),
            ];
        } else {
            $data = [
                "name" => $request['name'],
                "email" => $request['email'],
            ];
        }

        try {
            User::where('id', Auth::user()->id)->update($data);
            Alert::success('Success ', "Profile Updated");

        } catch (\Exception $exception) {

            Alert::error('Error ', getErrorMessage($exception->getMessage(), "There is an error. Try later"));
        }

        return back();

    }

    public function logOut()
    {
        Auth::logout();
        return Redirect::to("/login");
    }
}
