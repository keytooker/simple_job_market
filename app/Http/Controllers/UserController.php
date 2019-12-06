<?php


namespace App\Http\Controllers;
use App\User;
use Auth;
use App\Respond;
use App\Joboffer;

class UserController
{
    public function account()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            if (User::isContractor($user_id)) {
                $userResponds = Respond::whereContractor_id($user_id)->get();
                return view('user.freelanceracc', [ 'userResponds' => $userResponds, 'auth' => true ]);
            }
            else {
                $offers = Joboffer::whereCustomer_id($user_id)->get();
                return view('user.customeracc', [ 'offers' => $offers, 'role_id' => 1, 'auth' => true ]);
            }
        }
        return view('user.account');
    }
}
